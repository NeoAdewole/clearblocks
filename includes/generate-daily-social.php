<?php

function clearblocks_generate_daily_social()
{
  global $wpdb;
  $id = $wpdb->get_var(
    "SELECT ID from {$wpdb->posts}
    WHERE post_status = 'publish' AND post_type='social'
    ORDER BY rand() LIMIT 1"
  );

  set_transient('clearblocks_daily_social_id', $id, DAY_IN_SECONDS);

  return $id;
}
