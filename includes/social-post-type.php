<?php

function ccb_social_post_type()
{
  $labels = array(
    'name'                  => _x('Socials', 'Post type general name', 'clearblocks'),
    'singular_name'         => _x('Social', 'Post type singular name', 'clearblocks'),
    'menu_name'             => _x('Socials', 'Admin Menu text', 'clearblocks'),
    'name_admin_bar'        => _x('Social', 'Add New on Toolbar', 'clearblocks'),
    'add_new'               => __('Add New', 'clearblocks'),
    'add_new_item'          => __('Add New Social', 'clearblocks'),
    'new_item'              => __('New Social', 'clearblocks'),
    'edit_item'             => __('Edit Social', 'clearblocks'),
    'view_item'             => __('View Social', 'clearblocks'),
    'all_items'             => __('All Socials', 'clearblocks'),
    'search_items'          => __('Search Socials', 'clearblocks'),
    'parent_item_colon'     => __('Parent Socials:', 'clearblocks'),
    'not_found'             => __('No socials found.', 'clearblocks'),
    'not_found_in_trash'    => __('No socials found in Trash.', 'clearblocks'),
    'featured_image'        => _x('Social Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'clearblocks'),
    'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'clearblocks'),
    'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'clearblocks'),
    'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'clearblocks'),
    'archives'              => _x('Social archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'clearblocks'),
    'insert_into_item'      => _x('Insert into social', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'clearblocks'),
    'uploaded_to_this_item' => _x('Uploaded to this social', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'clearblocks'),
    'filter_items_list'     => _x('Filter socials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'clearblocks'),
    'items_list_navigation' => _x('Socials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'clearblocks'),
    'items_list'            => _x('Socials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'clearblocks'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'social'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
    'show_in_rest'       => true,
    'description'        => __('A custom post type for social content', 'clearblocks'),
    'taxonomies'         => ['category', 'post_tag']
  );

  register_post_type('social', $args);

  register_taxonomy('channel', 'social', [
    'label'   => __('Channel', 'clearblocks'),
    'rewrite' => ['slug' => 'channel'],
    'show_in_rest' => true
  ]);

  register_term_meta('channel', 'more_info_url', [
    'type' => 'string',
    'description' => __('A URL from more information on a channel', 'clearblocks'),
    'single' => true,
    'show_in_rest' => true,
    'default' => '#'
  ]);

  register_post_meta('social', 'social_rating', [
    'type' => 'number',
    'description' => __('The rating for a social post', 'clearblocks'),
    'single' => true,
    'default' => 0,
    'show_in_rest' => true
  ]);

  register_post_meta('', 'og_title', [
    'single' => true,
    'type'   => 'string',
    'show_in_rest' => true,
    'sanitize_callback' => 'sanitize_text_field',
    'auth_callback'  => function () {
      return current_user_can('edit_posts');
    }
  ]);
  register_post_meta('', 'og_description', [
    'single' => true,
    'type'   => 'string',
    'show_in_rest' => true,
    'sanitize_callback' => 'sanitize_text_field',
    'auth_callback'  => function () {
      return current_user_can('edit_posts');
    }
  ]);
  register_post_meta('', 'og_image', [
    'single' => true,
    'type'   => 'string',
    'show_in_rest' => true,
    'sanitize_callback' => 'sanitize_text_field',
    'auth_callback'  => function () {
      return current_user_can('edit_posts');
    }
  ]);
  register_post_meta('', 'og_override_image', [
    'single' => true,
    'type'   => 'boolean',
    'default' => 'false',
    'show_in_rest' => true,
    'sanitize_callback' => 'sanitize_text_field',
    'auth_callback'  => function () {
      return current_user_can('edit_posts');
    }
  ]);
}
