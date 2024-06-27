<?php

function ccb_channel_add_form_fields()
{
?>
  <div class="form-field">
    <label><?php _e('More Info URL', 'clearblocks'); ?></label>
    <input type="text" name="ccb_more_info_url" />
    <p><?php _e('A URL a user can click to learn more about this social post', 'clearblocks'); ?></p>
  </div>

<?php

}

function ccb_channel_edit_form_fields($term)
{
  $url = get_term_meta($term->term_id, 'more_info_url', true);
?>
  <tr class="form-field">
    <th>
      <label><?php _e('More Info URL', 'clearblocks'); ?></label>
    </th>
    <td>
      <input type="text" name="ccb_more_info_url" value="<?php echo $url ?>" />
      <p class="description"><?php _e('A URL a user can click to learn more about this social post', 'clearblocks'); ?></p>
    </td>
  </tr>
<?php
}
