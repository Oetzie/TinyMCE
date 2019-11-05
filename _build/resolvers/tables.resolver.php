<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modx->addPackage('tinymce', $modx->getOption('tinymce.core_path', null, $modx->getOption('core_path') . 'components/tinymce/') . 'model/');

            $manager = $modx->getManager();

            $manager->createObjectContainer('TinyMCEConfig');

            break;
    }
}

return true;
