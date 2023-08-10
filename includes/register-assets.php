<?php

function ccb_register_assets(){
    wp_register_style(
        'ccb_admin',
        plugins_url('/build/admin/index.css', CCB_PLUGIN_FILE)
    );
}