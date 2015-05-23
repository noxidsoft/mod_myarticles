<?php
/**
 * @package		Noxidsoft.Site
 * @subpackage	mod_myarticles
 * @copyright	Copyright (C) 2007 - 2013 Noxidsoft. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';

abstract class modMyarticlesHelper
{
	public static function getList(&$params)
	{
		// user
		$user = JFactory::getUser();
		
		// Get a db connection.
		$db = JFactory::getDbo();
		
		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels($user->id);
		$uri = JURI::base();
		$switch_mode = $params->get('switch_mode', '1');
		
		// Excluded article filter - don't let users see these even if they own them
		$excluded_articles = $params->get('excluded_articles', '-1');
		if ($excluded_articles) {
			$excluded_articles = explode("\r\n", $excluded_articles);
		}
		$excluded_articles = join(',',$excluded_articles);
		
		// Create a new query object.
		$query = $db->getQuery(true);
		
		if ($switch_mode) {
			$query = ('
				SELECT id, title, alias, state, created_by, modified, modified_by, checked_out, access, featured
				FROM #__content
				WHERE id NOT IN ('.$excluded_articles.') AND created_by = '.$user->id.'
				ORDER BY title ASC');
		}
		
		if (!$switch_mode) {
			$query = ('
				SELECT id, title, alias, state, created_by, modified, modified_by, checked_out, access, featured
				FROM #__content
				WHERE id NOT IN ('.$excluded_articles.')
				ORDER BY title ASC');
		}
		
		// Reset the query using our newly populated query object.
		$db->setQuery($query);
		
		// Load the results as a list of stdClass objects.
		$results = $db->loadObjectList();
		
		// setup links before we return the database results
		foreach ($results as $item) :		
			if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){
				$item->link = JRoute::_('index.php?option=com_content&task=article.edit&a_id='.$item->id.'&return='.base64_encode(urlencode($uri)));
			} else {
				$item->link = '';
			}
		endforeach;
		
		return $results;
	}
}
