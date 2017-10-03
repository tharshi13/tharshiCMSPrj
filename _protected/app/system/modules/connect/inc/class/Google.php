<?php
/**
 * @title          Google OAuth Class
 *
 * @author         Pierre-Henry Soria <hello@ph7cms.com>
 * @copyright      (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Module / Connect / Inc / Class
 * @version        1.1
 */

namespace PH7;

defined('PH7') or exit('Restricted access');

use PH7\Framework\Config\Config;
use PH7\Framework\Date\CDateTime;
use PH7\Framework\File\File;
use PH7\Framework\File\Import;
use PH7\Framework\Geo\Ip\Geo;
use PH7\Framework\Ip\Ip;
use PH7\Framework\Mvc\Model\DbConfig;
use PH7\Framework\Mvc\Request\Http as HttpRequest;
use PH7\Framework\Mvc\Router\Uri;
use PH7\Framework\Registry\Registry;
use PH7\Framework\Session\Session;
use PH7\Framework\Util\Various;

class Google extends Api implements IApi
{
    private $_sAvatarFile, $_sUsername, $_iProfileId, $_aUserInfo;

    /**
     * @param Session $oSession
     * @param HttpRequest $oHttpRequest
     * @param Registry $oRegistry
     */
    public function __construct(Session $oSession, HttpRequest $oHttpRequest, Registry $oRegistry)
    {
        parent::__construct();

        /*** Import the libraries ***/
        Import::lib('Service.Google.OAuth.Google_Client');
        Import::lib('Service.Google.OAuth.contrib.Google_Oauth2Service');

        $oClient = new \Google_Client;
        $oClient->setApplicationName($oRegistry->site_name);
        $this->_setConfig($oClient);

        $oOauth = new \Google_Oauth2Service($oClient);

        if ($oHttpRequest->getExists('code')) {
            $oClient->authenticate();
            $oSession->set('token', $oClient->getAccessToken());
            $this->sUrl = Uri::get('connect','main','home');
        }

        if ($oSession->exists('token')) {
            $oClient->setAccessToken($oSession->get('token', false));
        }

        if ($oClient->getAccessToken()) {
            // User info is ok? Here we will be connect the user and/or adding the login and registering routines...
            $oUserModel = new UserCoreModel;

            // Get information of user
            $aUserData = $oOauth->userinfo->get();

            if (!$iId = $oUserModel->getId($aUserData['email'])) {
                // Add User if it does not exist in our database
                $this->add(escape($aUserData, true), $oUserModel);

                // Add User Avatar
                if (!empty($aUserData['picture'])) {
                    $this->setAvatar($aUserData['picture']);
                }

                $this->oDesign->setFlashMsg( t('You have now been registered! %0%', (new Registration)->sendMail($this->_aUserInfo, true)->getMsg()) );
                $this->sUrl = Uri::get('connect','main','register');
            } else {
                // Login
                $this->setLogin($iId, $oUserModel);
                $this->sUrl = Uri::get('connect','main','home');
            }

            // Add the access token
            $oSession->set('token', $oClient->getAccessToken());

            unset($oUserModel);
        } else {
            $this->sUrl = $oClient->createAuthUrl();
        }

        unset($oClient, $oOauth);
    }

    /**
     * @param array $aProfile
     * @param UserCoreModel $oUserModel
     *
     * @return void
     */
    public function add(array $aProfile, UserCoreModel $oUserModel)
    {
        $sBirthDate = (!empty($aProfile['birthday'])) ? $aProfile['birthday'] : date('m/d/Y', strtotime('-30 year'));
        $sSex = $this->checkGender($aProfile['gender']);
        $sMatchSex = ($sSex == 'male' ? 'female' : ($sSex == 'female' ? 'male' : 'couple'));
        $this->_sUsername = (new UserCore)->findUsername($aProfile['given_name'], $aProfile['name'], $aProfile['family_name']);

        $this->_aUserInfo = [
            'email' => $aProfile['email'],
            'username' => $this->_sUsername,
            'password' => Various::genRndWord(Registration::DEFAULT_PASSWORD_LENGTH),
            'first_name' => (!empty($aProfile['given_name'])) ? $aProfile['given_name'] : '',
            'last_name' => (!empty($aProfile['family_name'])) ? $aProfile['family_name'] : '',
            'sex' => $sSex,
            'match_sex' => array($sMatchSex),
            'birth_date' => (new CDateTime)->get($sBirthDate)->date('Y-m-d'),
            'country' => Geo::getCountryCode(),
            'city' => Geo::getCity(),
            'state' => Geo::getState(),
            'zip_code' => Geo::getZipCode(),
            'description' => (!empty($aProfile['bio'])) ? $aProfile['bio'] : '',
            'website' => '',
            'social_network_site' => $aProfile['link'],
            'ip' => Ip::get(),
            'prefix_salt' => Various::genRnd(),
            'suffix_salt' => Various::genRnd(),
            'hash_validation' => Various::genRnd(),
            'is_active' => DbConfig::getSetting('userActivationType')
        ];

        $this->_iProfileId = $oUserModel->add($this->_aUserInfo);
    }

    /**
     * Set Avatar.
     *
     * @param string $sUrl
     *
     * @return void
     */
    public function setAvatar($sUrl)
    {
        $this->_sAvatarFile = $this->getAvatar($sUrl);

        if ($this->_sAvatarFile) {
            $iApproved = (DbConfig::getSetting('avatarManualApproval') == 0) ? '1' : '0';
            (new UserCore)->setAvatar($this->_iProfileId, $this->_sUsername, $this->_sAvatarFile, $iApproved);
        }

        // Remove the temporary avatar
        (new File)->deleteFile($this->_sAvatarFile);
    }

    /**
     * Set Configuration of OAuth API.
     *
     * @param \Google_Client $oClient
     *
     * @return void
     */
    private function _setConfig(\Google_Client $oClient)
    {
        $oClient->setClientId(Config::getInstance()->values['module.api']['google.client_id']);
        $oClient->setClientSecret(Config::getInstance()->values['module.api']['google.client_secret_key']);
        $oClient->setRedirectUri(Uri::get('connect','main','login','google'));
        $oClient->setDeveloperKey(Config::getInstance()->values['module.api']['google.developer_key']);
    }
}
