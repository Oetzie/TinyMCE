<?php

	/**
	 * TinyMCE
	 *
	 * Copyright 2016 by Oene Tjeerd de Bruin <info@oetzie.nl>
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
	 * TinyMCE; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
	 * Suite 330, Boston, MA 02111-1307 USA
	 */
	 
	$tinyMCE = $modx->getService('tinymce', 'TinyMCE', $modx->getOption('tinymce.core_path', null, $modx->getOption('core_path').'components/tinymce/').'model/tinymce/');

	$modx->lexicon->load($modx->getOption('language', $tinyMCE->config));
	$modx->controller->addLexiconTopic($modx->getOption('language', $tinyMCE->config));
	
	$modx->smarty->assign('tinymce', $modx->lexicon->fetch('tinymce.', true));
	
	return $modx->smarty->fetch($modx->getOption('templates_path', $tinyMCE->config).'tinymceinputoptions.tpl');
	
?>