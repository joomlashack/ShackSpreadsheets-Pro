<?php
/**
* @author		Johan Sundell <labs@pixpro.net>
* @link			https://www.pixpro.net/labs
* @copyright	Copyright © You Rock AB 2003-2017 All Rights Reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;

require_once dirname(__FILE__).'/../lib/PHPExcel/PHPExcel.php';

class PixparseControllerWorkbook extends JControllerLegacy
{
	public function parsefile()
	{
		JSession::checkToken() or die( 'Invalid Token' );
		$input = JFactory::getApplication()->input;
		$editor = $input->get( 'editor' );
		try
		{
			$files = $input->files->get('jform');
			$filename = $files['file_upload']['tmp_name'];
			
			$fileType = PHPExcel_IOFactory::identify( $filename );
			$reader = PHPExcel_IOFactory::createReader( $fileType );
			$content = $reader->load( $filename );
			$data = $content->getActiveSheet()->toArray( null, true, true, false );
			
			$html = '<table>'.PHP_EOL;
			foreach( $data as $row )
			{
				$html .= '<tr>'.PHP_EOL.'<td>'.implode( '</td>'.PHP_EOL.'<td>', $row ).'</td>'.PHP_EOL.'</tr>'.PHP_EOL;
			}
			$html .= '</table>'.PHP_EOL;
			
			JFactory::getApplication()->setUserState( 'pixparse.workbook.data' , $html );
		}
		catch( Exception $e)
		{
			
		}
		$url = 'index.php?option=com_pixparse&view=workbook&tmpl=component&name='.$editor;
		$this->setRedirect( $url );
		$this->redirect();
	}
}
