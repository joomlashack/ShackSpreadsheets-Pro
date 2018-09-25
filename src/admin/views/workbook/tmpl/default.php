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

JHtml::_('jquery.framework');
?>
    <script type="text/javascript">
        <!--
        (function($, doc) {
            'use strict';

            window.Shackspreadsheets = {
                initialize: function() {
                    var o = this.getUriObject(window.self.location.href),
                        q = this.getQueryObject(o.query);

                    this.editor = decodeURIComponent(q.name);
                },

                insert: function() {
                    var tag = $('#data').html();
                    if (window.Joomla && Joomla.editors.instances.hasOwnProperty(this.editor)) {
                        Joomla.editors.instances[editor].replaceSelection(tag)
                    } else {
                        window.parent.jInsertEditorText(tag, this.editor);
                    }
                },

                getQueryObject: function(q) {
                    var rs = {};

                    $.each((q || '').split(/[&;]/), function(key, val) {
                        var keys = val.split('=');

                        rs[keys[0]] = keys.length == 2 ? keys[1] : null;
                    });

                    return rs;
                },

                getUriObject: function(u) {
                    var bitsAssociate = {},
                        bits          = u.match(/^(?:([^:\/?#.]+):)?(?:\/\/)?(([^:\/?#]*)(?::(\d*))?)((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[\?#]|$)))*\/?)?([^?#\/]*))?(?:\?([^#]*))?(?:#(.*))?/);

                    $.each(['uri', 'scheme', 'authority', 'domain', 'port', 'path', 'directory', 'file', 'query', 'fragment'], function(key, index) {
                        bitsAssociate[index] = (!!bits && !!bits[key]) ? bits[key] : '';
                    });

                    return bitsAssociate;
                }
            };

            $(function() {
                window.Shackspreadsheets.initialize();
            });
        }(jQuery, document));
        //-->
    </script>
    <form enctype="multipart/form-data"
          method="post"
          action="<?php echo JRoute::_('index.php?option=com_shackspreadsheets&task=workbook.parsefile&editor=' . $this->editor); ?>">
        <?php
        echo $this->form->renderField('file_upload');
        echo JHtml::_('form.token');
        ?>
        <button type="submit"><?php echo JText::_('COM_SHACKSPREADSHEETS_WORKBOOK_BUTTON_PARSE'); ?></button>
    </form>
<?php
if ($this->data != '') :
    ?>
    <button
        onclick="Shackspreadsheets.insert();window.parent.jModalClose();"><?php echo JText::_('COM_SHACKSPREADSHEETS_WORKBOOK_BUTTON_INSERT'); ?></button>
    <div id="data">
        <?php echo $this->data; ?>
    </div>
    <button
        onclick="Shackspreadsheets.insert();window.parent.jModalClose();"><?php echo JText::_('COM_SHACKSPREADSHEETS_WORKBOOK_BUTTON_INSERT'); ?></button>
<?php
endif;

