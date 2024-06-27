<?php

function ccb_save_options()
{
  if (!current_user_can('edit_theme_options')) {
    wp_die(
      __("You are not allowed to be on this page", 'clearblocks')
    );
  }

  check_admin_referer('ccb_options_verify');
  $options = get_option('clearblocks_options');

  $options['og_title'] = sanitize_text_field($_POST['ccb_og_title']);
  $options['og_img'] = sanitize_url($_POST['ccb_og_image']);
  $options['og_description'] = sanitize_text_field($_POST['ccb_og_description']);
  $options['enable_og'] = absint($_POST['ccb_enable_og']);

  update_option('clearblocks_options', $options);

  wp_redirect(admin_url('admin.php?page=clearblocks-plugin-options&status=1'));
}


function ccb_save_settings()
{
  if (!current_user_can('edit_theme_options')) {
    wp_die(
      __("You are not allowed to be on this page", 'clearblocks')
    );
  }

  check_admin_referer('ccb_settings_verify');
  $options = get_option('clearblocks_settings');

  $options['enable_secondary_menu'] = sanitize_text_field($_POST['ccb_enable_secondary_menu']);

  update_option('clearblocks_settings', $options);

  wp_redirect(admin_url('admin.php?page=clearblocks-plugin-settings&status=1'));
}
