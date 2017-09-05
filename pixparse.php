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
		//echo 'test1'; die();
		return parent::__construct( $subject, $config );
	}
	
	public function onDisplay( $name )
	{
		$button = new JObject;
		$button->modal   = true;
		$button->class   = 'btn';
		//$button->onclick = 'insertReadmore(\'' . $name . '\');return false;';
		$button->text    = JText::_( 'PLG_PIXPARSE_BUTTON_PIXPARSE' );
		$button->name    = 'arrow-down';
		$button->link    = 'index.php?option=com_pixparse&view=workbook&tmpl=component&name='.$name;
		$button->options = "{handler: 'iframe', size: {x: 500, y: 300}, content:'<p>test</p>'}";
		
		return $button;
	}
	
	public function onajaxpixparse()
	{
		echo 'here'; die();
		return 'sudde';
	}
	
	public function update(&$args)
	{
		echo 'sudde2'; die();
		// First let's get the event from the argument array.  Next we will unset the
		// event argument as it has no bearing on the method to handle the event.
		$event = $args['event'];
		unset($args['event']);
	
		/*
		 * If the method to handle an event exists, call it and return its return
		* value.  If it does not exist, return null.
		*/
		if (method_exists($this, $event))
		{
			return call_user_func_array(array($this, $event), $args);
		}
	}
}

