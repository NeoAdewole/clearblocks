<?php

function ccb_save_post_social($postID)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  $rating = get_post_meta($postID, 'social_rating', true);
  $rating = empty($rating) ? 0 : floatval($rating);

  update_post_meta($postID, 'social_rating', $rating);
}
