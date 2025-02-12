<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Validate plugin settings

function myplugin_callback_validate_options($input){

    // todo: add validation functionality....
   
    return $input;
   
   }
   

//Callback login section

function myplugin_callback_section_login(){
    echo '<p>The settings enable to customize the login screen</p>';
}

//Callback admin section
function myplugin_callback_section_admin(){
    echo '<p>The settings enable to customize the admin screen</p>';
}

// callback: url field
//function myplugin_callback_field_url( $args ) {
	
	//echo 'url';
	
//}

// callback: text field
function myplugin_callback_field_text( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );

    $id = isset( $args['id'] ) ? $args['id'] : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
    echo '<input id="myplugin_options_'. $id . ' " name="myplugin_options['. $id . ']" type="text" size="40" value=" '. $value . '"> <br />';

    echo '<label for="myplugin_options_'. $id . '">' . $label . '</label>';



	
}

// radio field options
function myplugin_options_radio() {
	
	return array(
		
		'enable'  => esc_html__('Enable custom styles', 'myplugin'),
		'disable' => esc_html__('Disable custom styles', 'myplugin')
		
	);
	
}


// callback: radio field
function myplugin_callback_field_radio( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = myplugin_options_radio();
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="myplugin_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}

// callback: textarea field
function myplugin_callback_field_textarea( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
	echo '<textarea id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="myplugin_options_'. $id .'">'. $label .'</label>';
	
}

// callback: radio field
function myplugin_callback_field_footer_text( $args ) {
	
	echo 'text footer';
	
}

// callback: checkbox field
function myplugin_callback_field_checkbox( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="myplugin_options_'. $id .'">'. $label .'</label>';
	
}


// select field options
function myplugin_options_select() {
	
	return array(
		
		'default'   => esc_html__('Default',   'myplugin'),
		'light'     => esc_html__('Light',     'myplugin'),
		'blue'      => esc_html__('Blue',      'myplugin'),
		'coffee'    => esc_html__('Coffee',    'myplugin'),
		'ectoplasm' => esc_html__('Ectoplasm', 'myplugin'),
		'midnight'  => esc_html__('Midnight',  'myplugin'),
		'ocean'     => esc_html__('Ocean',     'myplugin'),
		'sunrise'   => esc_html__('Sunrise',   'myplugin'),
		
	);
	
}

// callback: select field
function myplugin_callback_field_select( $args ) {
	
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = myplugin_options_select();
	
	echo '<select id="myplugin_options_'. $id .'" name="myplugin_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( $selected_option === $value, true, false );
		
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		
	}
	
	echo '</select> <label for="myplugin_options_'. $id .'">'. $label .'</label>';
	
}