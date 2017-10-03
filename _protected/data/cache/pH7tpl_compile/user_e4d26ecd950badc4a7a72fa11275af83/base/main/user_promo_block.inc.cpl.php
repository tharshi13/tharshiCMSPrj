<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-02 16:54:33
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/user\views/base\tpl\main\user_promo_block.inc.tpl
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
?><h1 class="red3 italic underline s_bMarg"><?php echo $slogan; ?></h1><?php if($is_users_block) { ?> <div class="center profiles_window thumb pic_block"> <?php $userDesignModel->profiles(0, $number_profiles) ;?> </div><?php } ?><div class="s_tMarg" id="promo_text"> <h2><?php echo t('Meet people in %0% with %site_name%!', $design->geoIp(false)); ?></h2> <?php echo $promo_text; ?></div>