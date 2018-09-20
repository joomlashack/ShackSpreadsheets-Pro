<?php
/**
 * @package    Com_Shackspreadsheets
 * @author     Johan Sundell <labs@pixpro.net>
 * @author     Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @copyright  Copyright (C) 2018. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
/*if (!JFactory::getUser()->authorise('core.manage', 'com_shackspreadsheets'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}*/

// Include dependancies
jimport( 'joomla.application.component.controller' );

JLoader::registerPrefix( 'Shackspreadsheets', JPATH_COMPONENT_ADMINISTRATOR );

$controller = JControllerLegacy::getInstance( 'Shackspreadsheets', array( 'base_path' => JPATH_COMPONENT_ADMINISTRATOR ) );
$controller->execute( JFactory::getApplication()->input->get( 'task' ) );
$controller->redirect();
