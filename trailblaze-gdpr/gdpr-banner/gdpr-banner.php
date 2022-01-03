<?php

function trailblaze_gdpr_banner(){
	echo '<div id="gdpr"><div>';
	echo '<h2><span>Would you like to enable cookies?</span></h2>';
	echo '<div><button id="gdpr-yes">Yes</button><button id="gdpr-no">No</button></div>';
	echo '</div></div>';
}
function trailblaze_gdpr_banner_css(){
	wp_enqueue_style( 'trailblaze-gdpr-banner', plugin_dir_url( __FILE__ ).'trailblaze-gdpr-banner-styles.css');
}
function trailblaze_gdpr_banner_js(){
	wp_enqueue_script( 'trailblaze_gdpr_banner_script', plugin_dir_url( __FILE__ ).'trailblaze-gdpr-banner-script.js', array(), null, true );
}

add_action( 'wp_footer','trailblaze_gdpr_banner');
add_action( 'wp_enqueue_scripts', 'trailblaze_gdpr_banner_css' );
add_action( 'wp_enqueue_scripts', 'trailblaze_gdpr_banner_js' );

?>