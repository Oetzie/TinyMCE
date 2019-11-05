var ModTinyMCE = {
    configs         : {},
    browserField    : null,
    browserDialog   : null,
    onSetupCallback : function(editor) {
        editor.on('init', function(event) {
            event.target.save();
        }).on('change', function(event) {
            event.target.save();
        }).on('focus', function(event) {
            Ext.get(event.target.editorContainer).addClass('mce-focus');
        }).on('blur', function(event) {
            Ext.get(event.target.editorContainer).removeClass('mce-focus');
        });

        editor.addShortcut('meta+' + (MODx.config.keymap_save || 's'), '', function() {
            var btn = Ext.getCmp('modx-abtn-save');

            if (btn) {
                btn.el.dom.click();
            }

            return false;
        });
    },
    onBrowserCallback : function(field, url, type) {
        ModTinyMCE.browserField    = field;
        ModTinyMCE.browserDialog   = tinyMCE.activeEditor.windowManager.openUrl({
            url     : MODx.config.manager_url + 'index.php?a=' + MODx.action.browser + '&source=' + MODx.config.default_media_source,
            size    : 'medium',
            title   : _('file_browser')
        });

        return false;
    },
    onBrowserSelectCallback : function(data) {
        top.ModTinyMCE.browserField(data.fullRelativeUrl || '');
        top.ModTinyMCE.browserDialog.close();

        top.focus();
    },
    onFormatConfig: function(config) {
        config = config || {};

        var boolValues = [
            'hidden_input', 'branding', 'contextmenu_never_use_native', 'draggable_modal', 'elementpath',
            'inline', 'statusbar', 'style_formats_autohide', 'style_formats_merge', 'content_css_cors', 'inline_boundaries',
            'custom_colors', 'visual', 'allow_conditional_comments', 'allow_html_in_named_anchor', 'allow_unsafe_link_target',
            'convert_fonts_to_spans', 'keep_styles', 'remove_trailing_brs', 'indent_use_margin', 'browser_spellcheck',
            'allow_script_urls', 'convert_urls', 'relative_urls', 'remove_script_host', 'br_in_pre', 'end_container_on_empty_block',
            'nowrap', 'object_resizing', 'typeahead_urls', 'image_advtab', 'link_context_toolbar', 'paste_as_text', 'paste_enable_default_filters',
            'paste_filter_drop', 'paste_merge_formats', 'table_appearance_options', 'table_advtab', 'table_cell_advtab',
            'table_row_advtab', 'table_resize_bars', 'visualblocks_default_state', 'visualchars_default_state'
        ];

        var jsonValues = [
            'external_plugins', 'menu', 'style_formats', 'color_map', 'forced_root_block_attrs', 'protect',
            'formats', 'image_list', 'image_class_list', 'link_class_list', 'link_list', 'rel_list', 'target_list',
            'table_default_attributes', 'table_default_styles', 'table_class_list', 'template_replace_values'
        ];

        var removeValues = ['content_css'];

        var pluginValues = {
            wordcount       : 'wordcount',
            paste           : 'paste_as_text',
            visualblocks    : 'visualblocks_default_state',
            template        : 'templates'
        };

        boolValues.forEach(function (key) {
            config[key] = parseInt(config[key]) === 1 || config[key] === true;
        });

        jsonValues.forEach(function (key) {
            if (typeof config[key] === 'string') {
                config[key] = Ext.decode(config[key]);
            }
        });

        removeValues.forEach(function (key) {
            if (config[key] === '') {
                delete config[key];
            }
        });

        var plugins = config['plugins'].split(' ');

        Ext.iterate(pluginValues, function (key, plugin) {
            if (parseInt(config[plugin]) === 1 || config[plugin] === true) {
                if (plugins.indexOf(key) === -1) {
                    plugins.push(key);
                }
            } else {
                if (plugins.indexOf(key) !== -1) {
                    delete plugins[plugins.indexOf(key)];
                }
            }
        });

        config['plugins'] = plugins.join(' ');

        return config;
    }
};

MODx.loadRTE = function(id, configId) {
    var selector = '#' + (id || 'ta');

    if (ModTinyMCE.configs['config_default']) {
        var config = {
            selector                : selector,
            theme                   : 'silver',
            file_picker_callback    : ModTinyMCE.onBrowserCallback,
            setup                   : ModTinyMCE.onSetupCallback
        };

        if (ModTinyMCE.configs['config_' + configId]) {
            Ext.apply(config, ModTinyMCE.onFormatConfig(ModTinyMCE.configs['config_' + configId]));
        } else if (ModTinyMCE.configs['config_default']) {
            Ext.apply(config, ModTinyMCE.onFormatConfig(ModTinyMCE.configs['config_default']));
        }

        tinyMCE.remove(config['selector']);
        tinyMCE.init(config);
    }
};