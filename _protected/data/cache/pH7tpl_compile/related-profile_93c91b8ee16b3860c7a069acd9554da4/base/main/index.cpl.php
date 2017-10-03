<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-02 19:18:02
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/related-profile\views/base\tpl\main\index.tpl
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
?><div class="center" id="related_profile_block"> <?php if(!empty($related_profiles)) { ?> <?php foreach($related_profiles as $profile) { ?> <?php if($id !== $profile->profileId) { ?> <?php $found = 1 ;?> <div class="s_photo"> <?php $avatarDesign->get($profile->username, $profile->firstName, $profile->sex, 64, $bRollover = true) ;?> </div> <?php } ?> <?php } ?> <?php } ?> <?php if(empty($found)) { ?> <p><?php echo t('No related profiles found.'); ?></p> <?php } ?></div>