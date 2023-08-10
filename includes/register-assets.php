<?php

function ccb_register_assets(){
    wp_register_style(
        'ccb_admin',
        plugins_url('/build/admin/index.css', CCB_PLUGIN_FILE)
    );

    $adminAssets = include(CLEARBLOCKS__PLUGIN_DIR . 'build/admin/index.asset.php');

    wp_register_script(
        'ccb_admin',
        plugins_url('/build/admin/index.js', CCB_PLUGIN_FILE),
        $adminAssets['dependencies'],
        $adminAssets['version'],
        true
    );
}