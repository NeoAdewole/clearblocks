<?php
function ccb_admin_menus()
{
  add_menu_page(
    __('Clearblocks', 'clearblocks'),
    __('Clearblocks', 'clearblocks'),
    'edit_theme_options',
    'clearblocks-plugin-options',
    'ccb_plugin_options_page',
    plugins_url('letter-u.svg', CCB_PLUGIN_FILE)
  );

  add_submenu_page(
    'clearblocks-plugin-options',
    __('Clearblocks Settings', 'clearblocks'),
    __('Clearblocks Settings', 'clearblocks'),
    'edit_theme_options',
    'clearblocks-plugin-settings',
    'ccb_plugin_settings_page'
  );
}
