<?php
/**
 * @package    Com_Shackspreadsheets
 * @author     Johan Sundell <labs@pixpro.net>
 * @author     Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @copyright  Copyright (C) 2018. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::registerPrefix('Shackspreadsheets', JPATH_COMPONENT_ADMINISTRATOR);

$controller = JControllerLegacy::getInstance('Shackspreadsheets', array('base_path' => JPATH_COMPONENT_ADMINISTRATOR));
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
