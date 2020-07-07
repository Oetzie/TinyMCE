<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

class TinyMCE
{
    /**
     * @access public.
     * @var modX.
     */
    public $modx;

    /**
     * @access public.
     * @var Array.
     */
    public $config = [];

    /**
     * @access public.
     * @var Array.
     */
    public $mce = [];

    /**
     * @access public.
     * @param modX $modx.
     * @param Array $config.
     */
    public function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;

        $corePath   = $this->modx->getOption('tinymce.core_path', $config, $this->modx->getOption('core_path') . 'components/tinymce/');
        $assetsUrl  = $this->modx->getOption('tinymce.assets_url', $config, $this->modx->getOption('assets_url') . 'components/tinymce/');
        $assetsPath = $this->modx->getOption('tinymce.assets_path', $config, $this->modx->getOption('assets_path') . 'components/tinymce/');

        $this->config = array_merge([
            'namespace'          => 'tinymce',
            'lexicons'          => ['tinymce:default'],
            'base_path'         => $corePath,
            'core_path'         => $corePath,
            'model_path'        => $corePath . 'model/',
            'processors_path'   => $corePath . 'processors/',
            'elements_path'     => $corePath . 'elements/',
            'chunks_path'       => $corePath . 'elements/chunks/',
            'plugins_path'      => $corePath . 'elements/plugins/',
            'snippets_path'     => $corePath . 'elements/snippets/',
            'templates_path'    => $corePath . 'templates/',
            'assets_path'       => $assetsPath,
            'js_url'            => $assetsUrl . 'js/',
            'css_url'           => $assetsUrl . 'css/',
            'assets_url'        => $assetsUrl,
            'connector_url'     => $assetsUrl . 'connector.php',
            'version'           => '1.4.1',
            'branding_url'      => $this->modx->getOption('tinymce.branding_url', null, ''),
            'branding_help_url' => $this->modx->getOption('tinymce.branding_url_help', null, '')
        ], $config);

        $this->modx->addPackage('tinymce', $this->config['model_path']);

        if (is_array($this->config['lexicons'])) {
            foreach ((array) $this->config['lexicons'] as $lexicon) {
                $this->modx->lexicon->load($lexicon);
            }
        } else {
            $this->modx->lexicon->load($this->config['lexicons']);
        }
    }

    /**
     * @access public.
     * @return String|Boolean.
     */
    public function getHelpUrl()
    {
        if (!empty($this->config['branding_help_url'])) {
            return $this->config['branding_help_url'] . '?v=' . $this->config['version'];
        }

        return false;
    }

    /**
     * @access public.
     * @return String|Boolean.
     */
    public function getBrandingUrl()
    {
        if (!empty($this->config['branding_url'])) {
            return $this->config['branding_url'];
        }

        return false;
    }

    /**
     * @access public.
     * @param String $key.
     * @param Array $options.
     * @param Mixed $default.
     * @return Mixed.
     */
    public function getOption($key, array $options = [], $default = null)
    {
        if (isset($options[$key])) {
            return $options[$key];
        }

        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        return $this->modx->getOption($this->config['namespace'] . '.' . $key, $options, $default);
    }

    /**
     * @access public.
     * @param Array $configs.
     * @return Array.
     */
    public function formatConfigs(array $configs = [])
    {
        $output = [];

        foreach ($configs as $config) {
            $key = $config->get('default') === 1 ? 'config_default' : 'config_' . $config->get('id');

            $output[$key] = $this->getDefaultConfig((array) json_decode($config->get('config'), true));
        }

        return $output;
    }

    /**
     * @access public.
     * @param Integer $id.
     * @return Null|Object.
     */
    public function getConfig($id)
    {
        return $this->modx->getObject('TinyMCEConfig', [
            'id' => $id
        ]);
    }

    /**
     * @access public.
     * @return Array.
     */
    public function getConfigs()
    {
        return $this->modx->getCollection('TinyMCEConfig');
    }

    /**
     * @access public.
     * @param Array $config.
     * @return Array.
     */
    public function getDefaultConfig(array $config = [])
    {
        return array_merge([
            //Integration
            'auto_focus'                    => '',
            'base_url'                      => '/assets/components/tinymce/js/tinymce/',
            'cache_suffix'                  => '?v=5.0.15',
            'content_security_policy'       => '',
            'external_plugins'              => '',
            'hidden_input'                  => '1',
            'plugins'                       => 'advlist anchor autolink charmap code fullscreen hr image imagetools link lists media pagebreak paste preview tabfocus table visualchars noneditable',
            'suffix'                        => '.min',

            //User interface
            'block_formats'                 => 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre',
            'branding'                      => '1',
            'contextmenu'                   => '',
            'contextmenu_never_use_native'  => '0',
            'custom_ui_selector'            => '',
            'draggable_modal'               => '1',
            'elementpath'                   => '1',
            'event_root'                    => '',
            'fixed_toolbar_container'       => '',
            'font_formats'                  => 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
            'fontsize_formats'              => '11px 12px 14px 16px 18px 24px 36px 48px',
            'height'                        => '600px',
            'icons'                         => '',
            'icons_url'                     => '',
            'inline'                        => '0',
            'max_height'                    => '',
            'max_width'                     => '',
            'menu'                          => '{}',
            'menubar'                       => 'file edit insert view format table tools help',
            'min_height'                    => '',
            'min_width'                     => '',
            'preview_styles'                => 'font-family font-size font-weight font-style text-decoration text-transform color background-color border border-radius outline text-shadow',
            'quickbars_insert_toolbar'      => 'quickimage quicktable',
            'quickbars_selection_toolbar'   => 'bold italic | quicklink h2 h3 blockquote',
            'removed_menuitems'             => '',
            'resize'                        => '1',
            'skin'                          => 'modx',
            'skin_url'                      => '',
            'statusbar'                     => '1',
            'style_formats'                 => '[{"title": "Headings", "items": [{"title": "Heading 1", "format": "h1"}, {"title": "Heading 2", "format": "h2"}, {"title": "Heading 3", "format": "h3"}, {"title": "Heading 4", "format": "h4"}, {"title": "Heading 5", "format": "h5"}, {"title": "Heading 6", "format": "h6"}]}, {"title": "Inline", "items": [{"title": "Bold", "format": "bold"}, {"title": "Italic", "format": "italic"}, {"title": "Underline", "format": "underline"}, {"title": "Strikethrough", "format": "strikethrough"}, {"title": "Superscript", "format": "superscript"}, {"title": "Subscript", "format": "subscript"}, {"title": "Code", "format": "code"}]}, {"title": "Blocks", "items": [{"title": "Paragraph", "format": "p"}, {"title": "Blockquote", "format": "blockquote"}, {"title": "Div", "format": "div"}, {"title": "Pre", "format": "pre"}]}, {"title": "Align", "items": [{"title": "Left", "format": "alignleft"}, {"title": "Center", "format": "aligncenter"},  {"title": "Right", "format": "alignright"}, {"title": "Justify", "format": "alignjustify"}]}]',
            'style_formats_autohide'        => '0',
            'style_formats_merge'           => '0',
            'theme'                         => 'silver',
            'theme_url'                     => '',
            'toolbar'                       => '',
            'toolbar1'                      => 'undo redo | bold italic underline strikethrough subscript superscript | styleselect | bullist numlist outdent indent',
            'toolbar2'                      => 'template table | link unlink | image media anchor | charmap | preview fullscreen code visualblocks pastetext removeformat',
            'toolbar_drawer'                => '',
            'width'                         => '100%',

            //Content appearance
            'body_class'                    => 'tinymce-content',
            'body_id'                       => 'tinymce-content',
            'content_css'                   => '',
            'content_css_cors'              => '0',
            'content_style'                 => '',
            'inline_boundaries'             => '1',
            'inline_boundaries_selector'    => 'a[href],code',
            'text_color'                    => '',
            'color_cols'                    => 5,
            'color_map'                     => '{}',
            'custom_colors'                 => '1',
            'visual'                        => '0',
            'visual_anchor_class'           => '',
            'visual_table_class'            => '',

            //Content filtering
            'allow_conditional_comments'    => '0',
            'allow_html_in_named_anchor'    => '0',
            'allow_unsafe_link_target'      => '0',
            'convert_fonts_to_spans'        => '0',
            'custom_elements'               => 'div',
            'doctype'                       => '',
            'element_format'                => 'xhtml',
            'encoding'                      => '',
            'entities'                      => '',
            'entity_encoding'               => 'named',
            'extended_valid_elements'       => '',
            'fix_list_elements'             => '1',
            'forced_root_block'             => 'p',
            'forced_root_block_attrs'       => '{}',
            'invalid_elements'              => '',
            'invalid_styles'                => '',
            'keep_styles'                   => '1',
            'protect'                       => '[]',
            'remove_trailing_brs'           => '1',
            'schema'                        => 'html5',
            'valid_children'                => '',
            'valid_classes'                 => '',
            'valid_elements'                => '',
            'valid_styles'                  => '',

            //Content formatting
            'formats'                       => '[]',
            'indentation'                   => '30px',
            'indent_use_margin'             => '0',

            //Spelling options
            'browser_spellcheck'            => '0',

            //Image & file upload
            'automatic_uploads'             => '0',
            'file_picker_types'             => '',
            'images_dataimg_filter'         => '',
            'images_reuse_filename'         => '0',
            'images_upload_base_path'       => '',
            'images_upload_credentials'     => '0',
            'images_upload_handler'         => '',
            'images_upload_url'             => '',

            //Localization options
            'directionality'                => $this->modx->getOption('manager_direction', null, 'ltr'),
            'language'                      => $this->modx->getOption('manager_language'),
            'language_url'                  => '',

            //URL handling
            'anchor_bottom'                 => '#bottom',
            'anchor_top'                    => '#top',
            'allow_script_urls'             => '0',
            'convert_urls'                  => '1',
            'document_base_url'             =>  $this->modx->getOption('base_url', null, MODX_BASE_URL),
            'relative_urls'                 => '1',
            'remove_script_host'            => '1',
            'urlconverter_callback'         => '',

            //Advanced editing
            'br_in_pre'                     => '1',
            'custom_undo_redo_levels'       => 10,
            'end_container_on_empty_block'  => '0',
            'nowrap'                        => '0',
            'object_resizing'               => '1',
            'typeahead_urls'                => '1',

            //Advanced List plugin
            'advlist_bullet_styles'         => 'default,circle,disc,square',
            'advlist_number_styles'         => 'default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman',

            //Image plugin
            'image_list'                    => '{}',
            'image_advtab'                  => '1',
            'image_class_list'              => '{}',

            //Link plugin
            'default_link_target'           => '',
            'link_assume_external_targets'  => '0',
            'link_class_list'               => '{}',
            'link_context_toolbar'          => '1',
            'link_list'                     => '{}',
            'rel_list'                      => '{}',
            'target_list'                   => '{}',

            //Noneditable plugin
            'noneditable_editable_class'    => 'mceEditable',
            'noneditable_noneditable_class' => 'mceNonEditable',

            //Paste plugin
            'paste_as_text'                 => '1',
            'paste_enable_default_filters'  => '1',
            'paste_filter_drop'             => '1',
            'paste_word_valid_elements'     => '',
            'paste_webkit_styles'           => '',
            'paste_retain_style_properties' => '',
            'paste_merge_formats'           => '1',

            //Table plugin
            'table_toolbar'                 => 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
            'table_appearance_options'      => '0',
            'table_default_attributes'      => '{}',
            'table_default_styles'          => '{}',
            'table_class_list'              => '{}',
            'table_advtab'                  => '0',
            'table_cell_advtab'             => '0',
            'table_row_advtab'              => '0',
            'table_resize_bars'             => '1',

            //Template plugin
            'templates'                     => '',
            'template_replace_values'       => '',

            //Visual Blocks plugin
            'visualblocks_default_state'    => '1',

            //Visual Characters plugin
            'visualchars_default_state'     => '0'
        ], $config);
    }
}
