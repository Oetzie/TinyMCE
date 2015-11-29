<div id="tinymce-{$tv}-properties-div"></div>

<script type="text/javascript">
// <![CDATA[
	{literal}
	var params = {
		{/literal}{foreach from=$params key=k item=v name='p'}
			'{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last},{/if}
		{/foreach}{literal}
	};
	
	var TinyMCE = function(config) {
		config = config || {};
		
		TinyMCE.superclass.constructor.call(this, config);
	};
	
	Ext.extend(TinyMCE, Ext.Component, {
		page	: {},
		window	: {},
		grid	: {},
		tree	: {},
		panel	: {},
		combo	: {},
		config	: {}
	});
	
	Ext.reg('tinymce', TinyMCE);
	
	TinyMCE = new TinyMCE();
	
	var listeners = {
		'change'	: {
			fn			: function() {
				Ext.getCmp('modx-panel-tv').markDirty();
			},
			scope		: this
		}
	};
	
	MODx.load({
    	xtype		: 'panel',
    	layout		: 'form',
		cls			: 'form-with-labels',
		labelAlign	: 'top',
	    labelSeparator	: '',
		items		: [{
        	xtype			: 'textfield',
        	fieldLabel		: '{/literal}{$tinymce.label_toolbar1}{literal}',
        	description		: MODx.expandHelp ? '' : '{/literal}{$tinymce.label_toolbar1_desc}{literal}',
			name			: 'inopt_toolbar1',
        	anchor			: '60%',
        	allowBlank		: true,
        	value			: params['toolbar1'] || 'undo redo | bold italic underline strikethrough | styleselect bullist numlist outdent indent',
        	listeners		: listeners
        }, {
        	xtype			: MODx.expandHelp ? 'label' : 'hidden',
            html			: '{/literal}{$tinymce.label_toolbar1_desc}{literal}',
            cls				: 'desc-under'
        }, {
        	xtype			: 'textfield',
        	fieldLabel		: '{/literal}{$tinymce.label_toolbar2}{literal}',
        	description		: MODx.expandHelp ? '' : '{/literal}{$tinymce.label_toolbar2_desc}{literal}',
			name			: 'inopt_toolbar2',
        	anchor			: '60%',
        	allowBlank		: true,
        	value			: params['toolbar2'],
        	listeners		: listeners
        }, {
        	xtype			: MODx.expandHelp ? 'label' : 'hidden',
            html			: '{/literal}{$tinymce.label_toolbar2_desc}{literal}',
            cls				: 'desc-under'
        }, {
        	xtype			: 'textfield',
        	fieldLabel		: '{/literal}{$tinymce.label_toolbar3}{literal}',
        	description		: MODx.expandHelp ? '' : '{/literal}{$tinymce.label_toolbar3_desc}{literal}',
			name			: 'inopt_toolbar3',
        	anchor			: '60%',
        	allowBlank		: true,
        	value			: params['toolbar3'],
        	listeners		: listeners
        }, {
        	xtype			: MODx.expandHelp ? 'label' : 'hidden',
            html			: '{/literal}{$tinymce.label_toolbar3_desc}{literal}',
            cls				: 'desc-under'
        }, {
        	xtype			: 'textfield',
        	fieldLabel		: '{/literal}{$tinymce.label_plugins}{literal}',
        	description		: MODx.expandHelp ? '' : '{/literal}{$tinymce.label_plugins_desc}{literal}',
			name			: 'inopt_plugins',
        	anchor			: '60%',
        	allowBlank		: true,
        	value			: params['plugins'],
        	listeners		: listeners
        }, {
        	xtype			: MODx.expandHelp ? 'label' : 'hidden',
            html			: '{/literal}{$tinymce.label_plugins_desc}{literal}',
            cls				: 'desc-under'
        }],
        renderTo: 'tinymce-{/literal}{$tv}{literal}-properties-div'
	});
	{/literal}
// ]]>
</script>