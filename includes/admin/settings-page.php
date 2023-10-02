<?php

function ccb_plugin_settings_page()
{
?>
  <div class="wrap">
    <form method="POST" action="options.php">
      <?php
      settings_fields('ccb_settings_group');
      do_settings_sections('clearblocks-settings-page');
      submit_button();
      ?>

    </form>
  </div>
<?php
}
