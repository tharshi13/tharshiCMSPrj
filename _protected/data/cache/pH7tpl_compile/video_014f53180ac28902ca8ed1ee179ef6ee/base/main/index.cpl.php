<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-03 17:51:31
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/video\views/base\tpl\main\index.tpl
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
?><div class="center"> <?php if(empty($error)) { ?> <?php foreach($albums as $album) { ?> <div class="thumb_photo"> <p> <a href="<?php $design->url('video', 'main', 'albums', $album->username) ;?>"> <img src="<?php echo PH7_URL_DATA_SYS_MOD?>video/file/<?php echo $album->username ;?>/<?php echo $album->albumId ;?>/<?php echo $album->thumb ;?>" alt="<?php echo $album->name ;?>" title="<?php echo $album->name ;?>" /> </a> </p> <p> <?php echo t('by'); ?> <?php $design->getProfileLink($album->username) ;?> <?php echo t('in'); ?> <a href="<?php $design->url('video', 'main', 'album', "$album->username,$album->name,$album->albumId") ;?>" title="<?php echo t('Album created on %0%.', $album->createdDate); ?> <?php if(!empty($album->updatedDate)) { ?><br> <?php echo t('Modified on %0%.', $album->updatedDate); ?> <?php } ?>"><?php echo $album->name ;?></a> </p> </div> <?php } ?> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?> <?php } else { ?> <p><?php echo $error; ?></p> <?php } ?> <p class="bottom"> <a class="btn btn-default btn-md" href="<?php $design->url('video', 'main', 'addalbum') ;?>"><?php echo t('Add a new album'); ?></a> </p></div>