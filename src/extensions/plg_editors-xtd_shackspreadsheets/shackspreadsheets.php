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

class PlgButtonShackspreadsheets extends JPlugin
{
    protected $autoloadLanguage = true;

    public function __construct(&$subject, $config)
    {
        return parent::__construct($subject, $config);
    }

    public function onDisplay($name)
    {
        $button          = new JObject;
        $button->modal   = true;
        $button->class   = 'btn';
        $button->text    = JText::_('PLG_SHACKSPREADSHEETS_BUTTON_TEXT');
        $button->name    = 'arrow-down';
        $button->link    = 'index.php?option=com_shackspreadsheets&view=workbook&tmpl=component&name=' . $name;
        $button->options = "{handler: 'iframe', size: {x: 500, y: 300}}";

        return $button;
    }
}

