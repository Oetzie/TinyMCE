<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

$_lang['tinymce']                                           = 'TinyMCE editor';
$_lang['tinymce.desc']                                      = 'Beheer de TinyMCE editor.';

$_lang['area_tinymce']                                      = 'TinyMCE editor';

$_lang['setting_tinymce.branding_url']                      = 'Branding';
$_lang['setting_tinymce.branding_url_desc']                 = 'De URL waar de branding knop heen verwijst, indien leeg wordt de branding knop niet getoond.';
$_lang['setting_tinymce.branding_url_help']                 = 'Branding (help)';
$_lang['setting_tinymce.branding_url_help_desc']            = 'De URL waar de branding help knop heen verwijst, indien leeg wordt de branding help knop niet getoond.';

$_lang['tinymce.tv_label_config']                           = 'TinyMCE config';
$_lang['tinymce.tv_label_config_desc']                      = 'De config om te gebruiken.';

$_lang['tinymce.config']                                    = 'Config';
$_lang['tinymce.configs']                                   = 'Configs';
$_lang['tinymce.configs_desc']                              = 'Beheer hier de verschillende configs beheren voor de TinyMCE editors.';
$_lang['tinymce.config_create']                             = 'Nieuwe config';
$_lang['tinymce.config_update']                             = 'Config wijzigen';
$_lang['tinymce.config_export']                             = 'Config exporteren';
$_lang['tinymce.config_remove']                             = 'Config verwijderen';
$_lang['tinymce.config_remove_confirm']                     = 'Weet je zeker dat je deze config wilt verwijderen?';
$_lang['tinymce.config_manage']                             = 'Config beheren';
$_lang['tinymce.configs_import']                            = 'Configs importeren';
$_lang['tinymce.configs_export']                            = 'Configs exporteren';

$_lang['tinymce.label_config_id']                           = 'ID';
$_lang['tinymce.label_config_id_desc']                      = '';
$_lang['tinymce.label_config_name']                         = 'Naam';
$_lang['tinymce.label_config_name_desc']                    = 'De naam van de config.';
$_lang['tinymce.label_config_description']                  = 'Omschrijving';
$_lang['tinymce.label_config_description_desc']             = 'De omschrijving van de config.';
$_lang['tinymce.label_config_default']                      = 'Systeem standaard';
$_lang['tinymce.label_config_default_desc']                 = 'Deze config is de standaard systeem config.';

$_lang['tinymce.label_import_file']                         = 'Bestand';
$_lang['tinymce.label_import_file_desc']                    = 'Selecteer een geldig XML bestand om configs te importeren.';
$_lang['tinymce.label_import_overwrite_default']            = 'Standaard systeem config overschrijven';
$_lang['tinymce.label_import_overwrite_default_desc']       = 'Indien aangevinkt zal de standaard systeem config eventueel overschreven worden.';

$_lang['tinymce.section_config']                            = 'Config';
$_lang['tinymce.section_config_desc']                       = 'Beheer hier de config voor de TinyMCE editor.';
$_lang['tinymce.section_demo']                              = 'Demo (live)';
$_lang['tinymce.section_demo_desc']                         = 'Elke wijziging die je hierboven bij de config maakt word automatisch gewijzigd in de demo hieronder.';

$_lang['tinymce.config_category_integration']               = 'Integration';
$_lang['tinymce.config_category_user_interface']            = 'User interface';
$_lang['tinymce.config_category_content_appearance']        = 'Content appearance';
$_lang['tinymce.config_category_content_filtering']         = 'Content filtering';
$_lang['tinymce.config_category_content_formatting']        = 'Content formatting';
$_lang['tinymce.config_category_spelling']                  = 'Spelling';
$_lang['tinymce.config_category_url_handling']              = 'URL handling';
$_lang['tinymce.config_category_advanced_editing']          = 'Advanced editing';
$_lang['tinymce.config_category_plugins']                   = 'Plugins';

$_lang['tinymce.config_plugins']                            = 'Plugins';
$_lang['tinymce.config_plugins_desc']                       = 'This option allows you to specify which plugins TinyMCE will attempt to load when starting up. By default, TinyMCE will not load any plugins. <a href="https://www.tiny.cloud/docs/configure/integration-and-setup/#plugins" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_external_plugins']                   = 'External plugins';
$_lang['tinymce.config_external_plugins_desc']              = 'This option allows you to specify a URL based location of plugins outside of the normal TinyMCE plugins directory. <a href="https://www.tiny.cloud/docs/configure/integration-and-setup/#external_plugins" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_block_formats']                      = 'Block formats';
$_lang['tinymce.config_block_formats_desc']                 = 'This option defines the formats to be displayed in the <code>formatselect</code> dropdown toolbar button and the <code>blockformats</code> menu item. Each item in the string should be separated by semi-colons and specified using the form <code>title=block</code>. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#block_formats" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_font_formats']                       = 'Font formats';
$_lang['tinymce.config_font_formats_desc']                  = 'This option defines the fonts to be displayed in the <code>fontselect</code> dropdown toolbar button and the <code>fontformats</code> menu item. Each item in the string should be separated by semi-colons and specified using the form of: <code>title=font-family</code>. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#font_formats" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_fontsize_formats']                   = 'Fontsize formats';
$_lang['tinymce.config_fontsize_formats_desc']              = 'This option allows you to override the font sizes displayed in the <code>fontsizeselect</code> dropdown toolbar button and the <code>fontsizes</code> menu item. Each item in the string should be space or comma-separated and include units. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#fontsize_formats" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_height']                             = 'Hoogte';
$_lang['tinymce.config_height_desc']                        = 'This options sets the height of the entire editor, including the menubar, toolbars, and status bar. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#height" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_menubar']                            = 'Menubar';
$_lang['tinymce.config_menubar_desc']                       = 'This option allows you to specify which menus should appear and the order that they appear in the menu bar at the top of TinyMCE. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#menubar" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_toolbar1']                           = 'Toolbar 1';
$_lang['tinymce.config_toolbar1_desc']                      = 'This option allows you to specify the buttons and the order that they will appear on TinyMCE’s first toolbar. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#toolbarn" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_toolbar2']                           = 'Toolbar 2';
$_lang['tinymce.config_toolbar2_desc']                      = 'This option allows you to specify the buttons and the order that they will appear on TinyMCE’s second toolbar. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#toolbarn" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_body_class']                         = 'Body Class';
$_lang['tinymce.config_body_class_desc']                    = 'This option enables you to specify a class for the body of each editor instance. This class can then be used to do TinyMCE specific overrides in your <code>content_css</code>. <a href="https://www.tiny.cloud/docs/configure/content-appearance/#body_class" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_body_id']                            = 'Body ID';
$_lang['tinymce.config_body_id_desc']                       = 'This option enables you to specify an id for the body of each editor instance. This id can then be used to do TinyMCE specific overrides in your <code>content_css</code>. <a href="https://www.tiny.cloud/docs/configure/content-appearance/#body_id" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_content_css']                        = 'Content CSS';
$_lang['tinymce.config_content_css_desc']                   = 'It is usually desirable that TinyMCE’s editable area has the same styling as the surrounding content. Consistent styling is achieved with the <code>content_css</code> option, which enables you to extend external CSS into the editable area. <a href="https://www.tiny.cloud/docs/configure/content-appearance/#content_css" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_forced_root_block']                  = 'Forced root block';
$_lang['tinymce.config_forced_root_block_desc']             = 'This option enables you to make sure that any non block elements or text nodes are wrapped in block elements. For example <code>&lt;strong&gt;something&lt;/strong&gt;</code> will result in output like: <code>&lt;p&gt;&lt;strong&gt;something&lt;/strong&gt;&lt;/p&gt;</code>. <a href="https://www.tiny.cloud/docs/configure/content-filtering/#forced_root_block" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_remove_trailing_brs']                = 'Remove trailing brs';
$_lang['tinymce.config_remove_trailing_brs_desc']           = 'This option allows you to disable TinyMCE’s default behavior of removing <code>&lt;br&gt;</code> tags at the end of block elements. <a href="https://www.tiny.cloud/docs/configure/content-filtering/#remove_trailing_brs" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_convert_urls']                       = 'Convert URLs';
$_lang['tinymce.config_convert_urls_desc']                  = 'This option enables you to control whether TinyMCE is to be smart and restore URLs to their original values. URLs are automatically converted (messed up) by default because the browser’s built-in logic works this way. There is no way to get the real URL unless you store it away. If you set this option to false it tries to keep these URLs intact. This option is set to true by default, which means URLs are forced to be either absolute or relative depending on the state of <code>relative_urls</code>. <a href="https://www.tiny.cloud/docs/configure/url-handling/#convert_urls" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_relative_urls']                      = 'Relative URLs';
$_lang['tinymce.config_relative_urls_desc']                 = 'If this option is set to true, all URLs returned from the MCFileManager will be relative from the specified <code>document_base_url</code>. If it’s set to false all URLs will be converted to absolute URLs. <a href="https://www.tiny.cloud/docs/configure/localization/#language" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_image_advtab']                       = 'Image advanced  tab';
$_lang['tinymce.config_image_advtab_desc']                  = 'This option adds an “Advanced” tab to the image dialog allowing you to add custom <code>styles</code>, <code>spacing</code> and <code>borders</code> to images. <a href="https://www.tiny.cloud/docs/plugins/image/#image_advtab" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_paste_as_text']                      = 'Paste as text';
$_lang['tinymce.config_paste_as_text_desc']                 = 'This option enables you to set the default state of the <code>Paste as text</code> menu item, which is added by the <code>paste</code> plugin under the <code>Edit</code> menu dropdown. It’s disabled by default. <a href="https://www.tiny.cloud/docs/plugins/paste/#paste_as_text" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_table_advtab']                       = 'Table advanced tab';
$_lang['tinymce.config_table_advtab_desc']                  = 'This option makes it possible to disable the advanced tab in the table dialog box. The advanced tab allows a user to input <code>style</code>, <code>border color</code and <code>background color</code> values. <a href="https://www.tiny.cloud/docs/plugins/table/#table_advtab" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_table_appearance_options']           = 'Table appearance options';
$_lang['tinymce.config_table_appearance_options_desc']      = 'This option allows you to disable some of the options available to a user when inserting or editing a table. When set to false the following fields will not appear: <code>cell spacing</code, <code>cell padding</code>, <code>border</code> and <code>caption</code>. <a href="https://www.tiny.cloud/docs/plugins/table/#table_appearance_options" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_table_templates']                    = 'Template';
$_lang['tinymce.config_table_templates_desc']               = 'This option lets you specify a predefined list of templates and will be requested as a URL that should produce a JSON output an array with each item having a <code>title</code>, <code>description</code> and <code>content/url</code>. <a href="https://www.tiny.cloud/docs/plugins/template/#templates" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_visualblocks_default_state']         = 'Visualblocks default state';
$_lang['tinymce.config_visualblocks_default_state_desc']    = 'This option enables you to specify the default state of the Visual Blocks plugin. <a href="https://www.tiny.cloud/docs/plugins/template/#templates" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_browser_spellcheck']                 = 'Browser spellcheck';
$_lang['tinymce.config_browser_spellcheck_desc']            = 'This option configures TinyMCE to use the browser’s native spell checker. browser_spellcheck is not available in either <code>Internet Explorer 8 or 9</code>, as neither browser has native spell checker functionality. For more complete browser support, we recommend using Spell Checker Pro. <a href="https://www.tiny.cloud/docs/plugins/template/#templates" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_wordcount']                          = 'Wordcount';
$_lang['tinymce.config_wordcount_desc']                     = 'This option adds the functionality for counting words to the TinyMCE editor by placing a counter on the right edge of the status bar. <a href="https://www.tiny.cloud/docs/plugins/wordcount/" target="_blank">Meer informatie</a>';
$_lang['tinymce.config_statusbar']                          = 'Statusbar';
$_lang['tinymce.config_statusbar_desc']                     = 'This option allows you to specify whether or not TinyMCE should display the status bar at the bottom of the editor. <a href="https://www.tiny.cloud/docs/configure/editor-appearance/#statusbar" target="_blank">Meer informatie</a>';

$_lang['tinymce.back_to_configs']                           = 'Terug naar configs';
$_lang['tinymce.config_not_exists']                         = 'Config met het ID "[[+id]]" bestaat niet.';
$_lang['tinymce.import_config_success']                     = 'Er zijn [[+configs]] config(s) geïmporteerd.';
$_lang['tinymce.import_config_failure']                     = 'Er is een fout opgetreden tijdens het importeren van de configs.';
