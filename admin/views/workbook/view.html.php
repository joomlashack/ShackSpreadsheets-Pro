<?php
/**
* @author		Johan Sundell <labs@pixpro.net>
* @link			https://www.pixpro.net/labs
* @copyright	Copyright © You Rock AB 2003-2017 All Rights Reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;

class PixparseViewWorkbook extends JViewLegacy
{
	public function display( $tpl = null )
	{
		$app = JFactory::getApplication();
		$this->data = $app->getUserState( 'pixparse.workbook.data', '' );
		$app->setUserState( 'pixparse.workbook.data', '' );
		$this->editor = $app->input->get( 'name' );
		$this->form = $this->get( 'Form' );
		parent::display( $tpl );
	}
}
