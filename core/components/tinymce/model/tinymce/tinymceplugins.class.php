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

        $this->modx->controller->addHtml('<script type="text/javascript">
            Ext.onReady(function() {
                TinyMCE.config.connector_url = "' . $this->config['connector_url'] . '";
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
    public function onRichTextEditorInit(array $properties = [])
    {
        $useEditor = $this->modx->getOption('use_editor');
        $whichEditor = $this->modx->getOption('which_editor');

        if ($useEditor && $whichEditor === 'TinyMCE') {
            $this->modx->controller->addJavascript($this->config['js_url'] . 'tinymce/tinymce.min.js');
            $this->modx->controller->addJavascript($this->config['js_url'] . 'modtinymce.js');

            $this->modx->controller->addHtml('<script type="text/javascript">
                Ext.onReady(function() {
                    ModTinyMCE.configs = ' . $this->modx->toJSON($this->formatConfigs($this->getConfigs())) . ';
                });
            </script>');

            if (isset($_GET['a']) && in_array($_GET['a'], ['resource/create', 'resource/update'], true)) {
                if (isset($properties['resource']) && (int) $properties['resource']->get('richtext') === 1) {
                    $this->modx->controller->addHtml('<script type="text/javascript">
                        Ext.onReady(function() {
                            MODx.loadRTE();
                        });
                    </script>');
                }
            }
        }
    }

    /**
     * @access public.
     * @param Array $properties.
     */
    public function onRichTextBrowserInit(array $properties = [])
    {
        $useEditor = $this->modx->getOption('use_editor');
        $whichEditor = $this->modx->getOption('which_editor');

        if ($useEditor && $whichEditor === 'TinyMCE') {
            $this->modx->controller->addJavascript($this->config['js_url'] . 'tinymce/tinymce.min.js');
            $this->modx->controller->addJavascript($this->config['js_url'] . 'modtinymce.js');

            $this->modx->event->output('ModTinyMCE.onBrowserSelectCallback');
        }
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
}
