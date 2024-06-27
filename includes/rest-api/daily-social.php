<?php

function ccb_rest_api_daily_social_handler()
{
  $response = [
    'url' => '',
    'img' => '',
    'title' => ''
  ];

  $id = get_transient('clearblocks_daily_social_id');

  if (!$id) {
    $id = clearblocks_generate_daily_social();
  }

  $response['url'] = get_permalink($id);
  $response['img'] = get_the_post_thumbnail_url($id, 'full');
  $response['title'] = get_the_title($id);

  return $response;
}
