<?php
/*
 * Plugin Name:       MyPlugin 
 * Description:       Myplugin is a login page design WordPress plugin.
 * Plugin URI:        https://wordpress.org/
 * Version:           1.0.0
 * Requires at least: 6.2
 * Requires PHP:      7.2
 * Author:            Mehedi Hasan
 * Author URI:        www.mehediwebdev.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       myplugin
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//if admin area

if( is_admin() ){
    
    if(file_exists(dirname(__FILE__).'/admin/admin-menu.php')){
        require_once dirname(__FILE__).'/admin/admin-menu.php';
    }
    
    if(file_exists(dirname(__FILE__).'/admin/settings-page.php')){
        require_once dirname(__FILE__).'/admin/settings-page.php';
    }

    if(file_exists(dirname(__FILE__).'/admin/settings-register.php')){
        require_once dirname(__FILE__).'/admin/settings-register.php';
    }
    if(file_exists(dirname(__FILE__).'/admin/settings-callbacks.php')){
        require_once dirname(__FILE__).'/admin/settings-callbacks.php';
    }
    
    
}


// default plugin options

function myplugin_options_default(){
    return array(
        'custom_url' => 'https://wordpress.org/',
        'custom_title' => 'Powered by WordPress/',
        'custom_style' => 'disable',
        'custom_message' => '<p class="custom-message">My Custom message</p>',
        'custom_footer' => 'Special Message for users',
        'custom_toolbar' =>  'false',
        'custom_scheme' => 'default',
    );
}