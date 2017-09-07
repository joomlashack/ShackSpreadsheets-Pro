<?php
/**
 * @package    Com_Pixparse
 * @author     Johan Sundell <johan@pixpro.net>
 * @copyright  You Rock AB 2003-2017 All Rights Reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
/*if (!JFactory::getUser()->authorise('core.manage', 'com_pixparse'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}*/

// Include dependancies
jimport( 'joomla.application.component.controller' );

JLoader::registerPrefix( 'Pixparse', JPATH_COMPONENT_ADMINISTRATOR );

$controller = JControllerLegacy::getInstance( 'Pixparse', array( 'base_path' => JPATH_COMPONENT_ADMINISTRATOR ) );
$controller->execute( JFactory::getApplication()->input->get( 'task' ) );
$controller->redirect();
