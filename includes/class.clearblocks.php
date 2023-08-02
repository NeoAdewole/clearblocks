<?php

class Clearblocks
{
  // initialize class constants

  public static $limit_notices = array(
    10501 => 'FIRST_MONTH_OVER_LIMIT',
    10502 => 'SECOND_MONTH_OVER_LIMIT',
    10504 => 'THIRD_MONTH_APPROACHING_LIMIT',
    10508 => 'THIRD_MONTH_OVER_LIMIT',
    10516 => 'FOUR_PLUS_MONTHS_OVER_LIMIT',
  );

  // initialize class variables
  private static $initiated = false;

  public static function init()
  {
    if (!self::$initiated) {
      self::init_hooks();
    }
  }


  /**
   * Initializes WordPress hooks
   */
  private static function init_hooks()
  {
    self::$initiated = true;
  }

  public static function view($name, array $args = array())
  {
    $args = apply_filters('clearblocks_view_arguments', $args, $name);

    foreach ($args as $key => $val) {
      $$key = $val;
    }

    load_plugin_textdomain('clearblocks');

    $file = CLEARBLOCKS__PLUGIN_DIR . 'admin/views/' . $name . '.php';

    include($file);
  }

  private static function bail_on_activation($message, $deactivate = true)
  {
?>
    <!doctype html>
    <html>

    <head>
      <meta charset="<?php bloginfo('charset'); ?>" />
      <style>
        * {
          text-align: center;
          margin: 0;
          padding: 0;
          font-family: "Lucida Grande", Verdana, Arial, "Bitstream Vera Sans", sans-serif;
        }

        p {
          margin-top: 1em;
          font-size: 18px;
        }
      </style>
    </head>

    <body>
      <p><?php echo esc_html($message); ?></p>
    </body>

    </html>
<?php
    if ($deactivate) {
      $plugins = get_option('active_plugins');
      $clearblocks = plugin_basename(CLEARBLOCKS__PLUGIN_DIR . 'clearblocks.php');
      $update  = false;
      foreach ($plugins as $i => $plugin) {
        if ($plugin === $clearblocks) {
          $plugins[$i] = false;
          $update = true;
        }
      }

      if ($update) {
        update_option('active_plugins', array_filter($plugins));
      }
    }
    exit;
  }

  /**
   * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
   * @static
   */
  public static function ccb_plugin_activation()
  {
    if (version_compare($GLOBALS['wp_version'], CLEARBLOCKS__MINIMUM_WP_VERSION, '<')) {
      load_plugin_textdomain('cc-clearblocks');

      $message = '<strong>' . sprintf(
        esc_html__('Clearblocks %s requires WordPress %s or higher.', 'clearblocks'),
        CLEARBLOCKS_VERSION,
        CLEARBLOCKS__MINIMUM_WP_VERSION
      ) . '</strong> ' . sprintf(
        __('Please <a href="%s">upgrade WordPress</a> to a current version to use this plugin.', 'clearblocks'),
        'https://codex.wordpress.org/Upgrading_WordPress'
      );

      Clearblocks::bail_on_activation($message);
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
  }

  /**
   * Removes all connection options
   * @static
   */
  public static function ccb_plugin_deactivation()
  {
    // self::deactivate_key(self::get_api_key());

    // Remove any scheduled cron jobs.
    $clearblocks_cron_events = array(
      'clearblocks_schedule_cron_recheck',
      'clearblocks_scheduled_delete',
    );

    foreach ($clearblocks_cron_events as $clearblocks_cron_event) {
      $timestamp = wp_next_scheduled($clearblocks_cron_event);

      if ($timestamp) {
        wp_unschedule_event($timestamp, $clearblocks_cron_event);
      }
    }
  }

  public static function predefined_api_key()
  {
    if (defined('CLEARBLOCKS_API_KEY')) {
      return true;
    }

    return apply_filters('clearblocks_predefined_api_key', false);
  }
}
