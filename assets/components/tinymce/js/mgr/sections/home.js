Ext.onReady(function() {
    MODx.load({
        xtype : 'tinymce-page-home'
    });
});

TinyMCE.page.Home = function(config) {
    config = config || {};

    config.buttons = [];

    if (TinyMCE.config.branding_url) {
        config.buttons.push({
            text        : 'TinyMCE ' + TinyMCE.config.version,
            cls         : 'x-btn-branding',
            handler     : this.loadBranding
        });
    }

    if (TinyMCE.config.branding_url_help) {
        config.buttons.push({
            text        : _('help_ex'),
            handler     : MODx.loadHelpPane,
            scope       : this
        });
    }

    Ext.applyIf(config, {
        formpanel   : 'tinymce-panel-home',
        components  : [{
            xtype       : 'tinymce-panel-home',
            renderTo    : 'tinymce-panel-home-div'
        }]
    });

    TinyMCE.page.Home.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.page.Home, MODx.Component, {
    loadBranding: function(btn) {
        window.open(TinyMCE.config.branding_url);
    }
});

Ext.reg('tinymce-page-home', TinyMCE.page.Home);