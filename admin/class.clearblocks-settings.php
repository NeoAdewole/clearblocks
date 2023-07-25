<?php
defined('ABSPATH') or die('Cant access this file directly');

class Clearblocks_Settings
{
  // register plugin settings
  public static function clearblocks_register_settings()
  {

    register_setting(
      'clearblocks_options',
      'clearblocks_options',
      'clearblocks_callback_validate_options'
    );

    /*
			add_settings_section( string: $id, string: $title, callable: $callback, string: $page);
		*/
    add_settings_section(
      'clearblocks_section_admin',
      esc_html__('Customize Admin Area', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_section_admin'),
      'clearblocks_admin_menu'
    );
    add_settings_section(
      'clearblocks_section_channels',
      esc_html__('Customize Social Channels Page', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_section_channels'),
      'clearblocks_admin_menu'
    );

    /*
			add_settings_field(string:$id, string:$title, callable: $callback, string:$page, string:$section = 'default', array: $args = []);
		*/

    // Admin Section
    add_settings_field(
      'custom_footer',
      esc_html__('Custom Footer', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_text'),
      'clearblocks_admin_menu',
      'clearblocks_section_admin',
      ['id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'clearblocks')]
    );

    add_settings_field(
      'custom_toolbar',
      esc_html__('Custom Toolbar', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_checkbox'),
      'clearblocks_admin_menu',
      'clearblocks_section_admin',
      ['id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'clearblocks')]
    );

    add_settings_field(
      'custom_scheme',
      esc_html__('Custom Scheme', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_select'),
      'clearblocks_admin_menu',
      'clearblocks_section_admin',
      ['id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'clearblocks')]
    );

    // Channels Section
    add_settings_field(
      'custom_url',
      esc_html__('Custom URL', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_text'),
      'clearblocks_admin_menu',
      'clearblocks_section_channels',
      ['id' => 'custom_url', 'label' => esc_html__('Custom URL for the channels logo link', 'clearblocks')]
    );

    add_settings_field(
      'custom_title',
      esc_html__('Custom Title', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_text'),
      'clearblocks_admin_menu',
      'clearblocks_section_channels',
      ['id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'clearblocks')]
    );

    add_settings_field(
      'custom_style',
      esc_html__('Custom Style', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_radio'),
      'clearblocks_admin_menu',
      'clearblocks_section_channels',
      ['id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'clearblocks')]
    );

    add_settings_field(
      'custom_message',
      esc_html__('Custom Message', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_textarea'),
      'clearblocks_admin_menu',
      'clearblocks_section_channels',
      ['id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'clearblocks')]
    );

    add_settings_field(
      'custom_api_key',
      esc_html__('Custom API Key', 'clearblocks'),
      array('Clearblocks_Settings', 'clearblocks_callback_field_sensitive'),
      'clearblocks_admin_menu',
      'clearblocks_section_channels',
      ['id' => 'custom_api_key', 'label' => esc_html__('Custom API Key', 'clearblocks')]
    );
  }

  // callback: login section
  public static function clearblocks_callback_section_admin()
  {
    echo '<p>' . esc_html__('These settings enable you to configure the Clearblocks settings', 'clearblocks') . '</p>';
  }

  // callback: admin section
  public static function clearblocks_callback_section_channels()
  {
    echo '<p>' . esc_html__('These settings enable you to customize the Clearblocks Channels', 'clearblocks') . '</p>';
  }

  // callback: text field
  public static function clearblocks_callback_field_text($args)
  {
    $options = get_option('clearblocks_options', clearblocks_options_default());

    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    echo '<input id="clearblocks_options_' . $id . '" name="clearblocks_options[' . $id . ']" type="text" size="40" value="' . $value . '"><br />';
    echo '<label for="clearblocks_options_' . $id . '">' . $label . '</label>';
  }

  // radio field options
  static function clearblocks_options_radio()
  {
    return array(
      'enable'  => esc_html__('Enable custom styles', 'clearblocks'),
      'disable' => esc_html__('Disable custom styles', 'clearblocks')
    );
  }

  // callback: radio field
  public static function clearblocks_callback_field_radio($args)
  {
    $options = get_option('clearblocks_options', clearblocks_options_default());

    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    $radio_options = self::clearblocks_options_radio();

    foreach ($radio_options as $value => $label) {

      $checked = checked($selected_option === $value, true, false);

      echo '<label><input name="clearblocks_options[' . $id . ']" type="radio" value="' . $value . '"' . $checked . '> ';
      echo '<span>' . $label . '</span></label><br />';
    }
  }

  // callback: textarea field
  public static function clearblocks_callback_field_textarea($args)
  {
    $options = get_option('clearblocks_options', clearblocks_options_default());

    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $allowed_tags = wp_kses_allowed_html('post');

    $value = isset($options[$id]) ? wp_kses(stripslashes_deep($options[$id]), $allowed_tags) : '';

    echo '<textarea id="clearblocks_options_' . $id . '" name="clearblocks_options[' . $id . ']" rows="5" cols="50">' . $value . '</textarea><br />';
    echo '<label for="clearblocks_options_' . $id . '">' . $label . '</label>';
  }

  // callback: checkbox field
  public static function clearblocks_callback_field_checkbox($args)
  {
    $options = get_option('clearblocks_options', clearblocks_options_default());

    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

    echo '<input id="clearblocks_options_' . $id . '" name="clearblocks_options[' . $id . ']" type="checkbox" value="1"' . $checked . '> ';
    echo '<label for="clearblocks_options_' . $id . '">' . $label . '</label>';
  }

  // callback: select field
  public static function clearblocks_callback_field_select($args)
  {
    $options = get_option('clearblocks_options', clearblocks_options_default());

    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    $select_options = array(

      'default'   => esc_html__('Default',  'clearblocks'),
      'light'     => esc_html__('Light',    'clearblocks'),
      'blue'      => esc_html__('Blue',    'clearblocks'),
      'coffee'    => esc_html__('Coffee',    'clearblocks'),
      'ectoplasm' => esc_html__('Ectoplasm',  'clearblocks'),
      'midnight'  => esc_html__('Midnight',  'clearblocks'),
      'ocean'     => esc_html__('Ocean',    'clearblocks'),
      'sunrise'   => esc_html__('Sunrise',  'clearblocks'),

    );

    echo '<select id="clearblocks_options_' . $id . '" name="clearblocks_options[' . $id . ']">';

    foreach ($select_options as $value => $option) {

      $selected = selected($selected_option === $value, true, false);

      echo '<option value="' . $value . '"' . $selected . '>' . $option . '</option>';
    }

    echo '</select> <label for="clearblocks_options_' . $id . '">' . $label . '</label>';
  }

  // callback: sensitive field
  public static function clearblocks_callback_field_sensitive($args)
  {
    $options = get_option('clearblocks_options', clearblocks_options_default());

    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    echo '<input id="clearblocks_options_' . $id . '" name="clearblocks_options[' . $id . ']" type="password" size="40" value="' . $value . '"><br />';
    echo '<label for="clearblocks_options_' . $id . '">' . $label . '</label>';
  }
}
