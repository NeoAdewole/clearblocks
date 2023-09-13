<?php

function ccb_wp_head()
{
  $options = get_option('clearblocks_options');

  if (isset($options) && $options['enable_og'] != 1) {
    return;
  }

  $title = $options['og_title'];
  $description = $options['og_description'];
  $img = $options['og_img'];
  $url = site_url('/');
  $postID = get_the_id();

  $newTitle = get_post_meta($postID, 'og_title', true);
  $title = empty($newTitle) ? $title : $newTitle;

  $newDescription = get_post_meta($postID, 'og_description', true);
  $description = empty($newDescription) ? $description : $newDescription;

  if (is_single($postID)) {
    // override opengraph for single posts
    $overrideImage = get_the_post_thumbnail_url($postID, 'openGraph');
    $title .= ": " . get_the_title($postID);
    $description .= ". " . get_the_excerpt($postID);
    $img = $overrideImage ? $overrideImage : $img;
    $url = get_the_permalink($postID);
  }
?>
  <meta property="og:title" content="<?php echo esc_attr($title); ?>" />
  <meta property="og:description" content="<?php echo esc_attr($description); ?>" />
  <meta property="og:image" content="<?php echo esc_attr($img); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo esc_attr($url); ?>" />

<?php
}
