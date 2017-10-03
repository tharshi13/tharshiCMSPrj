<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2017-10-03 17:52:25
Compiled file from: C:\Bitnami\wampstack-7.0.23-0\apache2\htdocs\pH7CMS-8.0.6\_protected\app/system/modules/forum\views/base\tpl\forum\topic.tpl
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
?><div class="center"> <?php if(empty($error)) { ?> <?php foreach($topics as $topic) { ?> <?php $total_views = Framework\Mvc\Model\Statistic::getView($topic->topicId,'ForumsTopics') ;?> <?php $total_reply = (new ForumModel)->totalMessages($topic->topicId) ;?> <h3><a href="<?php $design->url('forum', 'forum', 'post', "$topic->name,$topic->forumId,$topic->title,$topic->topicId") ;?>"><?php echo escape(Framework\Security\Ban\Ban::filterWord($topic->title), true) ;?></a></h3> <p><?php echo substr(escape(Framework\Security\Ban\Ban::filterWord($topic->message), true), 0, 100) ;?> | <span class="small italic"><?php echo t('Reply: %0%', $total_reply); ?> | <?php echo t('Views: %0%', $total_views); ?></span></p> <?php } ?> <?php } else { ?> <p><?php echo $error; ?></p> <?php } ?> <?php if(isset($forum_name,$forum_id)) { ?> <a class="btn btn-default btn-sm" rel="nofollow" href="<?php $design->url('forum', 'forum', 'addtopic', "$forum_name,$forum_id") ;?>"><?php echo t('Create a new Topic'); ?></a> <?php } else { ?> <a class="btn btn-default btn-sm" rel="nofollow" href="<?php $design->url('forum', 'forum', 'search') ;?>"><?php echo t('New Search'); ?></a> <?php } ?> <?php $this->display('page_nav.inc.tpl', PH7_PATH_TPL . PH7_TPL_NAME . PH7_DS); ?> <p><a href="<?php $design->url('xml','rss','xmlrouter','forum-topic') ;?>"><img src="<?php echo PH7_URL_STATIC . PH7_IMG?>icon/feed.png" alt="RSS Feed" /></a></p></div>