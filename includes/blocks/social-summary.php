<?php

function clearblocks_social_summary_render_cb($atts)
{
  ob_start();
?>
  
  <?php
  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}
