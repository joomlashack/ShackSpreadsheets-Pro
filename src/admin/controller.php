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

class ShackspreadsheetsController extends JControllerLegacy
{
    /**
     * @param bool $cachable
     * @param array $urlparams
     *
     * @return JControllerLegacy
     * @throws Exception
     */
    public function display($cachable = false, $urlparams = false)
    {
        $vName   = JFactory::getApplication()->input->getCmd('view', 'workbook');
        $vLayout = $this->input->get('layout', 'default', 'string');
        $vType   = JFactory::getDocument()->getType();

        $view = $this->getView($vName, $vType, '', array('base_path' => JPATH_COMPONENT_ADMINISTRATOR));
        if ($model = $this->getModel($vName)) {
            $view->setModel($model, true);
        }
        $view->setLayout($vLayout);
        $view->display();

        return $this;
    }

    public function test()
    {
        require_once JPATH_COMPONENT_ADMINISTRATOR . '/vendor/autoload.php';

        echo '<h3>' . __METHOD__ . '</h3>';
    }
}
