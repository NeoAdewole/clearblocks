<?php

if (!defined("WP_UNINSTALL_PLUGIN")) {
  exit;
}

delete_option("clearblocks_options");

global $wpdb;
$wpdb->query(
  "DROP TABLE IF EXISTS {$wpdb->prefix}social_ratings"
);
