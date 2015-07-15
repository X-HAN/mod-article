<?php
  
/**
 * @copyright	Copyright (C) 2011 - 2013  All rights reserved.
 * @author Azzaul 
 * @site: http://www.fast-job.ru/
 * @mail: freelancer@fast-job.ru
 */
 
defined('_JEXEC') or die( 'Ай-яй-яй, и что это тебе здесь надо' );

define('JPATH_BASE', dirname(__FILE__) );




define( 'DS', DIRECTORY_SEPARATOR );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
require_once ( JPATH_BASE .DS.'libraries'.DS.'joomla'.DS.'factory.php' );
$article_id = $params->get('fj_artinmod_id');
$db = JFactory::getDbo();
$pref = $db->getPrefix();

$res = 'SELECT `title`,`alias`,`introtext`,`catid`,`created`,`created_by`,`images`,`metakey`,`metadesc`,`hits` FROM `'.$pref.'content` WHERE `id`="'.$article_id.'"';

$db->setQuery($res);
$article_data = $db->loadAssoc();/**/

//Название категории

$cat_sql = 'SELECT `title`,`path` FROM `'.$pref.'categories` WHERE `id`='.$article_data['catid'];
$db->setQuery($cat_sql);
$cat_data = $db->loadAssoc();

?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<? echo $article_id; ?>">
			<?php echo $article_data['title']; ?>
		  </a>
		</h4>
    </div>
    <div id="collapseOne<? echo $article_id; ?>" class="panel-collapse collapse">
      <div class="panel-body">
       <?php echo $article_data['introtext']; ?>
	   </div>
    </div>
  </div>
</div>


