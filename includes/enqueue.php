<?php

function clearblocks_enqueue()
{
  wp_register_style(
    'clearblocks_admin_styles',
    get_theme_file_uri('/assets/css/admin_styles.css'),
  );
}
