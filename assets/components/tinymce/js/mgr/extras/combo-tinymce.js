TinyMCE.combo.Config = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        url         : TinyMCE.config.connector_url,
        baseParams  : {
            action      : 'mgr/configs/getlist',
            combo       : true
        },
        fields      : ['id', 'name', 'description'],
        hiddenName  : 'tinymce_config',
        pageSize    : 15,
        valueField  : 'id',
        displayField : 'name',
        tpl         : new Ext.XTemplate('<tpl for=".">' +
            '<div class="x-combo-list-item">' +
                '<span style="font-weight: bold;">{name:htmlEncode}</span>' +
                '<br />{description:htmlEncode}' +
            '</div>' +
        '</tpl>')
    });

    TinyMCE.combo.Config.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE.combo.Config, MODx.combo.ComboBox);

Ext.reg('tinymce-combo-config', TinyMCE.combo.Config);