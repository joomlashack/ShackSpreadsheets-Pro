<?php
/**
 * @author          Johan Sundell <labs@pixpro.net>
 * @author          Joomlashack <help@joomlashack.com> - https://www.joomlashack.com
 * @link            https://www.joomlashack.com/joomla-extensions/shack-spreadsheets/
 * @copyright       Copyright (C) 2018. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
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
<form enctype="multipart/form-data" method="post"
      action="<?php echo JRoute::_('index.php?option=com_shackspreadsheets&task=workbook.parsefile&editor=' . $this->editor); ?>">
    <?php echo $this->form->renderField('file_upload'); ?>
    <?php echo JHtml::_('form.token'); ?>
    <button type="submit"><?php echo JText::_('COM_SHACKSPREADSHEETS_WORKBOOK_BUTTON_PARSE'); ?></button>
</form>
<?php if ($this->data != ''): ?>
    <button
        onclick="Shackspreadsheets.insert();window.parent.jModalClose();"><?php echo JText::_('COM_SHACKSPREADSHEETS_WORKBOOK_BUTTON_INSERT'); ?></button>
    <div id="data">
        <?php echo $this->data; ?>
    </div>
    <button
        onclick="Shackspreadsheets.insert();window.parent.jModalClose();"><?php echo JText::_('COM_SHACKSPREADSHEETS_WORKBOOK_BUTTON_INSERT'); ?></button>
<?php endif; ?>

