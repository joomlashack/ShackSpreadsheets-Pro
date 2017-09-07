<?php
/**
* @author		Johan Sundell <johan@pixpro.net>
* @link			https://www.pixpro.net/labs
* @copyright	Copyright © You Rock AB 2003-2017 All Rights Reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;

jimport( 'joomla.plugin.plugin' );

class PlgButtonPixparse extends JPlugin
{
	protected $autoloadLanguage = true;
	
	public function PlgButtonPixparse(& $subject, $config)
	{
		return parent::__construct( $subject, $config );
	}
	
	public function onDisplay( $name )
	{
		$button = new JObject;
		$button->modal   = true;
		$button->class   = 'btn';
		$button->text    = JText::_( 'PLG_PIXPARSE_BUTTON_PIXPARSE' );
		$button->name    = 'arrow-down';
		$button->link    = 'index.php?option=com_pixparse&view=workbook&tmpl=component&name='.$name;
		$button->options = "{handler: 'iframe', size: {x: 500, y: 300}}";
		
		return $button;
	}
}

