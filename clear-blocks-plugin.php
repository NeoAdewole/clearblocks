<?php

/**
 * Plugin Name:       Clear Blocks Plugin
 * Description:       Boilerplate for a block plugin
 * Requires at least: 6.2
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Niyi Adewole
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       clearblocks
 * Tags:              one-column, custom-menu, featured-images, theme-options, translation-ready, blocks, clear-cut
 *
 * @package           create-block
 */

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
