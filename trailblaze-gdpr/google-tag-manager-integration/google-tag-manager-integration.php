<?php
function gtm_head_code(){
	echo "<script>\r\n";
	echo "	// Define dataLayer and the gtag function.\r\n";
	echo "	window.dataLayer = window.dataLayer || [];\r\n";
	echo "	function gtag(){dataLayer.push(arguments);}\r\n";
	echo "	\r\n";
	echo "	// Default ad_storage to 'denied'.\r\n";
	echo "	gtag('consent', 'default', {\r\n";
	echo "		'ad_storage': 'denied',\r\n";
	echo "		'analytics_storage': 'denied',\r\n";
	echo "		'functionality_storage': 'denied',\r\n";
	echo "		'personalization_storage': 'denied',\r\n";
	echo "		'security_storage': 'denied'\r\n";
	echo "	});\r\n";
	echo "</script>\r\n";
	echo "\r\n";
	echo "<!-- Google Tag Manager -->\r\n";
	echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':\r\n";
	echo "new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],\r\n";
	echo "j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=\r\n";
	echo "'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);\r\n";
	echo "})(window,document,'script','dataLayer','GTM-".esc_attr( get_option( 'google_tag_manager_container_id' ) )." ');</script>\r\n";
	echo " <!-- End Google Tag Manager -->\r\n";
}
function gtm_body_code(){
	echo "<!-- Google Tag Manager (noscript) -->\r\n";
	echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-'.esc_attr( get_option( 'google_tag_manager_container_id' ) ).'" "height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>'."\r\n";
	echo "<!-- End Google Tag Manager (noscript) -->\r\n";
}
add_action('wp_head', 'gtm_head_code');
add_action('wp_footer', 'gtm_body_code');
?>