<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */
    
class TinyMCEConfigManageProcessor extends modObjectUpdateProcessor
{
    /**
     * @access public.
     * @var String.
     */
    public $classKey = 'TinyMCEConfig';

    /**
     * @access public.
     * @var Array.
     */
    public $languageTopics = ['tinymce:default'];

    /**
     * @access public.
     * @var String.
     */
    public $objectType = 'tinymce.config';

    /**
     * @access public.
     * @return Mixed.
     */
    public function initialize()
    {
        $this->modx->getService('tinymce', 'TinyMCE', $this->modx->getOption('tinymce.core_path', null, $this->modx->getOption('core_path') . 'components/tinymce/') . 'model/tinymce/');

        return parent::initialize();
    }

    /**
     * @access public.
     * @return Boolean.
     */
    public function beforeSave()
    {
        $config = array_merge((array) json_decode($this->object->get('config'), true), $this->getProperties());

        foreach (['id', 'action', 'tinymce-demo'] as $key) {
            if (isset($config[$key])) {
                unset($config[$key]);
            }
        }

        foreach(['statusbar', 'wordcount', 'remove_trailing_brs', 'convert_urls', 'relative_urls', 'paste_as_text', 'image_advtab', 'table_advtab', 'table_appearance_options', 'visualblocks_default_state', 'browser_spellcheck'] as $key) {
            if (!isset($config[$key])) {
                $config[$key] = '0';
            }
        }

        $this->object->set('config', json_encode($config));

        return parent::beforeSave();
    }
}

return 'TinyMCEConfigManageProcessor';
