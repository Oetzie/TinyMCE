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
		public $mceConfig = array();
		
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
				'basePath'				=> $corePath,
				'corePath' 				=> $corePath,
				'elementsPath' 			=> $corePath.'elements/',
				'chunksPath' 			=> $corePath.'elements/chunks/',
				'pluginsPath' 			=> $corePath.'elements/plugins/',
				'tvsPath' 				=> $corePath.'elements/tvs/',
				'templatesPath' 		=> $corePath.'templates/',
				'assetsPath' 			=> $assetsPath,
				'jsUrl' 				=> $assetsUrl.'js/',
				'cssUrl' 				=> $assetsUrl.'css/',
				'assetsUrl' 			=> $assetsUrl,
				'helpurl'				=> 'tinymce',
				'richtext'				=> false
			), $config);
			
			$this->mceConfig = array(
				'document_base_url'				=> $this->modx->getOption('base_url', null, MODX_BASE_URL),
				'image_advtab'					=> $this->modx->getOption('advimag', $config, true),
				'allow_conditional_comments'	=> $this->modx->getOption('comments', $config, false),
				'convert_fonts_to_spans'		=> $this->modx->getOption('convert_spans', $config, true),
				'element_format'				=> $this->modx->getOption('xhtml', $config, true) ? 'xhtml' : 'html',
				'entities'						=> $this->modx->getOption('entities', $config, ''),
				'entity_encoding'				=> $this->modx->getOption('encoding', $config, 'named'),
				'force_hex_style_colors'		=> $this->modx->getOption('force_hex_colors', $config, true),
				'forced_root_block'				=> $this->modx->getOption('root_block', $config, 'p'),
				'invalid_elements'				=> $this->modx->getOption('invalid_elements', $config, ''),
				'remove_trailing_brs'			=> $this->modx->getOption('remove_brs', $config, true),
				'convert_urls'					=> $this->modx->getOption('convert_urls', $config, true),
				'relative_urls'					=> $this->modx->getOption('relative_urls', $config, true),
				'remove_script_host'			=> $this->modx->getOption('remove_script_host', $config, true),
				'language'						=> $this->modx->getOption('manager_language'),
				'width'							=> $this->modx->getOption('width', $config, '100%'),
				'height'						=> $this->modx->getOption('height', $config, '400px'),
				'menubar'						=> $this->modx->getOption('menubar', $config, false),
				'statusbar'						=> $this->modx->getOption('statusbar', $config, false),
				'plugins'						=> $this->modx->getOption('plugins', $config, ''),
				'toolbar1'						=> $this->modx->getOption('toolbar1', $config, ''),
				'toolbar2'						=> $this->modx->getOption('toolbar2', $config, ''),
				'toolbar3'						=> $this->modx->getOption('toolbar3', $config, ''),
				'resize'						=> $this->modx->getOption('resize', $config, true),
				'toggle'						=> $this->modx->getOption('toggle', $config, true),
				'browserUrl'					=> $this->getBrowserUrl()
			);

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
					$this->modx->regClientStartupScript($this->config['jsUrl'].'tinymce/tinymce.min.js');
					$this->modx->regClientStartupScript($this->config['jsUrl'].'tiny.js');
					
					return 'TinyMCE.browserSelectCallback';
					
					break;
				case 'editor':
					$this->modx->regClientStartupScript($this->config['jsUrl'].'tinymce/tinymce.min.js');
					$this->modx->regClientStartupScript($this->config['jsUrl'].'tiny.js');
					
					if ($this->modx->getOption('richtext', $this->config, false)) {
						$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
							Ext.onReady(function() {
								TinyMCE.config = '.$this->modx->toJSON($this->mceConfig).';
								
								MODx.loadRTE();
							});
						</script>');
					} else {
						$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
							Ext.onReady(function() {
								TinyMCE.config = '.$this->modx->toJSON($this->mceConfig).';
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