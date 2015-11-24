var TinyMCE = {
	id 		: 'ta',
	addToggleButton : function(id) {
		if (undefined != id) {
			var container = Ext.get(id);
			
			if (!container) {
				return false;
			}
			
			container = Ext.get(Ext.DomHelper.append(container, {
	            tag		: 'div',
	            id		: 'mce-toggle',
	            class	: 'mce-toggle x-form-check-wrap'
	        }));
			
			container.createChild({
		        tag 	: 'input',
		        type	: 'checkbox',
		        id 		: 'mce-toggle-checkbox',
		        class 	: 'x-form-checkbox x-form-field',
		        checked	: true
	        }).on('click', function(a, b) {
		    	tinyMCE.execCommand('mceToggleEditor', true, TinyMCE.id);
		    });

	        container.createChild({
		        tag 	: 'label',
		        for		: 'mce-toggle-checkbox',
		        class 	: 'x-form-cb-label',
		        html 	: tinyMCE.translate('WYSIWYG editor')
	        });
		}
		
		return false;
	},
	setupCallback : function(editor) {
		editor.on('change', function(e) {
			editor.save();
			
			var resource = Ext.getCmp('modx-panel-resource');
			
			if (resource) {
				resource.markDirty();
			}
		}).on('focus', function(e) {
			Ext.get(editor.editorContainer).addClass('mce-focus');
		}).on('blur', function(e) {
			Ext.get(editor.editorContainer).removeClass('mce-focus');
		}).on('postRender', function(e) {
			if (editor.id == TinyMCE.id && TinyMCE.config.toggle) {
				TinyMCE.addToggleButton('modx-content-below');
			}
		});
	},
	browserCallback : function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file			: TinyMCE.config.browserUrl,
            width			: screen.width * 0.7,
            height			: screen.height * 0.6,
            title 			: tinyMCE.translate('MODX browser')
        }, {
            window			: win,
            input			: field
        });
        
        return false;
	},
	browserSelectCallback : function(data) {
		if ('' != data.fullRelativeUrl) {
			var input = top.tinyMCE.activeEditor.windowManager.getParams().input;
			var window = top.tinyMCE.activeEditor.windowManager.getParams().window;

			window.document.getElementById(input).value = data.fullRelativeUrl;
			
			if ('createEvent' in document) {
			    var event = document.createEvent('HTMLEvents');
			    
			    event.initEvent('change', false, true);
			    
			    window.document.getElementById(input).dispatchEvent(event);
			} else {
			    window.document.getElementById(input).fireEvent('onchange');
			}
    
            top.tinyMCE.activeEditor.windowManager.close();
            
			window.focus();
            window.document.focus();
        }
    }
};

MODx.loadRTE = function(id, customConfig) {
	if (TinyMCE.config){
		var config = {};
		
		if (undefined == id) {
			id = TinyMCE.id;
		}

		Ext.applyIf(config, customConfig || {});
		Ext.applyIf(config, TinyMCE.config || {});
		
		Ext.applyIf(config, {
			selector 				: '#' + id,
			theme					: 'modern',
			file_browser_callback	: TinyMCE.browserCallback,
			setup 					: TinyMCE.setupCallback
		});
		
		tinyMCE.init(config);
	}
};