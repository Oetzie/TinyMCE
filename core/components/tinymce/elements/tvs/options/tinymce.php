<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

$instance = $modx->getService('tinymce', 'TinyMCE', $modx->getOption('tinymce.core_path', null, $modx->getOption('core_path') . 'components/tinymce/') . 'model/tinymce/');

if ($instance instanceof TinyMCE) {
    $modx->smarty->assign('tinymce', $modx->lexicon->fetch('tinymce.', true));

    return $modx->smarty->fetch($instance->config['templates_path'] . 'tvs/options/tinymce.tpl');
}

return '';
