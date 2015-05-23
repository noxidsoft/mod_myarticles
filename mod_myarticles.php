<?php
/**
 * @package		Noxidsoft.Site
 * @subpackage	mod_myarticles
 * @copyright	Copyright (C) 2007 - 2014 Noxidsoft. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modMyarticlesHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$subheading_line_color = htmlspecialchars($params->get('subheading_line_color'));

require JModuleHelper::getLayoutPath('mod_myarticles', $params->get('layout', 'default'));
