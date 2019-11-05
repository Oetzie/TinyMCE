{$onRichTextEditorInit}

<div id="tinymce-panel-div-{$tv->id}">
    <textarea id="tv{$tv->id}" class="x-form-textarea x-form-field" name="tv{$tv->id}" rows="15" style="width: 100%; box-sizing: border-box;">{$tv->value|escape}</textarea>
</div>

<script type="text/javascript">
// <![CDATA[
    {literal}
        Ext.onReady(function() {
            MODx.loadRTE('tv{/literal}{$tv->id}{literal}', {/literal}{$config}{literal});
        });
    {/literal}
// ]]>
</script>