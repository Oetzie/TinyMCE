{$onRichTextEditorInit}

<div id="tinymce-panel-div-{$tv->id}">
	<textarea id="tv{$tv->id}" class="x-form-textarea x-form-field" name="tv{$tv->id}" value="{$tv->value|escape}" rows="15" style="width:99%;height:140px;"></textarea>
</div>

<script type="text/javascript">
// <![CDATA[
	{literal}
	var TinyMCE{/literal}{$tv->id}{literal} = Ext.onReady(function() {
		MODx.loadRTE('tv{/literal}{$tv->id}{literal}', {
			toolbar1 				: '{/literal}{$toolbar1}{literal}',
			toolbar2 				: '{/literal}{$toolbar2}{literal}',
			toolbar3 				: '{/literal}{$toolbar3}{literal}',
			plugins 				: '{/literal}{$plugins}{literal}',
			menubar 				: false,
			statusbar				: false,
			height					: '200px',
			toggle					: true
		});
	});
	{/literal}
// ]]>
</script>