<?php

function ccb_plugin_options_page_alt(){
    ?>
    <div class="wrap">
        <form method="POST" action="options.php">
            <?php 
                settings_fields('ccb_options_group');
                do_settings_sections('clearblocks-options-page');
                submit_button();
            ?>

        </form>
    </div>
    <?php
}