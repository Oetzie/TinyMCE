<?php

	return array(
		array(
	        'name' 		=> 'advimag',
	        'desc' 		=> 'tinymce_plugin_advimage_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'comments',
	        'desc' 		=> 'tinymce_plugin_comments_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '0',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'convert_spans',
	        'desc' 		=> 'tinymce_plugin_convert_spans_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'convert_urls',
	        'desc' 		=> 'tinymce_plugin_convert_urls_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'encoding',
	        'desc' 		=> 'tinymce_plugin_encoding_desc',
	        'type' 		=> 'list',
	        'options' 	=> array (
				array (
					'text' 	=> 'Named',
					'value' => 'named',
				),
				array (
					'text' 	=> 'Numeric',
					'value' => 'numeric',
				),
				array (
					'text' 	=> 'Raw',
					'value' => 'raw',
				)
			),
	        'value'		=> 'named',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'force_hex_colors',
	        'desc' 		=> 'tinymce_plugin_force_hex_colors_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'height',
	        'desc' 		=> 'tinymce_plugin_height_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '400px',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'invalid_elements',
	        'desc' 		=> 'tinymce_plugin_invalid_elements_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'menubar',
	        'desc' 		=> 'tinymce_plugin_menubar_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '0',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'plugins',
	        'desc' 		=> 'tinymce_plugin_plugins_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> 'advlist autolink lists link image image charmap preview hr anchor pagebreak searchreplace wordcount visualchars code fullscreen insertdatetime media nonbreaking table contextmenu emoticons template',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'relative_urls',
	        'desc' 		=> 'tinymce_plugin_relative_urls_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'remove_brs',
	        'desc' 		=> 'tinymce_plugin_remove_brs_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'remove_script_host',
	        'desc' 		=> 'tinymce_plugin_remove_script_host_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'resize',
	        'desc' 		=> 'tinymce_plugin_resize_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'root_block',
	        'desc' 		=> 'tinymce_plugin_root_block_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> 'p',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'statusbar',
	        'desc' 		=> 'tinymce_plugin_statusbar_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '0',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'toggle',
	        'desc' 		=> 'tinymce_plugin_toggle_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'toolbar1',
	        'desc' 		=> 'tinymce_plugin_toolbar1_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> 'undo redo | bold italic underline strikethrough | styleselect | bullist numlist outdent indent',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'toolbar2',
	        'desc' 		=> 'tinymce_plugin_toolbar2_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> 'table | image link unlink anchor media | charmap | removeformat subscript superscript | fullscreen code',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'toolbar3',
	        'desc' 		=> 'tinymce_plugin_toolbar3_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'width',
	        'desc' 		=> 'tinymce_plugin_width_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '100%',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'xhtml',
	        'desc' 		=> 'tinymce_plugin_xhtml_desc',
	        'type' 		=> 'combo-boolean',
	        'options' 	=> '',
	        'value'		=> '1',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    )
	);

?>