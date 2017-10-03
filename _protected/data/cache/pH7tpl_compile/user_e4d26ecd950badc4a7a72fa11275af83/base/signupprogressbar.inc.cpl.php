<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-02 17:31:32
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/user\views/base\tpl\progressbar.inc.tpl
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
?><div class="progress"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $progressbar_percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progressbar_percentage; ?>%" ><?php echo $progressbar_percentage; ?>% - STEP <?php echo $progressbar_step; ?>/3 </div></div>