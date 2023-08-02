<?php

function ccb_rest_api_rating_handler($request)
{
  $response = ['status' => 1];

  $params = $request->get_json_params();

  if (
    !isset($params['rating'], $params['postID']) ||
    empty($params['rating']) ||
    empty($params['postID'])
  ) {
    return $response;
  }

  $rating = round(floatval($params['rating']), 1);
  $postID = absint($params['postID']);
  $userID = get_current_user_id();

  global $wpdb;
  $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}social_ratings
    WHERE post_id=%d AND user_id=%d",
    $postID,
    $userID
  ));

  if ($wpdb->num_rows > 0) {
    return $response;
  }

  $wpdb->insert(
    "{$wpdb->prefix}social_ratings",
    [
      'post_id' => $postID,
      'rating'  => $rating,
      'user_id' => $userID
    ],
    ['%d', '%f', '%d']
  );

  $avgRating = round($wpdb->get_var($wpdb->prepare(
    "SELECT AVG(`rating`) FROM {$wpdb->prefix}social_ratings
    WHERE post_id=%d",
    $postID
  )), 1);

  update_post_meta($postID,  'social_rating', $avgRating);

  do_action('social_rated', [
    'post_id' => $postID,
    'rating'  => $rating,
    'userID' => $userID
  ]);

  $response['status'] = 2;
  $response['rating'] = $avgRating;
  return $response;
}
