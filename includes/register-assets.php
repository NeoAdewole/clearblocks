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

    $editorAssets = include(CLEARBLOCKS__PLUGIN_DIR.'build/block-editor/index.asset.php');

    wp_register_script(
        'ccb_editor',
        plugins_url('/build/block-editor/index.js', CCB_PLUGIN_FILE),
        $editorAssets['dependencies'],
        $editorAssets['version'],
        true
    );

    wp_register_style(
        'ccb_editor',
        plugins_url('/build/block-editor/index.css', CCB_PLUGIN_FILE)
    );
}