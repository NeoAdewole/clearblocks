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
    __('Alt Clearblocks', 'clearblocks'),
    __('Alt Clearblocks', 'clearblocks'),
    'edit_theme_options',
    'clearblocks-plugin-options-alt',
    'ccb_plugin_options_page_alt'
  );
}
