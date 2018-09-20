<?php
/**
 * @author          Johan Sundell <labs@pixpro.net>
 * @author          Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @link            https://www.joomlashack.com/joomla-extensions/shack-spreadsheets/
 * @copyright       Copyright (C) 2018. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class PlgButtonShackspreadsheets extends JPlugin
{
    protected $autoloadLanguage = true;

    public function PlgButtonShackspreadsheets(& $subject, $config)
    {
        return parent::__construct($subject, $config);
    }

    public function onDisplay($name)
    {
        $button          = new JObject;
        $button->modal   = true;
        $button->class   = 'btn';
        $button->text    = JText::_('PLG_SHACKSPREADSHEETS_BUTTON_SHACKSPREADSHEETS');
        $button->name    = 'arrow-down';
        $button->link    = 'index.php?option=com_shackspreadsheets&view=workbook&tmpl=component&name=' . $name;
        $button->options = "{handler: 'iframe', size: {x: 500, y: 300}}";

        return $button;
    }
}

