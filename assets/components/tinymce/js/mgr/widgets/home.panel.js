TinyMCE.panel.Home = function(config) {
    config = config || {};
    
    Ext.apply(config, {
        id          : 'tinymce-panel-home',
        cls         : 'container',
        items       : [{
            html        : '<h2>' + _('tinymce') + '</h2>',
            cls         : 'modx-page-header'
        }, {
            layout      : 'form',
            items       : [{
                html            : '<p>' + _('tinymce.configs_desc') + '</p>',
                bodyCssClass    : 'panel-desc'
            }, {
                xtype           : 'tinymce-grid-configs',
                cls             : 'main-wrapper',
                preventRender   : true
            }]
        }]
    });

    TinyMCE.panel.Home.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.panel.Home, MODx.FormPanel);

Ext.reg('tinymce-panel-home', TinyMCE.panel.Home);