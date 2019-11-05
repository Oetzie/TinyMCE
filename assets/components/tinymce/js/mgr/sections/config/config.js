Ext.onReady(function() {
    MODx.load({
        xtype : 'tinymce-page-config'
    });
});

TinyMCE.page.Config = function(config) {
    config = config || {};

    config.buttons = [];

    if (TinyMCE.config.branding_url) {
        config.buttons.push({
            text        : 'TinyMCE ' + TinyMCE.config.version,
            cls         : 'x-btn-branding',
            handler     : this.loadBranding
        });
    }

    config.buttons.push({
        text        : '<i class="icon icon-arrow-left"></i>' + _('tinymce.back_to_configs'),
        handler     : this.toConfigsView,
        scope       : this
    }, {
        text        : _('save'),
        cls         : 'primary-button',
        id          : 'modx-abtn-save',
        method      : 'remote',
        process     : 'mgr/configs/manage',
        keys        : [{
            ctrl        : true,
            key         : MODx.config.keymap_save || 's'
        }]
    });

    config.buttons.push({
        text        : _('delete'),
        handler     : this.removeConfig,
        scope       : this
    });

    config.buttons.push({
        text        : _('cancel'),
        process     : 'cancel',
        params      : {
            a           : 'home',
            namespace   : MODx.request.namespace
        }
    });

    if (TinyMCE.config.branding_url_help) {
        config.buttons.push({
            text        : _('help_ex'),
            handler     : MODx.loadHelpPane,
            scope       : this
        });
    }

    Ext.applyIf(config, {
        formpanel   : 'tinymce-panel-config',
        components  : [{
            xtype       : 'tinymce-panel-config',
            record      : TinyMCE.config.record
        }]
    });

    TinyMCE.page.Config.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.page.Config, MODx.Component, {
    loadBranding: function(btn) {
        window.open(TinyMCE.config.branding_url);
    },
    toConfigsView: function() {
        MODx.loadPage('home', 'namespace=' + MODx.request.namespace);
    },
    removeConfig: function() {
        MODx.msg.confirm({
            title       : _('tinymce.config_remove'),
            text        : _('tinymce.config_remove_confirm'),
            url         : TinyMCE.config.connector_url,
            params      : {
                action      : 'mgr/conig/remove',
                id          : TinyMCE.config.record.id
            },
            listeners   : {
                'success'   : {
                    fn          : function() {
                        MODx.loadPage('?a=home&namespace=' + MODx.request.namespace);
                    },
                    scope       : this
                }
            }
        });
    }
});

Ext.reg('tinymce-page-config', TinyMCE.page.Config);