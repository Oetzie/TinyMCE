<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class TinyMCEConfigExportProcessor extends modObjectProcessor
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
        $name = strtolower($this->classKey . '-' . str_replace(' ', '-', $this->modx->getOption('site_name'))) . '_' .  date('Y-m-d@H:i:s') . '.xml';

        header('Content-Disposition: attachment; filename="' . $name);
        header('Content-Type: text/xml');

        return $this->getExportData();
    }

    /**
     * @access public.
     * @return String.
     */
    public function getExportData()
    {
        $output = [];

        foreach ($this->getExportIds() as $id) {
            $object = $this->modx->getObject($this->classKey, [
                'id' => $id
            ]);

            if ($object) {
                $output[] = '<config>
                    <name><![CDATA[' . $object->get('name') . ']]></name>
                    <description><![CDATA[' . $object->get('description') . ']]></description>
                    <default>' . $object->get('default') . '</default>
                    <config><![CDATA[' . $object->get('config') . ']]></config>
                </config>';
            }
        }

        return '<?xml version="1.0" encoding="UTF-8"?>
        <data package="tinymce" exported="' . date('Y-m-d@H:i:s') . '" total="' . count($output) . '">
            ' . implode(PHP_EOL, $output) . '
        </data>';
    }

    /**
     * @access public.
     * @return Array.
     */
    public function getExportIds()
    {
        if ($this->getProperty('id') === null) {
            $output = [];

            foreach ($this->modx->getCollection($this->classKey) as $object) {
                $output[] = $object->get('id');
            }

            return $output;
        }

        return [$this->getProperty('id')];
    }
}

return 'TinyMCEConfigExportProcessor';
