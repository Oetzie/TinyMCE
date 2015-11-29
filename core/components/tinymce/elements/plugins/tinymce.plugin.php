<?php
	
	/**
	 * TinyMCE
	 *
	 * Copyright 2015 by Oene Tjeerd de Bruin <info@oetzie.nl>
	 *
	 * This file is part of TinyMCE, a real estate property listings component
	 * for MODX Revolution.
	 *
	 * TinyMCE is free software; you can redistribute it and/or modify it under
	 * the terms of the GNU General Public License as published by the Free Software
	 * Foundation; either version 2 of the License, or (at your option) any later
	 * version.
	 *
	 * TinyMCE is distributed in the hope that it will be useful, but WITHOUT ANY
	 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
	 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License along with
	 * Custom TVs; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
	 * Suite 330, Boston, MA 02111-1307 USA
	 */

	$corePath = $modx->getOption('tinymce.core_path', null, $modx->getOption('core_path').'components/tinymce/');

	if ($modx->event->name == 'OnRichTextEditorRegister') {
    	$modx->event->output('TinyMCE');
		
    	return;
	}

	$modx->lexicon->load('tinymce:default');

	require_once $corePath.'/tinymce.class.php';

	$tinyMCE = new TinyMCE($modx, $scriptProperties);

	switch ($modx->event->name) {
		case 'OnRichTextEditorInit':
		case 'OnRichTextBrowserInit':
       		if ($modx->getOption('use_editor', false) && 'TinyMCE' == $modx->getOption('which_editor', '')) {
				if ('OnRichTextEditorInit' == $modx->event->name) {
					$script = $tinyMCE->setJavascript('editor');
				} else {
					$script = $tinyMCE->setJavascript('browser');
				}

				$modx->event->output($script);
			}

			break;
		case 'OnTVInputRenderList':
        	$modx->event->output($corePath.'elements/tvs/input/');

       		break;
    	case 'OnTVInputPropertiesList':	
        	$modx->event->output($corePath.'elements/tvs/inputoptions/');

        	break;
    	case 'OnManagerPageBefoOnTVInputRenderListreRender':
        	break;
		default:
			break;
	}

	return '';
	
?>