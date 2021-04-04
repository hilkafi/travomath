<?php

/*
	
@package travomath
	
	========================
		ADMIN PAGE
	========================
*/
function travomath_add_admin_page() {
    add_menu_page( 'TravOMath Theme Options', 'travomath', 'manage_options', 'travomath_options', 'travomath_create_admin_options_page_callback', 'dashicons-external', 110 );
    
    //add submenu
    add_submenu_page( 'travomath_options', 'TravOMath Theme Options', 'Admin Profile', 'manage_options', 'travomath_options', 'travomath_create_admin_options_page_callback' );
	add_submenu_page( 'travomath_options', 'TravOMath CSS Options', 'Custom CSS', 'manage_options', 'travomath_options_css', 'travomath_create_admin_css_page_callback');
	add_submenu_page( 'travomath_options', 'TravOMath Settings', 'Settings', 'manage_options', 'travomath_options_settings', 'travomath_create_admin_setting_page_callback');
}
add_action( 'admin_menu', 'travomath_add_admin_page' );

/*
    =============================
    Custom Settings
    =============================
*/
function travomath_custom_settings() {
    register_setting( 'travomath-admin-profile-group', 'profile_picture' );
	register_setting( 'travomath-admin-profile-group', 'first_name' );
	register_setting( 'travomath-admin-profile-group', 'last_name' );
	register_setting( 'travomath-admin-profile-group', 'user_description' );
	register_setting( 'travomath-admin-profile-group', 'twitter_handler', 'travomath_sanitize_twitter_handler' );
	register_setting( 'travomath-admin-profile-group', 'facebook_handler' );
	register_setting( 'travomath-admin-profile-group', 'insta_handler' );
    
    add_settings_section( 'travomath-admin-profile-section', 'Admin Profile Section', 'travomath_admin_profile_section_callback', 'travomath_options');

    
    add_settings_field( 'admin-profile-picture', 'Profile Picture', 'travomath_profile_picture_callback', 'travomath_options', 'travomath-admin-profile-section');

    add_settings_field( 'admin-profile-name', 'Full Name', 'travomath_admin_profile_name_callback', 'travomath_options', 'travomath-admin-profile-section' );
    
    add_settings_field( 'admin-description', 'Description', 'travomath_admin_description_callback', 'travomath_options', 'travomath-admin-profile-section');
    
    add_settings_field( 'admin-twitter', 'Twitter handler', 'travomath_admin_twitter_callback', 'travomath_options', 'travomath-admin-profile-section');
    
    add_settings_field( 'admin-facebook', 'Facebook handler', 'travomath_admin_facebook_callback', 'travomath_options', 'travomath-admin-profile-section');
    
	add_settings_field( 'admin-insta', 'Instagram handler', 'travomath_admin_insta_callback', 'travomath_options', 'travomath-admin-profile-section');

	//Custom CSS Options
	register_setting( 'travomath-custom-css-options', 'travomath_custom_css', 'travomath_sanitize_custom_css' );
	register_setting( 'travomath-custom-css-options', 'custom_font_one', 'travomath_sanitize_text_field' );
	register_setting( 'travomath-custom-css-options', 'custom_font_two', 'travomath_sanitize_text_field' );

	add_settings_section( 'travomath-custom-css-section', 'Custom CSS', 'travomath_custom_css_section_callback', 'travomath_options_css' );
	
	add_settings_field( 'custom-font-one', 'Custom Font One', 'travomath_custom_font_one_callback', 'travomath_options_css', 'travomath-custom-css-section' );
	add_settings_field( 'custom-font-two', 'Custom Font Two', 'travomath_custom_font_two_callback', 'travomath_options_css', 'travomath-custom-css-section' );
	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'travomath_custom_css_callback', 'travomath_options_css', 'travomath-custom-css-section' );


	//Theme Settings
	register_setting( 'travomath-theme-settings', 'post_formats' );
	register_setting( 'travomath-theme-settings', 'custom_header' );
	register_setting( 'travomath-theme-settings', 'custom_background' );
	register_setting( 'travomath-theme-settings', 'homepage_slider' );

	add_settings_section( 'travomath-theme-settings-section', 'Theme Settings', 'travomath_theme_settings_options_callback', 'travomath_options_settings' );
	
	add_settings_field( 'post-formats', 'Post Formats', 'travomath_post_formats_callback', 'travomath_options_settings', 'travomath-theme-settings-section' );
	add_settings_field( 'custom-header', 'Custom Header', 'travomath_custom_header_callback', 'travomath_options_settings', 'travomath-theme-settings-section' );
	add_settings_field( 'custom-background', 'Custom Background', 'travomath_custom_background_callback', 'travomath_options_settings', 'travomath-theme-settings-section' );
	add_settings_field( 'homepage-slider', 'HomePage Slider', 'travomath_homepage_slider_callback', 'travomath_options_settings', 'travomath-theme-settings-section' );
}
add_action( 'admin_init', 'travomath_custom_settings' );





/*
    =============================
    Callback Functions
    =============================
*/

/* Main Menu Page Callback Function */
function travomath_create_admin_options_page_callback() {
    require_once( get_template_directory() . '/inc/templates/travomath-admin-options.php' );
}

// Custom Css Submenu Page Create Callback
function travomath_create_admin_css_page_callback() {
	require_once( get_template_directory() . '/inc/templates/travomath-custom-css.php' );
}

//Admin Profile Section
function travomath_admin_profile_section_callback() {
    echo 'Add Your Profile Info';
}


//Admin Profile Picture Callback
function travomath_profile_picture_callback() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
	
}

// Admin Profile Full Name Callback
function travomath_admin_profile_name_callback() {
    $firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function travomath_admin_description_callback() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function travomath_admin_twitter_callback() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function travomath_admin_facebook_callback() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function travomath_admin_insta_callback() {
	$gplus = esc_attr( get_option( 'insta_handler' ) );
	echo '<input type="text" name="insta_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

/* Setting Page Callback */
function travomath_create_admin_setting_page_callback() {
	require_once( get_template_directory() . '/inc/templates/travomath-theme-settings.php' );
}

function travomath_theme_settings_options_callback() {
	echo 'Activate and Deactivate specific Theme Support Options';
}
function travomath_post_formats_callback() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function travomath_custom_header_callback() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function travomath_custom_background_callback() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

function travomath_homepage_slider_callback() {
	$options = get_option( 'homepage_slider' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="homepage_slider" name="homepage_slider" value="1" '.$checked.' /> Activate the Homepage Slider</label>';
}

/* Custom Css Callback */
function travomath_custom_css_section_callback() {
	echo 'Customize TravOMath Theme with your own CSS';
}

function travomath_custom_font_one_callback() {
	$font_one = get_option( 'custom_font_one' );
	echo '<label><input type="text" id="custom_font_one" name="custom_font_one" value="'.$font_one.'" /> Inset Your Custom Font Link Here.</label>';
}

function travomath_custom_font_two_callback() {
	$font_two = get_option( 'custom_font_two' );
	echo '<label><input type="text" id="custom_font_two" name="custom_font_two" value="'.$font_two.'" /> Inset Your Custom Font Link Here.</label>';

}

function travomath_custom_css_callback() {
	$css = get_option( 'travomath_custom_css' );
	$css = ( empty($css) ? '/* TravOMath Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="travomath_custom_css" name="travomath_custom_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

//Sanitization settings
function travomath_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function travomath_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

function travomath_sanitize_text_field( $input ) {
	$output = sanitize_text_field( $input );
	return $output;
}

