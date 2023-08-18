<?php

function ccb_load_php_translations()
{
  load_plugin_textdomain(
    "clearblocks",
    false,
    "clearblocks/languages"
  );
}

function ccb_load_block_translations()
{
  $blocks = [
    'clearblocks-advanced-search-editor-script',
    'clearblocks-auth-modal-script',
    'clearblocks-auth-modal-editor-script',
    'clearblocks-daily-social-editor-script',
    'clearblocks-fancy-header-editor-script',
    'clearblocks-featured-video-editor-script',
    'clearblocks-header-tools-editor-script',
    'clearblocks-page-header-editor-script',
    'clearblocks-popular-socials-editor-script',
    'clearblocks-social-summary-script',
    'clearblocks-social-summary-editor-script',
    'clearblocks-team-members-group-editor-script',
    'clearblocks-team-member-editor-script'
  ];

  foreach ($blocks as $block) {
    wp_set_script_translations(
      $block,
      "clearblocks",
      CLEARBLOCKS__PLUGIN_DIR . "languages"
    );
  }
}
