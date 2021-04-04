<h1>TravoMath Admin Profile</h1>
<?php settings_errors(); ?>
<?php 
	
	$picture = esc_attr( get_option( 'profile_picture' ) );
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
    $description = esc_attr( get_option( 'user_description' ) );
    
    $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
	$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
	$gplus_icon = esc_attr( get_option( 'insta_handler' ) );
	
?>
<div class="travomath-sidebar-preview">
	<div class="travomath-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
		</div>
		<h1 class="travomath-username"><?php print $fullName; ?></h1>
		<h2 class="travomath-description"><?php print $description; ?></h2>
		<div class="icons-wrapper">
			<?php if( !empty( $twitter_icon ) ): ?>
				<span class="sunset-icon-sidebar dashicons-before dashicons-twitter"></span>
			<?php endif; 
			if( !empty( $gplus_icon ) ): ?>
				<span class="sunset-icon-sidebar dashicons dashicons-instagram"></span>
			<?php endif; 
			if( !empty( $facebook_icon ) ): ?>
				<span class="sunset-icon-sidebar dashicons-before dashicons-facebook-alt"></span>
			<?php endif; ?>
		</div>
	</div>
</div>

<form id="submitForm" method="post" action="options.php" class="travomath-general-form">
	<?php settings_fields( 'travomath-admin-profile-group' ); ?>
	<?php do_settings_sections( 'travomath_options' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>