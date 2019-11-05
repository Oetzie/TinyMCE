<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

require_once dirname(__DIR__) . '/index.class.php';

class TinyMCEHomeManagerController extends TinyMCEManagerController
{
    /**
     * @access public.
     */
    public function loadCustomCssJs()
    {
        $this->addJavascript($this->modx->tinymce->config['js_url'] . 'mgr/widgets/home.panel.js');

        $this->addJavascript($this->modx->tinymce->config['js_url'] . 'mgr/widgets/configs.grid.js');

        $this->addLastJavascript($this->modx->tinymce->config['js_url'] . 'mgr/sections/home.js');
    }

    /**
     * @access public.
     * @return String.
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('tinymce');
    }

    /**
     * @access public.
     * @return String.
     */
    public function getTemplateFile()
    {
        return $this->modx->tinymce->config['templates_path'] . 'home.tpl';
    }
}
