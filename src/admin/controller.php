<?php

/**
 * @package    Com_Pixparse
 * @author     Johan Sundell <labs@pixpro.net>
 * @copyright  You Rock AB 2003-2017 All Rights Reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Class PixparseController
 *
 * @since  1.6
 */
class PixparseController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   mixed    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return   JController This object to support chaining.
	 *
	 * @since    1.5
	 */
	public function display( $cachable = false, $urlparams = false )
	{
		$vName = JFactory::getApplication()->input->getCmd( 'view', 'workbook' );
		$vLayout = $this->input->get( 'layout', 'default', 'string' );
		$vType = JFactory::getDocument()->getType();
		
		$view = $this->getView( $vName, $vType, '', array( 'base_path' => JPATH_COMPONENT_ADMINISTRATOR ) );
		if( $model = $this->getModel( $vName ) )
			$view->setModel( $model, true );
		$view->setLayout( $vLayout );
		$view->display();

		return $this;
	}
}
