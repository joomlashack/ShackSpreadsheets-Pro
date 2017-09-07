<?php
/**
* @author		Johan Sundell <johan@pixpro.net>
* @link			https://www.pixpro.net/labs
* @copyright	Copyright © You Rock AB 2003-2017 All Rights Reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;

class PixparseModelWorkbook extends JModelForm
{
	public function getForm( $data = array(), $loadData = false )
	{
		JForm::addFormPath(JPATH_COMPONENT_ADMINISTRATOR . '/models/forms');
		$form = $this->loadForm( 'com_pixparse.workbook', 'workbook', array( 'control' => 'jform', 'load_data' => $loadData ) );
		
		if( empty( $form ) )
		{
			return false;
		}
		return $form;
	}
}