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
	 * TinyMCE; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
	 * Suite 330, Boston, MA 02111-1307 USA
	 */
	 
	class TinyMCEInputRender extends modTemplateVarInputRender {
		/**
		 * @acces public.
		 * @var Object.
		 */
		public $tinyMCE = null;
		
		/**
		 * @acces public.
		 * @return Array.
		 */
		public function getLexiconTopics() {
			return array('tinymce:default');
		}
		
		/**
		 * @acces public.
		 * @param $value Mixed.
		 * @param $param Array.
		 * @return Mixed.
		 */
		public function process($value, array $params = array()) {
			$this->modx->controller->addLexiconTopic('tinymce:default');
			
			require_once $this->modx->getOption('tinymce.core_path', null, $this->modx->getOption('core_path').'components/tinymce/').'/tinymce.class.php';
		
			$this->tinyMCE = new TinyMCE($this->modx);
			
			$this->setPlaceholder('toolbar1', $this->modx->getOption('toolbar1', $params, 'undo redo | bold italic underline strikethrough | styleselect bullist numlist outdent indent'));
			$this->setPlaceholder('toolbar2', $this->modx->getOption('toolbar2', $params, ''));
			$this->setPlaceholder('toolbar3', $this->modx->getOption('toolbar3', $params, ''));
			$this->setPlaceholder('plugins', $this->modx->getOption('plugins', $params, ''));
			
			if ($this->modx->getOption('use_editor') && 'TinyMCE' == $this->modx->getOption('which_editor')) {
				$properties = array(
					'editor' 	=> $richtext,
					'elements' 	=> array()
				);

				$onRichTextEditorInit = $this->modx->invokeEvent('OnRichTextEditorInit', $properties);
	            
	            if (is_array($onRichTextEditorInit)) {
					$onRichTextEditorInit = implode('', $onRichTextEditorInit);
            	}
            	
            	$this->setPlaceholder('onRichTextEditorInit', $onRichTextEditorInit);
			}
		}
		
		/**
		 * @acces public.
		 * @return String.
		 */
		public function getTemplate() {
			return $this->tinyMCE->config['templatesPath'].'tinymce.tpl';
		}
	}
	
	return 'TinyMCEInputRender';
	
?>