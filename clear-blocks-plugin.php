<?php

/**
 * Plugin Name:       Clear Blocks Plugin
 * Plugin URI:        https://clearcutcomms.ca/clearblocks
 * Description:       Plugin featuring a collection of blocks to improve the WordPress user experience provided by Clear Cut
 * Author:            ClearCut
 * Author URI:        https://clearcutcomms.ca
 * Text Domain:       clearblocks
 * Version:           0.1.2
 * Requires at least: 6.2
 * Requires PHP:      7.0
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Tags:              one-column, custom-menu, featured-images, theme-options, translation-ready, blocks, clear-cut
 *
 * @package           create-block
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
  exit;
}

// setup

// Variables
define('CLEARBLOCKS_VERSION', '0.1.2');
define('CLEARBLOCKS__MINIMUM_WP_VERSION', '6.2');
define('CLEARBLOCKS__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CCB_PLUGIN_FILE', __FILE__);

// Includes
$rootFiles = glob(CLEARBLOCKS__PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(CLEARBLOCKS__PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach ($allFiles as $filename) {
  include_once($filename);
}

// Hooks
register_activation_hook(__FILE__, array('clearblocks', 'ccb_plugin_activation'));
register_deactivation_hook(__FILE__, array('clearblocks', 'ccb_plugin_deactivation'));

add_action('init', array('clearblocks', 'init'));
add_action('init', 'ccb_register_assets');
add_action('init', 'ccb_social_post_type');
add_action('init', 'clearblocks_register_blocks');
add_action('rest_api_init', 'ccb_rest_api');
add_action('channel_add_form_fields', 'ccb_channel_add_form_fields');
add_action('create_channel', 'ccb_save_channel_meta');
add_action('channel_edit_form_fields', 'ccb_channel_edit_form_fields');
add_action('edited_channel', 'ccb_save_channel_meta');
add_action('save_post_social', 'ccb_save_post_social');
add_action('after_setup_theme', 'clearblocks_setup_theme');
add_filter('image_size_names_choose', 'clearblocks_custom_image_sizes');
add_filter('rest_social_query', 'ccb_rest_social_query', 10, 2);
add_action('admin_init', 'ccb_settings_api');
add_action('admin_menu', array('Clearblocks_Menu', 'ccb_admin_menus'));
add_action('admin_post_ccb_save_options', 'ccb_save_options');
add_action('wp_enqueue_scripts', 'ccb_enqueue_scripts', 90);
add_action('admin_enqueue_scripts', 'ccb_admin_enqueue');
add_action('enqueue_block_editor_assets', 'ccb_enqueue_block_editor_assets');
add_action('wp_head', 'ccb_wp_head');
add_action('plugins_loaded', 'ccb_load_php_translations');
add_action('wp_enqueue_scripts', 'ccb_load_block_translations', 100);

// To Do: Structure folder to allow conditional loading of admin and public files
// configure src to build scripts and style seperately based on admin/public concerns
// configure scaffold to create modular block folders
