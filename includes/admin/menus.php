<?php
function ccb_admin_menus(){
    add_menu_page(
        __('Clearblocks', 'cc-clearblocks'),
        __('Clearblocks', 'cc-clearblocks'),
        'edit_theme_options',
        'clearblocks-plugin-options',
        'ccb_plugin_options_page',
        plugins_url('letter-u.svg', CCB_PLUGIN_FILE)
    );
}