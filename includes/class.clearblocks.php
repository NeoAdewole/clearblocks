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
