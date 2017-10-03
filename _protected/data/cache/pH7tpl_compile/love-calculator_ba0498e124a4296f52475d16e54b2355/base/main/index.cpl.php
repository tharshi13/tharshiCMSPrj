<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-02 19:22:15
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/love-calculator\views/base\tpl\main\index.tpl
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
?><div class="calculator-wrapper"> <div class="col-md-4"> <?php $avatarDesign->get($username, $first_name, $sex, 200) ;?> </div> <div class="col-md-4"> <div class="center heart"><span>0</span>%</div> <p class="love_txt bold pink2"><?php echo t('Love!'); ?></p> </div> <div class="col-md-4"> <?php $avatarDesign->get($second_username, $second_first_name, $second_sex, 200) ;?> </div></div><script>$(function(){ loveCounter(0, <?php echo $amount_love; ?>) });</script>