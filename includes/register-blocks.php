<?php

function clearblocks_register_blocks()
{
  $blocks = [
    // ['name' => 'fancy-header'],
    ['name' => 'boilerplate'],
    ['name' => 'search-form', 'options' => [
      'render_callback' => 'clearblocks_search_form_render_cb'
    ]]
  ];

  foreach ($blocks as $block) {
    register_block_type(
      CLEARBLOCKS__PLUGIN_DIR . 'build/blocks/' . $block['name'],
      isset($block['options']) ? $block['options'] : []
    );
  }
}
