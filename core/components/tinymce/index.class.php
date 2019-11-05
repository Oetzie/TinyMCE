<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

abstract class TinyMCEManagerController extends modExtraManagerController
{
    /**
     * @access public.
     * @return Mixed.
     */
    public function initialize()
    {
        $this->modx->getService('tinymce', 'TinyMCE', $this->modx->getOption('tinymce.core_path', null, $this->modx->getOption('core_path') . 'components/tinymce/') . 'model/tinymce/');

        $this->addCss($this->modx->tinymce->config['css_url'] . 'mgr/tinymce.css');

        $this->addJavascript($this->modx->tinymce->config['js_url'] . 'mgr/tinymce.js');

        $this->addHtml('<script type="text/javascript">
            Ext.onReady(function() {
                MODx.config.help_url = "' . $this->modx->tinymce->getHelpUrl() . '";
                
                TinyMCE.config = ' . $this->modx->toJSON(array_merge($this->modx->tinymce->config, [
                    'branding_url'          => $this->modx->tinymce->getBrandingUrl(),
                    'branding_url_help'     => $this->modx->tinymce->getHelpUrl()
                ])) . ';
            });
        </script>');

        return parent::initialize();
    }

    /**
     * @access public.
     * @return Array.
     */
    public function getLanguageTopics()
    {
        return $this->modx->tinymce->config['lexicons'];
    }

    /**
     * @access public.
     * @returns Boolean.
     */
    public function checkPermissions()
    {
        return $this->modx->hasPermission('tinymce');
    }
}

class IndexManagerController extends TinyMCEManagerController
{
    /**
     * @access public.
     * @return String.
     */
    public static function getDefaultController()
    {
        return 'home';
    }
}
