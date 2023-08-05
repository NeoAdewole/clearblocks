<?php

function clearblocks_popular_socials_render_cb($atts)
{
  $title = esc_html($atts['title']);
  $channelIDs = array_map(function ($term) {
    return $term['id'];
  }, $atts['channels']);

  $args = [
    'post_type'     => 'social',
    'post_per_page' => $atts['count'],
    'orderby'       => 'meta_value_num',
    'meta_key'      => 'social_rating',
    'order'         => 'desc'
  ];

  if (!empty($channelIDs)) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'channel',
        'field'    => 'term_id',
        'terms'    => $channelIDs
      ]
    ];
  }

  $query = new WP_Query($args);

  ob_start();
?>
  <div class="wp-block-clearblocks-popular-socials">
    <h6><?php echo $title; ?></h6>
    <?php

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post(); ?>
        <div class="single-post">
          <a href="<?php the_permalink(); ?>" class="single-post-image">
            <?php the_post_thumbnail('thumbnail'); ?>
          </a>
          <div class="single-post-detail">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
            <span>
              By
              <a href="<?php the_permalink(); ?>">
                <?php the_author(); ?>
              </a>
            </span>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>

<?php

  wp_reset_postdata();

  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}
