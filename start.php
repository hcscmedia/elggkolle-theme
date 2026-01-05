<?php
/**
 * Elgg Kolle Theme Bootstrap
 */

/**
 * Theme init
 */
function elggkolle_theme_init() {
    // Register CSS
    elgg_extend_view('elgg.css', 'elggkolle_theme/elgg.css');
    elgg_extend_view('admin.css', 'elggkolle_theme/admin.css');
    
    // Register JavaScript
    elgg_extend_view('elgg.js', 'elggkolle_theme/elgg.js');
    
    // Register custom view locations
    elgg_register_plugin_hook_handler('view_vars', 'page/elements/head', 'elggkolle_theme_head_vars');
    elgg_register_plugin_hook_handler('view', 'page/elements/topbar', 'elggkolle_theme_topbar');
    
    // Add dark mode support
    elgg_register_plugin_hook_handler('head', 'page', 'elggkolle_theme_dark_mode_setup');
}

/**
 * Modify head variables
 */
function elggkolle_theme_head_vars($hook, $type, $value, $params) {
    $value['viewport'] = 'width=device-width, initial-scale=1.0, viewport-fit=cover';
    return $value;
}

/**
 * Customize topbar
 */
function elggkolle_theme_topbar($hook, $type, $value, $params) {
    // Allow customization of topbar view
    return $value;
}

/**
 * Setup dark mode
 */
function elggkolle_theme_dark_mode_setup($hook, $type, $value, $params) {
    elgg_load_js('elggkolle_theme.darkmode');
    return $value;
}

return function() {
    elgg_register_event_handler('init', 'system', 'elggkolle_theme_init');
};
