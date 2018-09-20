<?php
/**
* @author		Johan Sundell <labs@pixpro.net>
* @author       Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
* @link			https://www.joomlashack.com/joomla-extensions/shack-spreadsheets/
* @copyright	Copyright (C) 2018. All rights reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;

class ShackspreadsheetsViewWorkbook extends JViewLegacy
{
	public function display( $tpl = null )
	{
		$app = JFactory::getApplication();
		$this->data = $app->getUserState( 'shackspreadsheets.workbook.data', '' );
		$app->setUserState( 'shackspreadsheets.workbook.data', '' );
		$this->editor = $app->input->get( 'name' );
		$this->form = $this->get( 'Form' );
		parent::display( $tpl );
	}
}
