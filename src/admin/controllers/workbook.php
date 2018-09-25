<?php
/**
 * @author          Johan Sundell <labs@pixpro.net>
 * @author          Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @link            https://www.joomlashack.com/joomla-extensions/shack-spreadsheets/
 * @copyright       Copyright (C) 2018. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/../lib/PHPExcel/PHPExcel.php';

class ShackspreadsheetsControllerWorkbook extends JControllerLegacy
{
    public function parsefile()
    {
        JSession::checkToken() or die('Invalid Token');
        $input  = JFactory::getApplication()->input;
        $editor = $input->get('editor');
        try {
            $files    = $input->files->get('jform');
            $filename = $files['file_upload']['tmp_name'];

            $fileType = PHPExcel_IOFactory::identify($filename);
            $reader   = PHPExcel_IOFactory::createReader($fileType);
            $content  = $reader->load($filename);
            $data     = $content->getActiveSheet()->toArray(null, true, true, false);

            $html = '<table>';
            foreach ($data as $row) {
                $html .= '<tr><td>'
                    . implode('</td><td>', $row)
                    . '</td></tr>';
            }

            $html .= '</table>';

            JFactory::getApplication()->setUserState('shackspreadsheets.workbook.data', $html);
        } catch (Exception $e) {
            // Ignore errors
        }

        $url = 'index.php?option=com_shackspreadsheets&view=workbook&tmpl=component&name=' . $editor;
        $this->setRedirect($url);
        $this->redirect();
    }
}
