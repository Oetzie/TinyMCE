<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

require_once __DIR__ . '/tinymce.class.php';

class TinyMCEPlugins extends TinyMCE
{
    /**
     * @access public.
     */
    public function onManagerPageBeforeRender()
    {
        $this->modx->controller->addJavascript($this->config['js_url'] . 'mgr/tinymce.js');

        $this->modx->controller->addJavascript($this->config['js_url'] . 'mgr/extras/combo-tinymce.js');

        $this->modx->controller->addJavascript($this->config['js_url'] . 'tinymce/tinymce.min.js');
        $this->modx->controller->addJavascript($this->config['js_url'] . 'modtinymce.js');

        $this->modx->controller->addHtml('<script type="text/javascript">
            Ext.onReady(function() {
                TinyMCE.config.connector_url = "' . $this->config['connector_url'] . '";
                
                ModTinyMCE.configs = ' . $this->modx->toJSON($this->formatConfigs($this->getConfigs())) . ';
            });
        </script>');

        if (is_array($this->config['lexicons'])) {
            foreach ($this->config['lexicons'] as $lexicon) {
                $this->modx->controller->addLexiconTopic($lexicon);
            }
        } else {
            $this->modx->controller->addLexiconTopic($this->config['lexicons']);
        }
    }

    /**
     * @access public.
     * @param Array $properties.
     */
    public function onRichTextEditorRegister(array $properties = [])
    {
        $this->modx->event->output('TinyMCE');
    }

    /**
     * @access public.
     * @param Array $properties.
     */
    public function onTVInputRenderList(array $properties = [])
    {
        $this->modx->event->output($this->config['elements_path'] . 'tvs/input');
    }

    /**
     * @access public.
     * @param Array $properties.
     */
    public function onTVInputPropertiesList(array $properties = [])
    {
        $this->modx->event->output($this->config['elements_path'] . 'tvs/options/');
    }

    /**
     * @access public.
     * @param Array $properties.
     */
    public function OnClientSettingsRegisterSettings(array $properties = [])
    {
        $this->modx->controller->addLexiconTopic('tinymce:clientsettings');

        if (isset($properties['settings'])) {
            $properties['settings']['tinymce'] = [
                'xtype'         => 'textarea',
                'name'          => $this->modx->lexicon('clientsettings.tinymce.name'),
                'fields'        => [[
                    'xtype'         => 'tinymce-combo-config',
                    'name'          => 'config',
                    'title'         => $this->modx->lexicon('clientsettings.tinymce.label_config'),
                    'description'   => $this->modx->lexicon('clientsettings.tinymce.label_config_desc')
                ]]
            ];
        }
    }
}
