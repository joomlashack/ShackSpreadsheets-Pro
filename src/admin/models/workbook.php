<?php
/**
 * @author          Johan Sundell <labs@pixpro.net>
 * @author          Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @link            https://www.joomlashack.com/joomla-extensions/shack-spreadsheets/
 * @copyright       Copyright (C) 2018. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class ShackspreadsheetsModelWorkbook extends JModelForm
{
    public function getForm($data = array(), $loadData = false)
    {
        JForm::addFormPath(JPATH_COMPONENT_ADMINISTRATOR . '/models/forms');
        $form = $this->loadForm('com_shackspreadsheets.workbook', 'workbook',
            array('control' => 'jform', 'load_data' => $loadData));

        if (empty($form)) {
            return false;
        }
        return $form;
    }
}