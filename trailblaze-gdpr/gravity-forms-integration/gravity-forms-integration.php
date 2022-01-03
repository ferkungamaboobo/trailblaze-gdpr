<?php

function delete_after_submission( $entry ) {
	GFAPI::delete_entry( $entry['id'] );
}
function cookie_echo_test(){
	echo 'text consentcookie not set';
}

if (!isset($_COOKIE["consentYes"])) {
	add_action( 'gform_after_submission', 'delete_after_submission', 10, 2 );
	//add_action( 'wp_footer', 'cookie_echo_test' );
}

?>