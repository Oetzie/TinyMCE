<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class TinyMCEConfigImportProcessor extends modObjectProcessor
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
     * @return Mixed.
     */
    public function process()
    {
        if (isset($_FILES['file']['tmp_name']) && file_exists($_FILES['file']['tmp_name'])) {
            $data = simplexml_load_file($_FILES['file']['tmp_name'], 'SimpleXMLElement', LIBXML_NOCDATA);

            if ($data) {
                $package = (string) $data->attributes()->{'package'};

                if ($package === 'tinymce') {
                    $count      = 0;
                    $default    = null;

                    foreach ($data->{'config'} as $value) {
                        $object = $this->modx->newObject($this->classKey);

                        if ($object) {
                            if (isset($value->name)) {
                                $object->set('name', (string) $value->name);
                            }

                            if (isset($value->description)) {
                                $object->set('description', (string) $value->description);
                            }

                            if (isset($value->default) && (int) $this->getProperty('overwrite_default') === 1) {
                                $object->set('default', (int) $value->default);
                            }

                            if (isset($value->config)) {
                                $object->set('config', (string) $value->config);
                            } else {
                                $object->set('config', '{}');
                            }

                            if ($object->save()) {
                                if ((int) $object->get('default') === 1) {
                                    $default = $object->get('id');
                                }

                                $count++;
                            }
                        }
                    }

                    if ($default !== null) {
                        $objects = $this->modx->getCollection($this->classKey, [
                            'id:!='     => $default,
                            'default'   => 1
                        ]);

                        foreach ($objects as $object) {
                            $object->set('default', 0);

                            $object->save();
                        }
                    }

                    return $this->success($this->modx->lexicon('tinymce.import_config_success', [
                        'configs' => $count
                    ]));
                }
            }
        }

        return $this->failure($this->modx->lexicon('tinymce.import_config_failure'));
    }
}

return 'TinyMCEConfigImportProcessor';
