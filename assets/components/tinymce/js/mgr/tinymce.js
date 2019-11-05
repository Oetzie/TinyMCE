var TinyMCE = function(config) {
    config = config || {};

    TinyMCE.superclass.constructor.call(this, config);
};

Ext.extend(TinyMCE, Ext.Component, {
    page    : {},
    window  : {},
    grid    : {},
    tree    : {},
    panel   : {},
    combo   : {},
    config  : {}
});

Ext.reg('tinymce', TinyMCE);

TinyMCE = new TinyMCE();