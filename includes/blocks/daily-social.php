<?php

function clearblocks_daily_social_render_cb($atts)
{
  $title = esc_html($atts['title']);
  $id = get_transient('ccb_daily_social_id');

  if (!$id) {
    $id = clearblocks_generate_daily_social();
  }

  ob_start();
?>
  <div class="wp-block-clearblocks-daily-social">
    <h6><?php echo $title; ?></h6>
    <a href="<?php the_permalink($id); ?>">
      <img src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" alt="">
      <h3><?php echo get_the_title($id); ?></h3>
    </a>
  </div>

<?php
  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}
