<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-03 17:57:10
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/invite\views/base\tpl\home\invitation.tpl
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
?><div class="left col-md-8"> <div id="block_page"> <h1><?php echo t('Invite your Friends'); ?></h1> <?php InviteForm::display() ;?> </div></div><div class="right col-md-4"> <div class="ad_336_280"><?php $this->designModel->ad(336,280) ;?></div> <?php $design->likeApi() ;?></div>