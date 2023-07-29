<?php

function clearblocks_enqueue()
{
  wp_register_style(
    'clearblocks_admin_styles',
    get_theme_file_uri('/assets/css/admin_styles.css'),
  );
}

function ccb_enqueue_scripts()
{
  $authURLs = json_encode([
    'signup' => esc_url_raw(rest_url('ccb/v1/signup'))
  ]);
  wp_add_inline_script(
    'clearblocks-auth-modal-view-script',
    "const ccb_auth_rest = {$authURLs}",
    'before'
  );
}
