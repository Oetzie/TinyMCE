<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class TinyMCEConfigCreateProcessor extends modObjectCreateProcessor
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

        if ($this->getProperty('default') === null) {
            $this->setProperty('default', 0);
        }

        $this->setProperty('config', '{}');

        return parent::initialize();
    }

    /**
     * @access public.
     * @return Mixed.
     */
    public function afterSave()
    {
        if ((int) $this->object->get('default') === 1) {
            $configs = $this->modx->getCollection($this->classKey, [
                'id:!='     => $this->object->get('id'),
                'default'   => 1
            ]);

            foreach ($configs as $config) {
                $config->set('default', 0);

                $config->save();
            }
        }

        return parent::afterSave();
    }
}

return 'TinyMCEConfigCreateProcessor';
