<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */
    
class TinyMCEConfigRemoveProcessor extends modObjectRemoveProcessor {
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
}

return 'TinyMCEConfigRemoveProcessor';
