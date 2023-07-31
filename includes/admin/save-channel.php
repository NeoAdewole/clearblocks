<?php

function ccb_save_channel_meta($termID)
{
  if (!isset($_POST['ccb_more_info_url'])) {
    return;
  }

  update_term_meta(
    $termID,
    'more_info_url',
    sanitize_url($_POST['ccb_more_info_url'])
  );
}
