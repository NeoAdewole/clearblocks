<?php

function clearblocks_register_blocks()
{
  $blocks = [
    // ['name' => 'fancy-header'],
    ['name' => 'boilerplate'],
    ['name' => 'search-form', 'options' => [
      'render_callback' => 'clearblocks_search_form_render_cb'
    ]],
    ['name' => 'page-header', 'options' => ['render_callback' => 'clearblocks_page_header_render_cb']],
    ['name' => 'header-tools', 'options' => ['render_callback' => 'clearblocks_header_tools_render_cb']],
    ['name' => 'auth-modal', 'options' => ['render_callback' => 'clearblocks_auth_modal_render_cb']],
    ['name' => 'social-summary', 'options' => ['render_callback' => 'clearblocks_social_summary_render_cb']],
    ['name' => 'team-members-group'],
    ['name' => 'team-member'],
    ['name' => 'popular-socials', 'options' => ['render_callback' => 'clearblocks_popular_socials_render_cb']],
    ['name' => 'daily-social', 'options' => ['render_callback' => 'clearblocks_daily_social_render_cb']],
  ];

  foreach ($blocks as $block) {
    register_block_type(
      CLEARBLOCKS__PLUGIN_DIR . 'build/blocks/' . $block['name'],
      isset($block['options']) ? $block['options'] : []
    );
  }
}
