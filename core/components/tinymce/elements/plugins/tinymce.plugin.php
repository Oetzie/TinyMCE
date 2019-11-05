<?php
/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

if (in_array($modx->event->name, ['OnManagerPageBeforeRender', 'OnRichTextEditorRegister', 'OnRichTextEditorInit', 'OnRichTextBrowserInit', 'OnTVInputRenderList', 'OnTVInputPropertiesList'], true)) {
    $instance = $modx->getService('tinymceplugins', 'TinyMCEPlugins', $modx->getOption('tinymce.core_path', null, $modx->getOption('core_path') . 'components/tinymce/') . 'model/tinymce/');

    if ($instance instanceof TinyMCE) {
        $method = lcfirst($modx->event->name);

        if (method_exists($instance, $method)) {
            $instance->$method($scriptProperties);
        }
    }
}