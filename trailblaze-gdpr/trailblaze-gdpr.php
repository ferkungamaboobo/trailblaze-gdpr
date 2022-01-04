<?php 
/*
Plugin Name: GDPR Compliance
Plugin URI: https://www.trailblaze.marketing
Description: Alpha build of Trailblaze Marketing GDPR Compliance. Includes integrations with Gravity Forms and Tag Manager
Version: 0.0.01
Author: Doug R Thomas
Author URI: https://ferkungamaboobo.com
License: proprietary
License URI: proprietary
Text Domain: none
Domain Path: na
*/

// Options Vars
$tb_use_gdpr_banner = '';
$tb_gravity_forms_integration = '';
$tb_use_google_tag_manager_integration = '';


// Initializes
add_action('admin_menu', 'tb_gdpr_add_pages');
add_action('admin_init', 'tb_gdpr_register_settings');

function tb_gdpr_register_settings(){
	register_setting( 'trailblaze_gdpr_options', 'use_gdpr_banner');
	register_setting( 'trailblaze_gdpr_options', 'use_google_tag_manager_integration');
	register_setting( 'trailblaze_gdpr_options', 'google_tag_manager_container_id');
	register_setting( 'trailblaze_gdpr_options', 'use_gravity_forms_integration');
	
    add_settings_section( 'gdpr_banner', 'GDPR Banner Settings', 'use_gdpr_banner_infotext', 'trailblaze_gdpr' );
    add_settings_field( 'use_gdpr_banner_field', 'Enable GDPR Banner', 'use_gdpr_banner_field_input', 'trailblaze_gdpr', 'gdpr_banner' );	
    add_settings_section( 'google_tag_manager_integration', 'Google Tag Manager Settings', 'use_google_tag_manager_integration_infotext', 'trailblaze_gdpr' );
    add_settings_field( 'use_google_tag_manager_integration_field', 'Enable GTM Integration', 'use_google_tag_manager_integration_field_input', 'trailblaze_gdpr', 'google_tag_manager_integration' );	
	add_settings_field( 'google_tag_manager_container_id_field', 'GTM Container ID', 'google_tag_manager_container_id_field_input', 'trailblaze_gdpr', 'google_tag_manager_integration' );	
    add_settings_section( 'gravity_forms_integration', 'Gravity Forms Settings', 'use_gravity_forms_integration_infotext', 'trailblaze_gdpr' );
    add_settings_field( 'use_gravity_forms_integration_field', 'Enable Gravity Forms Database Deletion', 'use_gravity_forms_integration_field_input', 'trailblaze_gdpr', 'gravity_forms_integration' );	
}

function use_gdpr_banner_infotext() { echo 'This enables the GDPR banner on your site'; }
function use_gdpr_banner_field_input() {
    $setting = esc_attr( get_option( 'use_gdpr_banner' ) );
    echo "<input type='checkbox' name='use_gdpr_banner' ".checked( $setting, 1, false )." value='1' />";
}
function use_google_tag_manager_integration_infotext() { echo 'This adds Google Tag Manager with consent denied as default.'; }
function use_google_tag_manager_integration_field_input() {
    $setting = esc_attr( get_option( 'use_google_tag_manager_integration' ) );
    echo "<input type='checkbox' name='use_google_tag_manager_integration' ".checked( $setting, 1, false )." value='1' />";
}
function google_tag_manager_container_id_field_input() {
    $setting = esc_attr( get_option( 'google_tag_manager_container_id' ) );
    echo "GTM-<input type='text' name='google_tag_manager_container_id' placeholder='4LPH4NM' value='$setting' />";
}
function use_gravity_forms_integration_infotext() { echo 'This immediately deletes Gravity Forms submissions from the database when consent is not given.'; }
function use_gravity_forms_integration_field_input() {
    $setting = esc_attr( get_option( 'use_gravity_forms_integration' ) );
    echo "<input type='checkbox' name='use_gravity_forms_integration' ".checked( $setting, 1, false )." value='1' />";
}


function tb_gdpr_add_pages() {
    add_menu_page('GDPR Compliance', 'GDPR Settings', 'manage_options', 'trailblaze_gdpr', 'trailblaze_gdpr_settings_page');
}
function trailblaze_gdpr_settings_page() { ?>
	<div class="wrap">
		<h1>GDPR Compliance Settings Page</h1>
		<p>These are settings for various GDPR Compliance Settings.</p>
		<form action="options.php" method="POST">
			<?php settings_fields('trailblaze_gdpr_options'); ?>
			<?php do_settings_sections('trailblaze_gdpr'); ?>
			<?php submit_button(); ?>
		</form>
	</div>
<?php }

require 'trailblaze-gdpr-get-options.php';
// Does stuff?
if($tb_use_gdpr_banner === '1') { require 'gdpr-banner/gdpr-banner.php'; }
if($tb_use_gravity_forms_integration === '1') { require 'gravity-forms-integration/gravity-forms-integration.php'; }
if($tb_use_google_tag_manager_integration === '1') { require 'google-tag-manager-integration/google-tag-manager-integration.php'; }

?>
