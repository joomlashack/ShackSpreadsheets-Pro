<?php
/**
 * @package    Com_Shackspreadsheets
 * @author     Johan Sundell <labs@pixpro.net>
 * @author     Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @copyright  Copyright (C) 2018. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
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
}
