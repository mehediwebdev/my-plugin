
<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function myplugin_add_sublevel_menu(){
     add_submenu_page(
       'options-general.php',
       'MyPlugin Settings',
       'MyPlugin',
       'manage_options',
       'myplugin',
       'myplugin_dispplay_settings_page',


     );
 }
 add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );
