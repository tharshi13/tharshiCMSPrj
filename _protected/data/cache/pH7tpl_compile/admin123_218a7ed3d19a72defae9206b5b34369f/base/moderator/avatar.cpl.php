<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-02 19:21:29
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/admin123\views/base\tpl\moderator\avatar.tpl
Template Engine: PH7Tpl version 1.3.0 by Pierre-Henry Soria
*/
/***************************************************************************
 *     pH7CMS Social Dating CMS | By Pierre-Henry Soria
 *               --------------------
 * @since      Mon Mar 21 2011
 * @author     SORIA Pierre-Henry
 * @email      hello@ph7cms.com
 * @link       https://ph7cms.com
 * @copyright  (c) 2011-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license    Creative Commons Attribution 3.0 License - http://creativecommons.org/licenses/by/3.0/
 ***************************************************************************/
?><?php if(!empty($avatars)) { ?> <ul> <?php foreach($avatars as $avatar) { ?> <?php $action = ($avatar->approvedAvatar == 1) ? 'disapprovedavatar' : 'approvedavatar' ;?> <div class="thumb_photo"> <?php $avatarDesign->lightBox($avatar->username, $avatar->firstName, $avatar->sex, 300) ;?> <p class="italic"><?php echo t('Posted by'); ?> <?php $design->getProfileLink($avatar->username) ;?></p> <div> <?php $text = ($avatar->approvedAvatar == 1) ? t('Disapproved') : t('Approved') ;?> <?php LinkCoreForm::display($text, PH7_ADMIN_MOD, 'moderator', $action, array('id'=>$avatar->profileId, 'username'=>$avatar->username)) ;?> | <?php LinkCoreForm::display(t('Delete'), PH7_ADMIN_MOD, 'moderator', 'deleteavatar', array('id'=>$avatar->profileId, 'username'=>$avatar->username)) ;?> </div> </div> <?php } ?> </ul> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); } else { ?> <p class="center"><?php echo t('No Profile Photos found for the moderation treatment.'); ?></p><?php } ?>