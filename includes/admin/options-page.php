<?php

function ccb_plugin_options_page(){
  $options = get_option('clearblocks_options');
  ?>
    <div class="wrap">
      <h1><?php esc_html_e('Clearblocks Settings', 'cc-clearblocks' ); ?></h1>
      <?php
        if(isset($_GET['status']) && $_GET['status'] == '1'){
          ?>
          <div class="notice notice-success inline">
            <p><?php esc_html_e('Options updated successfully', 'cc-clearblocks') ?></p>
          </div>
          <?php
        }
      ?>
      <form novalidate="novalidate" method='POST' action='admin-post.php'>
        <input type='hidden' name='action' value='ccb_save_options' />
        <?php wp_nonce_field('ccb_options_verify'); ?> 
        <table class="form-table">
          <tbody>
          <!-- Open Graph Title -->
          <tr>
            <th>
            <label for="ccb_og_title">
              <?php esc_html_e('Open Graph Title', 'cc-clearblocks'); ?>
            </label>
            </th>
            <td>
            <input name="ccb_og_title" type="text" id="ccb_og_title"
              class="regular-text" 
              value='<?php echo esc_attr($options['og_title']); ?>'
            />
            </td>
          </tr>
          <!-- Open Graph Image -->
          <tr>
            <th>
            <label for="ccb_og_image">
              <?php esc_html_e('Open Graph Image', 'cc-clearblocks'); ?>
            </label>
            </th>
            <td>
            <input type="hidden" name="ccb_og_image" id="ccb_og_image"  value="<?php echo esc_attr($options['og_img']); ?>" />
            <img id="og-img-preview" src="<?php echo esc_attr($options['og_img']); ?>">
            <a href="#" class="button-primary" id="og-img-btn">
              Select Image
            </a>
            </td>
          </tr>
          <!-- Open Graph Description -->
          <tr>
            <th>
            <label for="ccb_og_description">
              <?php esc_html_e('Open Graph Description', 'cc-clearblocks'); ?>
            </label>
            </th>
            <td>
            <textarea 
              id="ccb_og_description" 
              name="ccb_og_description"
              class="large-text"
              value="<?php echo esc_attr($options['og_description']); ?>"
            ><?php echo esc_attr($options['og_description']); ?></textarea>
            </td>
          </tr>
          <!-- Enable Open Graph -->
          <tr>
            <th>
            <?php esc_html_e('Open Graph', 'cc-clearblocks'); ?>
            </th>
            <td>
            <label for="ccb_enable_og"> 
            <input name="ccb_enable_og" type="checkbox" id="ccb_enable_og" 
                value="1" <?php checked('1', $options['enable_og']); ?>/> 
            <span>Enable</span>
            </label>
            </td>
          </tr>
          </tbody>
        </table>
        <?php submit_button(); ?>
      </form>
    </div>
  <?php
}