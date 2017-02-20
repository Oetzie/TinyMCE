<?php

	/**
	 * TinyMCE
	 *
	 * Copyright 2017 by Oene Tjeerd de Bruin <info@oetzie.nl>
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

	class TinyMCE {
		/**
		 * @acces public.
		 * @var Object.
		 */
		public $modx;
		
		/**
		 * @acces public.
		 * @var Array.
		 */
		public $config = array();
		
		/**
		 * @acces public.
		 * @var Array.
		 */
		public $mce = array();
		
		/**
		 * @acces public.
		 * @param Object $modx.
		 * @param Array $config.
		 */
		function __construct(modX &$modx, array $config = array()) {
			$this->modx =& $modx;
			
			$corePath 		= $this->modx->getOption('tinymce.core_path', $config, $this->modx->getOption('core_path').'components/tinymce/');
			$assetsUrl 		= $this->modx->getOption('tinymce.assets_url', $config, $this->modx->getOption('assets_url').'components/tinymce/');
			$assetsPath 	= $this->modx->getOption('tinymce.assets_path', $config, $this->modx->getOption('assets_path').'components/tinymce/');

			$this->config = array_merge(array(
				'namespace'				=> $this->modx->getOption('namespace', $config, 'tinymce'),
				'helpurl'				=> $this->modx->getOption('namespace', $config, 'tinymce'),
				'language'				=> 'tinymce:default',
				'base_path'				=> $corePath,
				'core_path' 			=> $corePath,
				'model_path' 			=> $corePath.'model/',
				'processors_path' 		=> $corePath.'processors/',
				'elements_path' 		=> $corePath.'elements/',
				'plugins_path' 			=> $corePath.'elements/plugins/',
				'snippets_path' 		=> $corePath.'elements/snippets/',
				'tvs_path' 				=> $corePath.'elements/tvs/',
				'templates_path' 		=> $corePath.'templates/',
				'assets_path' 			=> $assetsPath,
				'js_url' 				=> $assetsUrl.'js/',
				'css_url' 				=> $assetsUrl.'css/',
				'assets_url' 			=> $assetsUrl,
				'richtext'				=> false
			), $config);

			$this->mce = array(
				'language'						=> $this->modx->getOption('manager_language'),
				'document_base_url'				=> $this->modx->getOption('base_url', null, MODX_BASE_URL),
				'allow_conditional_comments'	=> (bool) $this->modx->getOption('allow_conditional_comments', $config, false),
				'allow_html_in_named_anchor'	=> (bool) $this->modx->getOption('allow_html_in_named_anchor', $config, false),
				'allow_unsafe_link_target'		=> (bool) $this->modx->getOption('allow_unsafe_link_target', $config, false),
				'block_formats'					=> $this->modx->getOption('block_formats', $config, ''),
				'body_class'					=> $this->modx->getOption('body_class', $config, 'tinymce-content'),
				'body_id'						=> $this->modx->getOption('body_id', $config, 'tinymce-content'),
				'cache_suffix'					=> $this->modx->getOption('cache_suffix', $config, '?v=4.5.3'),
				'content_css'					=> $this->modx->getOption('content_css', $config, '/assets/interface/tinymce/tinymce.css'),
				'content_style'					=> $this->modx->getOption('content_style', $config, ''),
				'convert_fonts_to_spans'		=> (bool) $this->modx->getOption('convert_fonts_to_spans', $config, true),
				'custom_elements'				=> $this->modx->getOption('custom_elements', $config, ''),
				'doctype'						=> $this->modx->getOption('doctype', $config, ''),
				'element_format'				=> $this->modx->getOption('element_format', $config, 'xhtml'),
				'elementpath'					=> (bool) $this->modx->getOption('elementpath', $config, false),
				'encoding'						=> $this->modx->getOption('encoding', $config, 'encoding'),
				'entities'						=> $this->modx->getOption('entities', $config, ''),
				'entity_encoding'				=> $this->modx->getOption('entity_encoding', $config, 'named'),
				'event_root'					=> $this->modx->getOption('event_root', $config, ''),
				'extended_valid_elements'		=> $this->modx->getOption('extended_valid_elements', $config, ''),
				'external_plugins'				=> $this->modx->fromJSON($this->modx->getOption('external_plugins', $config, '{}')),
				'fix_list_elements'				=> $this->modx->getOption('fix_list_elements', $config, ''),
				'fixed_toolbar_container'		=> $this->modx->getOption('fixed_toolbar_container', $config, ''),
				'font_formats'					=> $this->modx->getOption('font_formats', $config, ''),
				'fontsize_formats'				=> $this->modx->getOption('fontsize_formats', $config, ''),
				'force_hex_style_colors'		=> (bool) $this->modx->getOption('force_hex_style_colors', $config, true),
				'forced_root_block'				=> $this->modx->getOption('forced_root_block', $config, 'p'),
				'forced_root_block_attrs'		=> $this->modx->getOption('forced_root_block_attrs', $config, ''),
				'formats'						=> $this->modx->fromJSON($this->modx->getOption('formats', $config, '[]')),
				'height'						=> $this->modx->getOption('height', $config, '400px'),
				'hidden_input'					=> (bool) $this->modx->getOption('hidden_input', $config, true),
				'image_advtab'					=> (bool) $this->modx->getOption('image_advtab', $config, true),
				'indentation'					=> $this->modx->getOption('indentation', $config, '30px'),
				'inline'						=> (bool) $this->modx->getOption('inline', $config, false),
				'insert_button_items'			=> $this->modx->getOption('insert_button_items', $config, ''),
				'insert_toolbar'				=> $this->modx->getOption('insert_toolbar', $config, ''),
				'invalid_elements'				=> $this->modx->getOption('invalid_elements', $config, ''),
				'invalid_styles'				=> $this->modx->getOption('invalid_styles', $config, ''),
				'keep_styles'					=> (bool) $this->modx->getOption('keep_styles', $config, false),
				//'max_height'					=> $this->modx->getOption('max_height', $config, '500px'),
				//'max_width'					=> $this->modx->getOption('max_width', $config, '100%'),
				'menu'							=> $this->modx->fromJSON($this->modx->getOption('menu', $config, '{}')),
				'menubar'						=> $this->modx->getOption('menubar', $config, ''),
				//'min_height'					=> $this->modx->getOption('min_height', $config, '200px'),
				//'min_width'					=> $this->modx->getOption('min_width', $config, '300px'),
				'paste_as_text'					=> (bool) $this->modx->getOption('paste_as_text', $config, true),
				'plugins'						=> $this->modx->getOption('plugins', $config, 'advlist anchor autolink charmap code contextmenu fullscreen hr image imagetools link lists media pagebreak paste preview tabfocus table visualblocks visualchars'),
				'preview_styles'				=> $this->modx->getOption('preview_styles', $config, ''),
				'protect'						=> $this->modx->fromJSON($this->modx->getOption('protect', $config, '[]')),
				'remove_trailing_brs'			=> (bool) $this->modx->getOption('remove_trailing_brs', $config, true),
				'removed_menuitems'				=> $this->modx->getOption('removed_menuitems', $config, ''),
				'resize'						=> $this->modx->getOption('resize', $config, 'both'),	
				'schema'						=> $this->modx->getOption('schema', $config, 'html5'),
				'selection_toolbar'				=> $this->modx->getOption('selection_toolbar', $config, ''),
				'skin'							=> $this->modx->getOption('skin', $config, ''),
				'skin_url'						=> $this->modx->getOption('skin_url', $config, ''),
				'statusbar'						=> (bool) $this->modx->getOption('statusbar', $config, false),
				'style_formats'					=> $this->modx->fromJSON($this->modx->getOption('style_formats', $config, '[]')),
				'style_formats_autohide'		=> (bool) $this->modx->getOption('style_formats_autohide', $config, false),
				'style_formats_merge'			=> $this->modx->fromJSON($this->modx->getOption('style_formats_merge', $config, '[]')),
				'table_advtab'					=> (bool) $this->modx->getOption('table_advtab', $config, true),
				'templates'						=> $this->modx->getOption('templates', $config, '/assets/interface/tinymce/templates.json'),
				'theme'							=> $this->modx->getOption('theme', $config, 'modern'),
				'theme_url'						=> $this->modx->getOption('theme_url', $config, ''),
				'toolbar'						=> $this->modx->getOption('toolbar', $config, ''),
				'toolbar1'						=> $this->modx->getOption('toolbar1', $config, 'pastetext | undo redo | bold italic underline strikethrough | styleselect | bullist numlist outdent indent'),
				'toolbar2'						=> $this->modx->getOption('toolbar2', $config, 'table | link unlink image media anchor | charmap | removeformat subscript superscript | fullscreen code preview visualblocks'),
				'toolbar3'						=> $this->modx->getOption('toolbar3', $config, ''),
				'valid_children'				=> $this->modx->getOption('valid_children', $config, ''),
				'valid_classes'					=> $this->modx->getOption('valid_classes', $config, ''),
				'valid_elements'				=> $this->modx->getOption('valid_elements', $config, ''),
				'valid_styles'					=> $this->modx->getOption('valid_styles', $config, ''),
				'visual_anchor_class'			=> $this->modx->getOption('visual_anchor_class', $config, ''),
				'visual_table_class'			=> $this->modx->getOption('visual_table_class', $config, ''),
				'visualblocks_default_state'	=> (bool) $this->modx->getOption('visualblocks_default_state', $config, true),
				'width'							=> $this->modx->getOption('width', $config, '100%'),
				'browser_url'					=> $this->getBrowserUrl()
			);
			
			if (null !== ($custom = $this->modx->fromJSON($this->modx->getOption('custom', $config, '{}')))) {
				$this->mce = array_merge($this->mce, $custom);
			}
			
			if ($resource = $this->modx->getOption('resource', $this->config, false)) {
				if ($resource->get('richtext')) {
					$this->config['richtext'] = true;
				}
			}
		}
		
		/**
		 * @acces public.
		 * @return String.
		 */
		public function getHelpUrl() {
			return $this->config['helpurl'];
		}
		
		/**
		 * @acces public.
		 * @param String type.
		 * @return String.
		 */
		public function setJavascript($type = 'editor') {
			switch ($type) {
				case 'browser':
					$this->modx->regClientStartupScript($this->modx->getOption('js_url', $this->config).'tinymce/tinymce.min.js');
					$this->modx->regClientStartupScript($this->modx->getOption('js_url', $this->config).'tiny.js');
					
					return 'TinyMCE.browserSelectCallback';
					
					break;
				case 'editor':
					$this->modx->regClientStartupScript($this->modx->getOption('js_url', $this->config).'tinymce/tinymce.min.js');
					$this->modx->regClientStartupScript($this->modx->getOption('js_url', $this->config).'tiny.js');
					
					if ($this->modx->getOption('richtext', $this->config, false)) {
						$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
							Ext.onReady(function() {
								TinyMCE.config = '.$this->modx->toJSON($this->mce).';
								
								MODx.loadRTE();
							});
						</script>');
					} else {
						$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
							Ext.onReady(function() {
								TinyMCE.config = '.$this->modx->toJSON($this->mce).';
							});
						</script>');
					}
					
					break;
			}
			
			return '';
		}
		
		/**
		 * @acces public.
		 * @return String.
		 */
		public function getBrowserUrl() {
			return $this->modx->getOption('manager_url', null, MODX_MANAGER_URL).'index.php?a=browser';
		}
	}
	
?>