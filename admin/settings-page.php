
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function myplugin_dispplay_settings_page(){
    ?>

      <div class="wrap">
         <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
         <form action="options.php" method="post">
            <?php

              //output security fields
              settings_fields( 'myplugin_options' );

              //output settings sections
              do_settings_sections( 'myplugin' );
              
              //submit button
              submit_button();
            
            ?>
         </form>
      </div>

    <?php
 }