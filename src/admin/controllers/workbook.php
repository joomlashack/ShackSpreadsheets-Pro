<?php
/**
 * @package    ShackSpreadsheets-Pro
 * @contact    www.joomlashack.com, help@joomlashack.com
 * @author     Johan Sundell <labs@pixpro.net>
 * @copyright  2003-2017 You Rock AB. All Rights Reserved.
 * @copyright  2018 Open Source Training, LLC. All rights reserved
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 *
 * This file is part of ShackSpreadsheets-Pro.
 *
 * ShackSpreadsheets-Pro is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * ShackSpreadsheets-Pro is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ShackSpreadsheets-Pro.  If not, see <http://www.gnu.org/licenses/>.
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
