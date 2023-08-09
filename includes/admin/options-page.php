<?php

function ccb_plugin_options_page(){
    $options = get_option('clearblocks_options');
    ?>
        <div class="wrap">
            <h1><?php esc_html_e('Udemy Plus Settings', 'udemy-plus' ); ?></h1>
            <input type='hidden' name='action' value='clearblocks_save_options' />
            <?php wp_nonce_field(); ?> 
            <form novalidate="novalidate" method='POST' action='admin-post.php'>
                <table class="form-table">
                    <tbody>
                    <!-- Open Graph Title -->
                    <tr>
                        <th>
                        <label for="up_og_title">
                            <?php esc_html_e('Open Graph Title', 'udemy-plus'); ?>
                        </label>
                        </th>
                        <td>
                        <input name="up_og_title" type="text" id="up_og_title"
                            class="regular-text" />
                        </td>
                    </tr>
                    <!-- Open Graph Image -->
                    <tr>
                        <th>
                        <label for="up_og_image">
                            <?php esc_html_e('Open Graph Image', 'udemy-plus'); ?>
                        </label>
                        </th>
                        <td>
                        <input type="hidden" name="up_og_image" id="up_og_image" />
                        <img id="og-img-preview">
                        <a href="#" class="button-primary" id="og-img-btn">
                            Select Image
                        </a>
                        </td>
                    </tr>
                    <!-- Open Graph Description -->
                    <tr>
                        <th>
                        <label for="up_og_description">
                            <?php esc_html_e('Open Graph Description', 'udemy-plus'); ?>
                        </label>
                        </th>
                        <td>
                        <textarea 
                            id="up_og_description" 
                            name="up_og_description"
                            class="large-text"
                        ></textarea>
                        </td>
                    </tr>
                    <!-- Enable Open Graph -->
                    <tr>
                        <th>
                        <?php esc_html_e('Open Graph', 'udemy-plus'); ?>
                        </th>
                        <td>
                        <label for="up_enable_og"> 
                        <input name="up_enable_og" type="checkbox" id="up_enable_og" 
                            value="1" /> 
                        <span>Enable</span>
                        </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    <?php
}