TinyMCE.panel.Config = function(config) {
    config = config || {};

    Ext.apply(config, {
        url         : TinyMCE.config.connector_url,
        baseParams  : {
            action      : 'mgr/configs/manage',
            id          : MODx.request.id
        },
        id          : 'tinymce-panel-config',
        cls         : 'container',
        items       : [{
            html        : '<h2>' + _('tinymce') + ': ' + config.record.name + '</h2>',
            cls         : 'modx-page-header'
        }, {
            layout      : 'form',
            items       : [{
                html        : '<p>' + _('tinymce.section_config_desc') + '</p>',
                bodyCssClass: 'panel-desc'
            }, {
                xtype       : 'modx-vtabs',
                deferredRender : false,
                items       : [{
                    title       : _('tinymce.config_category_integration'),
                    labelAlign  : 'top',
                    labelSeparator : '',
                    items       : [{
                        xtype       : 'textarea',
                        fieldLabel  : _('tinymce.config_plugins'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_plugins_desc'),
                        name        : 'plugins',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_plugins_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textarea',
                        fieldLabel  : _('tinymce.config_external_plugins'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_external_plugins_desc'),
                        name        : 'external_plugins',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_external_plugins_desc'),
                        cls         : 'desc-under'
                    }]
                }, {
                    title       : _('tinymce.config_category_user_interface'),
                    labelAlign  : 'top',
                    labelSeparator: '',
                    items       : [{
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_menubar'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_menubar_desc'),
                        name        : 'menubar',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_menubar_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_toolbar1'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_toolbar1_desc'),
                        name        : 'toolbar1',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_toolbar1_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_toolbar2'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_toolbar2_desc'),
                        name        : 'toolbar2',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_toolbar2_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_block_formats'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_block_formats_desc'),
                        name        : 'block_formats',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_block_formats_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_font_formats'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_font_formats_desc'),
                        name        : 'font_formats',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_font_formats_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_fontsize_formats'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_fontsize_formats_desc'),
                        name        : 'fontsize_formats',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_fontsize_formats_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_height'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_height_desc'),
                        name        : 'height',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_height_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_statusbar'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_statusbar_desc'),
                        name        : 'statusbar',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_statusbar_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_wordcount'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_wordcount_desc'),
                        name        : 'wordcount',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_wordcount_desc'),
                        cls         : 'desc-under'
                    }]
                }, {
                    title       : _('tinymce.config_category_content_formatting'),
                    labelAlign  : 'top',
                    labelSeparator: '',
                    items       : [{
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_forced_root_block'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_forced_root_block_desc'),
                        name        : 'forced_root_block',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_forced_root_block_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_remove_trailing_brs'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_remove_trailing_brs_desc'),
                        name        : 'remove_trailing_brs',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_remove_trailing_brs_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_body_class'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_body_class_desc'),
                        name        : 'body_class',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_body_class_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_body_id'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_body_id_desc'),
                        name        : 'body_id',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_body_id_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_content_css'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_content_css_desc'),
                        name        : 'content_css',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_content_css_desc'),
                        cls         : 'desc-under'
                    }]
                }, {
                    title       : _('tinymce.config_category_url_handling'),
                    labelAlign  : 'top',
                    labelSeparator: '',
                    items       : [{
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_convert_urls'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_convert_urls_desc'),
                        name        : 'convert_urls',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_convert_urls_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_relative_urls'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_relative_urls_desc'),
                        name        : 'relative_urls',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_relative_urls_desc'),
                        cls         : 'desc-under'
                    }]
                }, {
                    title       : _('tinymce.config_category_advanced_editing'),
                    labelAlign  : 'top',
                    labelSeparator : '',
                    items       : [{
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_paste_as_text'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_paste_as_text_desc'),
                        name        : 'paste_as_text',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_paste_as_text_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_image_advtab'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_image_advtab_desc'),
                        name        : 'image_advtab',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_image_advtab_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_table_advtab'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_table_advtab_desc'),
                        name        : 'table_advtab',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_table_advtab_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_table_appearance_options'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_table_appearance_options_desc'),
                        name        : 'table_appearance_options',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_table_appearance_options_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_visualblocks_default_state'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_visualblocks_default_state_desc'),
                        name        : 'visualblocks_default_state',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_visualblocks_default_state_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'checkbox',
                        boxLabel    : _('tinymce.config_browser_spellcheck'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_browser_spellcheck_desc'),
                        name        : 'browser_spellcheck',
                        anchor      : '100%',
                        inputValue  : 1,
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_browser_spellcheck_desc'),
                        cls         : 'desc-under'
                    }, {
                        xtype       : 'textfield',
                        fieldLabel  : _('tinymce.config_table_templates'),
                        description : MODx.expandHelp ? '' : _('tinymce.config_table_templates_desc'),
                        name        : 'templates',
                        anchor      : '100%',
                        listeners   : {
                            change      : {
                                fn          : this.onUpdateConfig,
                                scope       : this
                            }
                        }
                    }, {
                        xtype       : MODx.expandHelp ? 'label' : 'hidden',
                        html        : _('tinymce.config_table_templates_desc'),
                        cls         : 'desc-under'
                    }]
                }]
            }]
        }, {
            layout      : 'form',
            items       : [{
                html        : '<p>' + _('tinymce.section_demo_desc') + '</p>',
                bodyCssClass: 'panel-desc'
            }, {
                layout      : 'form',
                cls         : 'main-wrapper',
                items       : [{
                    xtype       : 'textarea',
                    hideLabel   : true,
                    name        : 'tinymce-demo',
                    id          : 'tinymce-demo',
                    anchor      : '100%',
                    value       : TinyMCE.config.default_text,
                    listeners   : {
                        afterrender : {
                            fn          : this.onUpdateConfig,
                            scope       : this
                        }
                    }
                }]
            }]
        }],
        listeners   : {
            'setup'     : {
                fn          : this.onSetup,
                scope       : this
            }
        }
    });

    TinyMCE.panel.Config.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.panel.Config, MODx.FormPanel, {
    initialized: false,

    onSetup: function() {
        if (!this.initialized) {
            this.getForm().setValues(this.record);

            this.initialized = true;
        }

        this.fireEvent('ready');
    },
    onUpdateConfig: function (tf) {
        var config = JSON.parse(JSON.stringify(this.record));

        if (tf.name !== 'tinymce-demo') {
            if (tf.xtype === 'checkbox') {
                config[tf.name] = tf.getValue() ? '1' : '0';
            } else {
                config[tf.name] = tf.getValue();
            }
        }

        this.record = config;

        Ext.apply(config, {
            selector                : '#tinymce-demo',
            theme                   : 'silver',
            file_picker_callback    : ModTinyMCE.onBrowserCallback,
            setup                   : ModTinyMCE.onSetupCallback
        });

        tinyMCE.remove('#tinymce-demo');

        tinyMCE.init(ModTinyMCE.onFormatConfig(config));
    }
});

Ext.reg('tinymce-panel-config', TinyMCE.panel.Config);