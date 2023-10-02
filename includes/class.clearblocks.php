<?php

class Clearblocks
{
  // initialize class constants

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

  /**
   * Activate Clearblocks plugin 
   * Checks WP Version compatibility, Create Social Post Type, Creates social rating table.
   */
  public static function ccb_plugin_activation()
  {
    if (version_compare($GLOBALS['wp_version'], CLEARBLOCKS__MINIMUM_WP_VERSION, '<')) {
      load_plugin_textdomain('clearblocks');

      $message = '<strong>' . esc_html__(
        sprintf(
          'Clearblocks %1$f! requires WordPress %2$f or higher.',
          CLEARBLOCKS_VERSION,
          CLEARBLOCKS__MINIMUM_WP_VERSION
        ),
        'clearblocks'
      ) . '</strong> ' . __(
        sprintf(
          "Please <a href='%s'>upgrade WordPress</a> to a current version to use this plugin.",
          "https://codex.wordpress.org/Upgrading_WordPress"
        ),
        "clearblocks"
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
      add_option('clearblocks_secondary_menu', [
        'ccb_enable_secondary_menu' => false
      ]);
    }
  }

  public static function ccb_bail_on_activation($message, $deactivate = true)
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
   * Removes all connection options
   * @static
   */
  public static function ccb_plugin_deactivation()
  {
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
}
