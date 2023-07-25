<?php
defined('ABSPATH') or die('Cant access this file directly');

class Clearblocks_Menu
{

  public static function load_menu()
  {
    $hook = add_menu_page(
      __('Clearblocks Admin Page', 'clearblocks'),
      __('Clearblocks', 'clearblocks'),
      'manage_options',
      'clearblocks_admin_menu',
      array('Clearblocks_Admin', 'display_page'),
      'dashicons-share-alt',
      76
    );

    if ($hook) {
      add_action("load-$hook", array('Clearblocks_Menu', 'admin_help'));
    }
  }

  public static function load_submenu()
  {
    $hook = add_submenu_page(
      'clearblocks_admin_menu',
      __('Channels', 'clearblocks'),
      __('Clearblocks Socials', 'clearblocks'),
      'manage_options',
      'clearblocks_channels',
      array('Clearblocks_Admin', 'display_configuration_page'),
    );

    if ($hook) {
      add_action("load-$hook", array('Clearblocks_Menu', 'admin_help'));
    }
  }

  /**
   * Add help to the Clearblocks page
   *
   * @return false if not the Clearblocks page
   */
  public static function admin_help()
  {
    $current_screen = get_current_screen();

    // Screen Content
    if (current_user_can('manage_options')) {
      if ((isset($_GET['view']) && $_GET['view'] == 'start')) {
        //setup page
        $current_screen->add_help_tab(
          array(
            'id'    => 'overview',
            'title'    => __('Overview', 'clearblocks'),
            'content'  =>
            '<p><strong>' . esc_html__('Clearblocks Setup', 'clearblocks') . '</strong></p>' .
              '<p>' . esc_html__('Clearblocks filters out spam, so you can focus on more important things.', 'clearblocks') . '</p>' .
              '<p>' . esc_html__('On this page, you are able to set up the Clearblocks plugin.', 'clearblocks') . '</p>',
          )
        );

        $current_screen->add_help_tab(
          array(
            'id'    => 'setup-signup',
            'title'    => __('New to Clearblocks', 'clearblocks'),
            'content'  =>
            '<p><strong>' . esc_html__('Clearblocks Setup', 'clearblocks') . '</strong></p>' .
              '<p>' . esc_html__('You need to enter an API key to activate the Clearblocks service on your site.', 'clearblocks') . '</p>' .
              '<p>' . sprintf(__('Sign up for an account on %s to get an API Key.', 'clearblocks'), '<a href="https://clearblocks.com/plugin-signup/" target="_blank">Clearblocks.com</a>') . '</p>',
          )
        );

        $current_screen->add_help_tab(
          array(
            'id'    => 'setup-manual',
            'title'    => __('Enter an API Key', 'clearblocks'),
            'content'  =>
            '<p><strong>' . esc_html__('Clearblocks Setup', 'clearblocks') . '</strong></p>' .
              '<p>' . esc_html__('If you already have an API key', 'clearblocks') . '</p>' .
              '<ol>' .
              '<li>' . esc_html__('Copy and paste the API key into the text field.', 'clearblocks') . '</li>' .
              '<li>' . esc_html__('Click the Use this Key button.', 'clearblocks') . '</li>' .
              '</ol>',
          )
        );
      } elseif (isset($_GET['view']) && $_GET['view'] == 'stats') {
        //stats page
        $current_screen->add_help_tab(
          array(
            'id'    => 'overview',
            'title'    => __('Overview', 'clearblocks'),
            'content'  =>
            '<p><strong>' . esc_html__('Clearblocks Stats', 'clearblocks') . '</strong></p>' .
              '<p>' . esc_html__('Clearblocks filters out spam, so you can focus on more important things.', 'clearblocks') . '</p>' .
              '<p>' . esc_html__('On this page, you are able to view stats on spam filtered on your site.', 'clearblocks') . '</p>',
          )
        );
      } else {
        //configuration page
        $current_screen->add_help_tab(
          array(
            'id'    => 'overview',
            'title'    => __('Overview', 'clearblocks'),
            'content'  =>
            '<p><strong>' . esc_html__('Clearblocks Configuration', 'clearblocks') . '</strong></p>' .
              '<p>' . esc_html__('Clearblocks filters out spam, so you can focus on more important things.', 'clearblocks') . '</p>' .
              '<p>' . esc_html__('On this page, you are able to update your Clearblocks settings and view spam stats.', 'clearblocks') . '</p>',
          )
        );

        $current_screen->add_help_tab(
          array(
            'id'    => 'Clearblocks',
            'title'    => __('Dashboard', 'clearblocks'),
            'content'  =>
            '<p><strong>' . esc_html__('Clearblocks Configuration', 'clearblocks') . '</strong></p>' .
              (Clearblocks::predefined_api_key() ? '' : '<p><strong>' . esc_html__('API Key', 'clearblocks') . '</strong> - ' . esc_html__('Enter/remove an API key.', 'clearblocks') . '</p>') .
              '<p><strong>' . esc_html__('Comments', 'clearblocks') . '</strong> - ' . esc_html__('Show the number of approved comments beside each comment author in the comments list page.', 'clearblocks') . '</p>' .
              '<p><strong>' . esc_html__('Strictness', 'clearblocks') . '</strong> - ' . esc_html__('Choose to either discard the worst spam automatically or to always put all spam in spam folder.', 'clearblocks') . '</p>',
          )
        );

        if (!Clearblocks::predefined_api_key()) {
          $current_screen->add_help_tab(
            array(
              'id'    => 'account',
              'title'    => __('Account', 'clearblocks'),
              'content'  =>
              '<p><strong>' . esc_html__('Clearblocks Configuration', 'clearblocks') . '</strong></p>' .
                '<p><strong>' . esc_html__('Subscription Type', 'clearblocks') . '</strong> - ' . esc_html__('The Clearblocks subscription plan', 'clearblocks') . '</p>' .
                '<p><strong>' . esc_html__('Status', 'clearblocks') . '</strong> - ' . esc_html__('The subscription status - active, cancelled or suspended', 'clearblocks') . '</p>',
            )
          );
        }
      }
    }

    // Help Sidebar
    $current_screen->set_help_sidebar(
      '<p><strong>' . esc_html__('For more information:', 'clearblocks') . '</strong></p>' .
        '<p><a href="https://clearcutcomms.ca/clearblocks/faq/" target="_blank">'     . esc_html__('Clearblocks FAQ', 'clearblocks') . '</a></p>' .
        '<p><a href="https://clearcutcomms.ca/clearblocks/support/" target="_blank">' . esc_html__('Clearblocks Support', 'clearblocks') . '</a></p>'
    );
  }
}
