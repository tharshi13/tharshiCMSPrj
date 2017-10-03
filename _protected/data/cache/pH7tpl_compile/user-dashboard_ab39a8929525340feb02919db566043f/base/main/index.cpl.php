<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-02 19:18:46
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/user-dashboard\views/base\tpl\main\index.tpl
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
?><div class="row"> <?php if(!$this->browser->isMobile()) { ?> <div class="left col-xs-12 col-sm-4 col-md-3"> <h2><?php echo t('My Profile'); ?></h2> <?php $avatarDesign->lightBox($username, $first_name, $sex, 400) ;?> <ul> <li> <a href="<?php $design->url('user','setting','avatar') ;?>" title="<?php echo t('Change My Profile Photo'); ?>"><i class="fa fa-upload"></i> <?php echo t('Change Profile Photo'); ?></a> </li> <li> <a href="<?php $design->url('user','setting','edit') ;?>" title="<?php echo t('Edit My Profile'); ?>"><i class="fa fa-cog fa-fw"></i> <?php echo t('Edit Profile'); ?></a> </li> <li> <a href="<?php $design->url('user','setting','design') ;?>" title="<?php echo t('My Wallpaper'); ?>"><i class="fa fa-picture-o"></i> <?php echo t('Design Profile'); ?></a></li> <li> <a href="<?php $design->url('user','setting','notification') ;?>" title="<?php echo t('My Email Notification Settings'); ?>"><i class="fa fa-envelope-o"></i> <?php echo t('Notifications'); ?></a> </li> <li> <a href="<?php $design->url('user','setting','privacy') ;?>" title="<?php echo t('My Privacy Settings'); ?>"><i class="fa fa-user-secret"></i> <?php echo t('Privacy Setting'); ?></a> </li> <?php if(PH7_VALID_LICENSE) { ?> <li> <a href="<?php $design->url('payment','main','info') ;?>" title="<?php echo t('My Membership'); ?>"><i class="fa fa-credit-card"></i> <?php echo t('Membership Details'); ?></a> </li> <?php } ?> <li><a href="<?php $design->url('user','setting','password') ;?>" title="<?php echo t('Change My Password'); ?>"><i class="fa fa-key fa-fw"></i> <?php echo t('Change Password'); ?></a></li> </ul> </div> <?php } ?> <div class="left col-xs-12 col-sm-6 col-md-6"> <h2 class="center underline"><?php echo t('The Latest Users'); ?></h2> <?php $userDesignModel->profilesBlock() ;?> <h2 class="center underline"><?php echo t('My friends'); ?></h2> <div class="content" id="friend"> <script> var url_friend_block = '<?php $design->url('friend','main','index',$username) ;?>'; $('#friend').load(url_friend_block + ' #friend_block'); </script> </div> <div class="clear"></div> <h2 class="center underline"><?php echo t('Visitors who visited my profile'); ?></h2> <div class="content" id="visitor"> <script> var url_visitor_block = '<?php $design->url('user','visitor','index',$username) ;?>'; $('#visitor').load(url_visitor_block + ' #visitor_block'); </script> </div> <div class="clear"></div> <?php if($is_picture_enabled) { ?> <h2 class="center underline"><?php echo t('My photo albums'); ?></h2> <div class="content" id="picture"> <script> var url_picture_block = '<?php $design->url('picture','main','albums',$username) ;?>'; $('#picture').load(url_picture_block + ' #picture_block'); </script> </div> <div class="clear"></div> <?php } ?> <?php if($is_video_enabled) { ?> <h2 class="center underline"><?php echo t('My video albums'); ?></h2> <div class="content" id="video"> <script> var url_video_block = '<?php $design->url('video','main','albums',$username) ;?>'; $('#video').load(url_video_block + ' #video_block'); </script> </div> <div class="clear"></div> <?php } ?> <?php if($is_forum_enabled) { ?> <h2 class="center underline"><?php echo t('My discussions'); ?></h2> <div class="content" id="forum"> <script> var url_forum_block = '<?php $design->url('forum','forum','showpostbyprofile',$username) ;?>'; $('#forum').load(url_forum_block + ' #forum_block'); </script> </div> <div class="clear"></div> <?php } ?> <?php if($is_note_enabled) { ?> <h2 class="center underline"><?php echo t('My notes'); ?></h2> <div class="content" id="note"> <script> var url_note_block = '<?php $design->url('note','main','author',$username) ;?>'; $('#note').load(url_note_block + ' #note_block'); </script> </div> <div class="clear"></div> <?php } ?> <h2 class="center underline italic s_tMarg"><?php echo t('Quick User Search'); ?></h2> <?php SearchUserCoreForm::quick() ;?> </div> <div class="left col-xs-12 col-sm-2 col-md-3"> <h2><?php echo t('The Latest News'); ?></h2> <div id="wall"></div> </div></div><script> $(document).ready(function() { $('ul.zoomer_pic').slick({ dots: true, infinite: false, slidesToShow: 6, slidesToScroll: 6, adaptiveHeight: true }) });</script>