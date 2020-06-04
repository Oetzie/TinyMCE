TinyMCE.grid.Configs = function(config) {
    config = config || {};

    config.tbar = [{
        text        : _('tinymce.config_create'),
        cls         : 'primary-button',
        handler     : this.createConfig,
        scope       : this
    }, {
        text        : _('bulk_actions'),
        menu        : [{
            text        : '<i class="x-menu-item-icon icon icon-upload"></i> ' + _('tinymce.configs_import'),
            handler     : this.importConfigs,
            scope       : this
        }, {
            text        : '<i class="x-menu-item-icon icon icon-download"></i> ' + _('tinymce.configs_export'),
            handler     : this.exportConfigs,
            scope       : this
        }]
    }, '->', {
        xtype       : 'textfield',
        name        : 'tinymce-filter-configs-search',
        id          : 'tinymce-filter-configs-search',
        emptyText   : _('search') + '...',
        listeners   : {
            'change'    : {
                fn          : this.filterSearch,
                scope       : this
            },
            'render'    : {
                fn          : function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key     : Ext.EventObject.ENTER,
                        fn      : this.blur,
                        scope   : cmp
                    });
                },
                scope       : this
            }
        }
    }, {
        xtype       : 'button',
        cls         : 'x-form-filter-clear',
        id          : 'tinymce-filter-configs-clear',
        text        : _('filter_clear'),
        listeners   : {
            'click'     : {
                fn          : this.clearFilter,
                scope       : this
            }
        }
    }];

    var columns = new Ext.grid.ColumnModel({
        columns     : [{
            header      : _('tinymce.label_config_name'),
            dataIndex   : 'name_formatted',
            sortable    : true,
            editable    : false,
            width       : 250,
            fixed       : true,
            renderer    : this.renderName
        }, {
            header      : _('tinymce.label_config_description'),
            dataIndex   : 'description',
            sortable    : false,
            editable    : false,
            width       : 250
        }, {
            header      : _('last_modified'),
            dataIndex   : 'editedon',
            sortable    : true,
            editable    : false,
            fixed       : true,
            width       : 200,
            renderer    : this.renderDate
        }]
    });
    
    Ext.applyIf(config, {
        cm          : columns,
        id          : 'tinymce-grid-configs',
        url         : TinyMCE.config.connector_url,
        baseParams  : {
            action      : 'mgr/configs/getlist'
        },
        fields      : ['id', 'name', 'description', 'default', 'editedon', 'name_formatted'],
        paging      : true,
        pageSize    : MODx.config.default_per_page > 30 ? MODx.config.default_per_page : 30,
        sortBy      : 'name'
    });

    TinyMCE.grid.Configs.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.grid.Configs, MODx.grid.Grid, {
    filterSearch: function(tf, nv, ov) {
        this.getStore().baseParams.query = tf.getValue();
        
        this.getBottomToolbar().changePage(1);
    },
    clearFilter: function() {
        this.getStore().baseParams.query = '';
        
        Ext.getCmp('tinymce-filter-configs-search').reset();
        
        this.getBottomToolbar().changePage(1);
    },
    getMenu: function() {
        var menu = [];

        menu.push({
            text    : '<i class="x-menu-item-icon icon icon-edit"></i>' + _('tinymce.config_update'),
            handler : this.updateConfig,
            scope   : this
        }, '-', {
            text    : '<i class="x-menu-item-icon icon icon-cogs"></i>' + _('tinymce.config_manage'),
            handler : this.manageConfig,
            scope   : this
        }, '-', {
            text    : '<i class="x-menu-item-icon icon icon-download"></i>' + _('tinymce.config_export'),
            handler : this.exportConfig,
            scope   : this
        });

        if (parseInt(this.menu.record.default) !== 1) {
            menu.push('-', {
                text    : '<i class="x-menu-item-icon icon icon-times"></i>' + _('tinymce.config_remove'),
                handler : this.removeConfig,
                scope   : this
            });
        }

        return menu;
    },
    createConfig: function(btn, e) {
        if (this.createConfigWindow) {
            this.createConfigWindow.destroy();
        }
        
        this.createConfigWindow = MODx.load({
            xtype       : 'tinymce-window-config-create',
            closeAction : 'close',
            listeners   : {
                'success'   : {
                    fn          : this.refresh,
                    scope       : this
                }
            }
        });
        
        this.createConfigWindow.show(e.target);
    },
    updateConfig: function(btn, e) {
        if (this.updateConfigWindow) {
            this.updateConfigWindow.destroy();
        }
        
        this.updateConfigWindow = MODx.load({
            xtype       : 'tinymce-window-config-update',
            record      : this.menu.record,
            closeAction : 'close',
            listeners   : {
                'success'   : {
                    fn          : this.refresh,
                    scope       : this
                }
            }
        });
        
        this.updateConfigWindow.setValues(this.menu.record);
        this.updateConfigWindow.show(e.target);
    },
    exportConfig: function(btn, e) {
        window.location = TinyMCE.config.connector_url + '?action=mgr/export&HTTP_MODAUTH=' + MODx.siteId + '&id=' + this.menu.record.id;
    },
    manageConfig: function(btn, e) {
        MODx.loadPage('?a=config/manage&namespace=' + MODx.request.namespace + '&id=' + this.menu.record.id);
    },
    removeConfig: function() {
        MODx.msg.confirm({
            title       : _('tinymce.config_remove'),
            text        : _('tinymce.config_remove_confirm'),
            url         : TinyMCE.config.connector_url,
            params      : {
                action      : 'mgr/configs/remove',
                id          : this.menu.record.id
            },
            listeners   : {
                'success'   : {
                    fn          : this.refresh,
                    scope       : this
                }
            }
        });
    },
    importConfigs: function(btn, e) {
        if (this.importConfigsWindow) {
            this.importConfigsWindow.destroy();
        }

        this.importConfigsWindow = MODx.load({
            xtype       : 'tinymce-window-configs-import',
            closeAction : 'close',
            listeners   : {
                'success'   : {
                    fn          : function(response) {
                        MODx.msg.status({
                            title   : _('success'),
                            message : response.a.result.message,
                            delay   : 4
                        });

                        this.refresh();
                    },
                    scope       : this
                },
                'failure'   : {
                    fn          : function(response) {
                        MODx.msg.alert(_('failure'), response.message);
                    },
                    scope       : this
                }
            }
        });

        this.importConfigsWindow.setValues(this.menu.record);
        this.importConfigsWindow.show(e.target);
    },
    exportConfigs: function(btn, e) {
        window.location = TinyMCE.config.connector_url + '?action=mgr/export&HTTP_MODAUTH=' + MODx.siteId;
    },
    renderName: function(d, c, e) {
        if (parseInt(e.json.default) === 1) {
            return '<strong>' + d + '</strong>';
        }

        return d;
    },
    renderBoolean: function(d, c) {
        c.css = parseInt(d) === 1 || d ? 'green' : 'red';

        return parseInt(d) === 1 || d ? _('yes') : _('no');
    },
    renderDate: function(a) {
        if (Ext.isEmpty(a)) {
            return '—';
        }
        
        return a;
    }
});

Ext.reg('tinymce-grid-configs', TinyMCE.grid.Configs);

TinyMCE.window.CreateConfig = function(config) {
    config = config || {};
    
    Ext.applyIf(config, {
        autoHeight  : true,
        title       : _('tinymce.config_create'),
        url         : TinyMCE.config.connector_url,
        baseParams  : {
            action      : 'mgr/configs/create'
        },
        fields      : [{
            xtype       : 'textfield',
            fieldLabel  : _('tinymce.label_config_name'),
            description : MODx.expandHelp ? '' : _('tinymce.label_config_name_desc'),
            name        : 'name',
            anchor      : '100%',
            allowBlank  : false
        }, {
            xtype       : MODx.expandHelp ? 'label' : 'hidden',
            html        : _('tinymce.label_config_name_desc'),
            cls         : 'desc-under'
        }, {
            xtype       : 'textarea',
            fieldLabel  : _('tinymce.label_config_description'),
            description : MODx.expandHelp ? '' : _('tinymce.label_config_description_desc'),
            name        : 'description',
            anchor      : '100%'
        }, {
            xtype       : MODx.expandHelp ? 'label' : 'hidden',
            html        : _('tinymce.label_config_description_desc'),
            cls         : 'desc-under'
        }, {
            xtype       : 'checkbox',
            fieldLabel  : _('tinymce.label_config_default'),
            boxLabel    : _('tinymce.label_config_default_desc'),
            name        : 'default',
            inputValue  : 1
        }]
    });

    TinyMCE.window.CreateConfig.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.window.CreateConfig, MODx.Window);

Ext.reg('tinymce-window-config-create', TinyMCE.window.CreateConfig);

TinyMCE.window.UpdateConfig = function(config) {
    config = config || {};
    
    Ext.applyIf(config, {
        autoHeight  : true,
        title       : _('tinymce.config_update'),
        url         : TinyMCE.config.connector_url,
        baseParams  : {
            action      : 'mgr/configs/update'
        },
        fields      : [{
            xtype       : 'hidden',
            name        : 'id'
        }, {
            xtype       : 'textfield',
            fieldLabel  : _('tinymce.label_config_name'),
            description : MODx.expandHelp ? '' : _('tinymce.label_config_name_desc'),
            name        : 'name',
            anchor      : '100%',
            allowBlank  : false
        }, {
            xtype       : MODx.expandHelp ? 'label' : 'hidden',
            html        : _('tinymce.label_config_name_desc'),
            cls         : 'desc-under'
        }, {
            xtype       : 'textarea',
            fieldLabel  : _('tinymce.label_config_description'),
            description : MODx.expandHelp ? '' : _('tinymce.label_config_description_desc'),
            name        : 'description',
            anchor      : '100%'
        }, {
            xtype       : MODx.expandHelp ? 'label' : 'hidden',
            html        : _('tinymce.label_config_description_desc'),
            cls         : 'desc-under'
        }, {
            xtype       : 'checkbox',
            fieldLabel  : _('tinymce.label_config_default'),
            boxLabel    : _('tinymce.label_config_default_desc'),
            name        : 'default',
            inputValue  : 1
        }]
    });

    TinyMCE.window.UpdateConfig.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.window.UpdateConfig, MODx.Window);

Ext.reg('tinymce-window-config-update', TinyMCE.window.UpdateConfig);

TinyMCE.window.ImportConfigs = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        autoHeight  : true,
        title       : _('tinymce.configs_import'),
        url         : TinyMCE.config.connector_url,
        baseParams  : {
            action      : 'mgr/import'
        },
        fileUpload  : true,
        fields      : [{
            xtype       : 'fileuploadfield',
            fieldLabel  : _('tinymce.label_import_file'),
            description : MODx.expandHelp ? '' : _('tinymce.label_import_file_desc'),
            name        : 'file',
            anchor      : '100%',
            allowBlank  : false,
            buttonText  : _('upload.buttons.choose')
        }, {
            xtype       : MODx.expandHelp ? 'label' : 'hidden',
            html        : _('tinymce.label_import_file_desc'),
            cls         : 'desc-under'
        }, {
            xtype       : 'checkbox',
            hideLabel   : true,
            boxLabel    : _('tinymce.label_import_overwrite_default'),
            description : MODx.expandHelp ? '' : _('tinymce.label_import_overwrite_default_desc'),
            name        : 'overwrite_default',
            anchor      : '100%',
            inputValue  : 1
        }, {
            xtype       : MODx.expandHelp ? 'label' : 'hidden',
            html        : _('tinymce.label_import_overwrite_default_desc'),
            cls         : 'desc-under'
        }],
        saveBtnText : _('import')
    });

    TinyMCE.window.ImportConfigs.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.window.ImportConfigs, MODx.Window);

Ext.reg('tinymce-window-configs-import', TinyMCE.window.ImportConfigs);