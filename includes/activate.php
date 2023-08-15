<?php

/**
 * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
 */

function ccb_plugin_activation()
{
  if (version_compare($GLOBALS['wp_version'], CLEARBLOCKS__MINIMUM_WP_VERSION, '<')) {
    load_plugin_textdomain('clearblocks');

    $message = '<strong>' . sprintf(
      esc_html__('Clearblocks %s requires WordPress %s or higher.', 'clearblocks'),
      CLEARBLOCKS_VERSION,
      CLEARBLOCKS__MINIMUM_WP_VERSION
    ) . '</strong> ' . sprintf(
      __('Please <a href="%s">upgrade WordPress</a> to a current version to use this plugin.', 'clearblocks'),
      'https://codex.wordpress.org/Upgrading_WordPress'
    );

    clearblocks::ccb_bail_on_activation($message);
  } elseif (!empty($_SERVER['SCRIPT_NAME']) && false !== strpos($_SERVER['SCRIPT_NAME'], '/wp-admin/plugins.php')) {
    add_option('Activated_Clearblocks', true);
  }

  ccb_social_post_type();
  flush_rewrite_rules();

  global $wpdb;
  $tableName = "{$wpdb->prefix}social_ratings";
  $charsetCollate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE {$tableName} (
      ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
      post_id bigint(20) unsigned NOT NULL,
      user_id bigint(20) unsigned NOT NULL,
      rating float(3,2) unsigned NOT NULL
    ) ENGINE='InnoDB' {$charsetCollate};";

  require_once(ABSPATH . "/wp-admin/includes/upgrade.php");
  dbDelta($sql);

  $options = get_option('clearblocks_options');

  if (!$options) {
    add_option('clearblocks_options', [
      'og_title' => get_bloginfo('name'),
      'og_img' => '',
      'og_description' => get_bloginfo('description'),
      'enable_og' => 1
    ]);
  }
}
