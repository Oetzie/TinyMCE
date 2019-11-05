<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class TinyMCEInputRender extends modTemplateVarInputRender
{
    /**
     * @access public.
     * @param Mixed $value.
     * @param Array $params.
     * @return Mixed.
     */
    public function process($value, array $params = [])
    {
        $this->modx->getService('tinymce', 'TinyMCE', $this->modx->getOption('tinymce.core_path', null, $this->modx->getOption('core_path') . 'components/tinymce/') . 'model/tinymce/');

        foreach ($params as $key => $param) {
            $this->setPlaceholder($key, $param);
        }

        $useEditor = $this->modx->getOption('use_editor');
        $whichEditor = $this->modx->getOption('which_editor');

        if ($useEditor && !empty($whichEditor)) {
            $onRichTextEditorInit = $this->modx->invokeEvent('OnRichTextEditorInit', [
                'editor'    => $whichEditor,
                'elements'  => []
            ]);

            if (is_array($onRichTextEditorInit)) {
                $onRichTextEditorInit = implode('', $onRichTextEditorInit);
            }

            $this->setPlaceholder('onRichTextEditorInit', $onRichTextEditorInit);
        }
    }

    /**
     * @access public.
     * @return String.
     */
    public function getTemplate()
    {
        return $this->modx->tinymce->config['templates_path'] . 'tvs/input/tinymce.tpl';
    }
}

return 'TinyMCEInputRender';
