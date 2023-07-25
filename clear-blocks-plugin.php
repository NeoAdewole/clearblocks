<?php

/**
 * Plugin Name:       Clear Blocks Plugin
 * Plugin URI:        https://clearcutcomms.ca/clearblocks
 * Description:       Plugin featuring a collection of blocks to improve the WordPress user experience provided by Clear Cut
 * Author:            ClearCut
 * Author URI:        https://clearcutcomms.ca
 * Text Domain:       clearblocks
 * Version:           0.1.1
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

// load text domain
function clearblocks_load_textdomain()
{
  load_plugin_textdomain('clearblocks', false, plugin_dir_path(__FILE__) . 'languages/');
}
add_action('plugins_loaded', 'clearblocks_load_textdomain');

// setup

// Variables
define('CLEARBLOCKS_VERSION', '0.1.1');
define('CLEARBLOCKS__MINIMUM_WP_VERSION', '6.2');
define('CLEARBLOCKS__PLUGIN_DIR', plugin_dir_path(__FILE__));

// Includes
$rootFiles = glob(CLEARBLOCKS__PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(CLEARBLOCKS__PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach ($allFiles as $filename) {
  include_once($filename);
}

// Hooks
register_activation_hook(__FILE__, array('clearblocks', 'plugin_activation'));
register_deactivation_hook(__FILE__, array('clearblocks', 'plugin_deactivation'));

add_action('init', array('clearblocks', 'init'));
// add_action('rest_api_init', array('clearblocks_REST_API', 'init'));
// add_action('init', 'ccv_social_post_type');
add_action('init', 'clearblocks_register_blocks');

if (is_admin() || (defined('WP_CLI') && WP_CLI)) {
  require_once(CLEARBLOCKS__PLUGIN_DIR . 'admin/class.clearblocks-admin.php');
  add_action('init', array('clearblocks_Admin', 'init'));
}
// require_once(CLEARBLOCKS__PLUGIN_DIR . 'admin/class.clearblocks-settings-validate.php');

// default plugin options. these are used until the user makes edits
function clearblocks_options_default()
{

  return array(
    'custom_url'     => 'https://disbydem.com/',
    'custom_title'   => esc_html__('What\'s your DBD\'ers scale?', 'clearblocks'),
    'custom_style'   => 'disable',
    'custom_message' => '<p class="custom-message">' . esc_html__('My custom message', 'clearblocks') . '</p>',
    'custom_footer'  => esc_html__('Special message for users', 'clearblocks'),
    'custom_toolbar' => false,
    'custom_scheme'  => 'default',
    'custom_api_key'  => 'default',
  );
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_clear_blocks_plugin_init()
{
  register_block_type(__DIR__ . '/build');
}
add_action('init', 'create_block_clear_blocks_plugin_init');

// To Do: Structure folder to allow conditional loading of admin and public files
// configure src to build scripts and style seperately based on admin/public concerns
// configure scaffold to create modular block folders
