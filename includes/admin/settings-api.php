<?php

function ccb_settings_api()
{
  register_setting('ccb_options_group', 'clearblocks_options');

  add_settings_section(
    'ccb_options_section',
    __('Clearblocks Settings', 'clearblocks'),
    'ccb_options_section_cb',
    'clearblocks-options-page'
  );

  add_settings_field(
    'og_title_input',
    __('Open Graph Title', 'clearblocks'),
    'og_title_input_cb',
    'clearblocks-options-page',
    'ccb_options_section'
  );
  add_settings_field(
    'og_image_input',
    __('Open Graph Image', 'clearblocks'),
    'og_image_input_cb',
    'clearblocks-options-page',
    'ccb_options_section'
  );
  add_settings_field(
    'og_description_input',
    __('Open Graph Description', 'clearblocks'),
    'og_description_input_cb',
    'clearblocks-options-page',
    'ccb_options_section'
  );
  add_settings_field(
    'og_enable_input',
    __('Open Graph Enable', 'clearblocks'),
    'og_enable_input_cb',
    'clearblocks-options-page',
    'ccb_options_section'
  );

  register_setting('ccb_settings_group', 'clearblocks_settings');

  add_settings_section(
    'ccb_settings_section',
    __('Clearblocks Plugin Settings', 'clearblocks'),
    'ccb_settings_section_cb',
    'clearblocks-settings-page'
  );

  add_settings_field(
    'ccb_enable_secondary_menu',
    __('Enable Clearblocks Menu', 'clearblocks'),
    'ccb_enable_secondary_menu_cb',
    'clearblocks-settings-page',
    'ccb_settings_section'
  );
}

function og_title_input_cb()
{
  $options = get_option('clearblocks_options');
?>
  <input class="regular-text" name="clearblocks_options[og_title]" value="<?php echo esc_attr($options['og_title']); ?>" />
<?php
}

function og_image_input_cb()
{
  $options = get_option('clearblocks_options');
?>
  <input type="hidden" name="clearblocks_options[og_img]" id="up_og_image" value="<?php echo esc_attr($options['og_img']); ?>">
  <img src="<?php echo esc_attr($options['og_img']); ?>" id="og-img-preview">
  <a href="#" class="button-primary" id="og-img-btn">
    Select Image
  </a>
<?php
}

function og_description_input_cb()
{
  $options = get_option('clearblocks_options');
?>
  <textarea name="clearblocks_options[og_description]" class="large-text"><?php echo esc_html($options['og_description']); ?></textarea>
<?php
}

function og_enable_input_cb()
{
  $options = get_option('clearblocks_options');
?>
  <label for="up_enable_og">
    <input name="clearblocks_options[enable_og]" type="checkbox" id="up_enable_og" value="1" <?php checked('1', $options['enable_og']); ?> />
    <span>Enable</span>
  </label>
<?php
}

function ccb_settings_section_cb()
{
?>
  <p>Update the Clearblocks settings here.</p>
<?php
}
function ccb_enable_secondary_menu_cb()
{
  $settings = get_option('clearblocks_settings');
?>
  <label for="ccb_enable_secondary_menu">
    <input name="clearblocks_settings[enable_secondary_menu]" type="checkbox" id="ccb_enable_secondary_menu" value="1" <?php checked('1', $settings['enable_secondary_menu']); ?> />
    <span>Enable</span>
  </label>
<?php
}
