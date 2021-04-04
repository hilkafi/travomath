<h1>Travomath Theme Settings</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="travomath-general-form">
	<?php settings_fields( 'travomath-theme-settings' ); ?>
	<?php do_settings_sections( 'travomath_options_settings' ); ?>
	<?php submit_button(); ?>
</form>