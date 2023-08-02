<?php

function clearblocks_social_summary_render_cb($atts, $content, $block)
{
  $prepTime = isset($atts['prepTime']) ? esc_html($atts['prepTime']) :  '';
  $cookTime = isset($atts['cookTime']) ? esc_html($atts['cookTime']) :  '';
  $course = isset($atts['course']) ? esc_html($atts['course']) :  '';

  $postID = $block->context['postId'];
  // extract the taxonomy from the post
  $postTerms = get_the_terms($postID, 'channel');
  $postTerms = is_array($postTerms) ? $postTerms : [];
  $channels = '';
  $lastKey = array_key_last($postTerms);

  foreach ($postTerms as $key => $term) {
    // get metadata (more_info_url) for each channel
    $url = get_term_meta($term->term_id, 'more_info_url', true);
    $comma = $key === $lastKey ? '' : ',';

    $channels .= "<a href='{$url}' target='_blank'>{$term->name}</a>{$comma} ";
  }

  $rating = get_post_meta($postID, 'social_rating', true);

  global $wpdb;
  $userID = get_current_user_id();
  $ratingCount = $wpdb->get_var($wpdb->prepare(
    "SELECT COUNT(*) FROM {$wpdb->prefix}social_ratings WHERE post_id=%d AND user_id=%d",
    $postID,
    $userID
  ));

  ob_start();
?>
  <div class="wp-block-clearblocks-social-summary">
    <i class="bi bi-alarm"></i>
    <div class="social-columns-2">
      <div class="social-metadata">
        <div class="social-title">
          <?php _e('Prep Time', 'cc-clearblocks'); ?>
        </div>
        <div class="social-data social-prep-time">
          <?php echo $prepTime; ?>
        </div>
      </div>
      <div class="social-metadata">
        <div class="social-title">
          <?php _e('Cook Time', 'cc-clearblocks'); ?>
        </div>
        <div class="social-data social-cook-time">
          <?php echo $cookTime; ?>
        </div>
      </div>
    </div>
    <div class="social-columns-2-alt">
      <div class="social-columns-2">
        <div class="social-metadata">
          <div class="social-title">
            <?php _e('Course', 'cc-clearblocks'); ?>
          </div>
          <div class="social-data social-course">
            <?php echo $course; ?>
          </div>
        </div>
        <div class="social-metadata">
          <div class="social-title">
            <?php _e('Channel', 'cc-clearblocks'); ?>
          </div>
          <div class="social-data social-channel">
            <?php echo $channels; ?>
          </div>
        </div>
        <i class="bi bi-egg-fried"></i>
      </div>
      <div class="social-metadata">
        <div class="social-title">
          <?php _e('Rating', 'cc-clearblocks'); ?>
        </div>
        <div class="social-data" id="social-rating" data-post-id="<?php echo $postID; ?>" data-avg-rating="<?php echo $rating; ?>" data-logged-in="<?php echo is_user_logged_in(); ?>" data-rating-count="<?php echo $ratingCount; ?>"></div>
        <i class="bi bi-hand-thumbs-up"></i>
      </div>
    </div>
  </div>
<?php
  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}
