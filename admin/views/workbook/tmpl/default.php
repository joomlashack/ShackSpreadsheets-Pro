<?php
/**
* @author		Johan Sundell <johan@pixpro.net>
* @link			https://www.pixpro.net/labs
* @copyright	Copyright © You Rock AB 2003-2017 All Rights Reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/
// No direct access
defined('_JEXEC') or die;

JHtml::_('jquery.framework');
?>
<script type="text/javascript">
<!--
(function ($, doc)
	{
		'use strict';

		window.Pixparse = {

			initialize: function ()
			{
				var o = this.getUriObject(window.self.location.href),
					q = this.getQueryObject(o.query);

				this.editor = decodeURIComponent(q.name);
			},

			insert: function()
			{
				var tag = $('#data').html();
				if (window.Joomla && Joomla.editors.instances.hasOwnProperty(this.editor)) {
					Joomla.editors.instances[editor].replaceSelection(tag)
				} else {
					window.parent.jInsertEditorText(tag, this.editor);
				}
			},

			getQueryObject: function (q)
			{
				var rs = {};

				$.each((q || '').split(/[&;]/), function (key, val)
				{
					var keys = val.split('=');

					rs[keys[0]] = keys.length == 2 ? keys[1] : null;
				});

				return rs;
			},

			getUriObject: function (u)
			{
				var bitsAssociate = {},
					bits = u.match(/^(?:([^:\/?#.]+):)?(?:\/\/)?(([^:\/?#]*)(?::(\d*))?)((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[\?#]|$)))*\/?)?([^?#\/]*))?(?:\?([^#]*))?(?:#(.*))?/);

				$.each(['uri', 'scheme', 'authority', 'domain', 'port', 'path', 'directory', 'file', 'query', 'fragment'], function (key, index)
				{
					bitsAssociate[index] = (!!bits && !!bits[key]) ? bits[key] : '';
				});

				return bitsAssociate;
			}
		};

		$(function ()
		{
			window.Pixparse.initialize();
		});

}(jQuery, document));
//-->
</script>
<form enctype="multipart/form-data" method="post" action="<?php echo JRoute::_( 'index.php?option=com_pixparse&task=workbook.parsefile&editor='.$this->editor );?>" >
	<?php echo $this->form->renderField( 'file_upload' ); ?>
	<?php echo JHtml::_( 'form.token' ); ?>
	<button type="submit"><?php echo JText::_( 'JSUBMIT' );?></button>
</form>
<?php if( $this->data != '' ): ?>
	<button onclick="Pixparse.insert();window.parent.jModalClose();"><?php echo JText::_( 'COM_PIXPARSE_WORKBOOK_BUTTON_INSERT' ); ?></button>
	<div id="data">
		<?php echo $this->data; ?>
	</div>
	<button onclick="Pixparse.insert();window.parent.jModalClose();"><?php echo JText::_( 'COM_PIXPARSE_WORKBOOK_BUTTON_INSERT' ); ?></button>
<?php endif; ?>

