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

class ShackspreadsheetsViewWorkbook extends JViewLegacy
{
    /**
     * @param string $tpl
     *
     * @return void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $app        = JFactory::getApplication();
        $this->data = $app->getUserState('shackspreadsheets.workbook.data', '');
        $app->setUserState('shackspreadsheets.workbook.data', '');
        $this->editor = $app->input->get('name');
        $this->form   = $this->get('Form');

        parent::display($tpl);
    }
}
