<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

#options security
$wmso_options = get_option( 'wmso_wikimint_security_settings' ); 
		if (isset ($wmso_options["wmso_wikimint_hide_ver_meta"]) ){
			if ($wmso_options["wmso_wikimint_hide_ver_meta"] == "true") {
			function wmso_wikimint_security_remove_version() {
			return '';
					}
add_filter('the_generator', 'wmso_wikimint_security_remove_version');	
				}
		} 
		


if (isset ($wmso_options["wmso_wikimint_hide_ver_url"]) ){
			if ($wmso_options["wmso_wikimint_hide_ver_url"] == "true") {
function wmso_wikimint_remove_css_js_version( $wmso_src ) {
    if( strpos( $wmso_src, '?ver=' ) )
        $wmso_src = remove_query_arg( 'ver', $wmso_src );
    return $wmso_src;
}
add_filter( 'style_loader_src', 'wmso_wikimint_remove_css_js_version', 9999 );
add_filter( 'script_loader_src', 'wmso_wikimint_remove_css_js_version', 9999 );
				}
		} 

if (isset ($wmso_options["wmso_wikimint_remove_mal_url_req"]) ){
			if ($wmso_options["wmso_wikimint_remove_mal_url_req"] == "true") {
global $wmso_user_ID; if($wmso_user_ID) {
    if(!current_user_can('administrator')) {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")) {
                @header("HTTP/1.1 414 Request-URI Too Long");
                @header("Status: 414 Request-URI Too Long");
                @header("Connection: Close");
                @exit;
        }
    }
}
				} 
		} 


if (isset ($wmso_options["wmso_wikimint_security_rem_xrpc"]) ){
			if ($wmso_options["wmso_wikimint_security_rem_xrpc"] == "true") {
add_filter('xmlrpc_enabled', '__return_false');
	} 
}




#options optimize
$wmso_optionsopt = get_option( 'wmso_wikimint_optimize_settings' ); 

if (isset ($wmso_optionsopt["wmso_wikimint_optimize_rem_rsd"]) ){
			if ($wmso_optionsopt["wmso_wikimint_optimize_rem_rsd"] == "true") {
remove_action( 'wp_head', 'rsd_link' ) ;
	} 
}


if (isset ($wmso_optionsopt["wmso_wikimint_optimize_rem_wlw"]) ){
			if ($wmso_optionsopt["wmso_wikimint_optimize_rem_wlw"] == "true") {
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
	} 
}

if (isset ($wmso_optionsopt["wmso_wikimint_optimize_dis_emo"]) ){
			if ($wmso_optionsopt["wmso_wikimint_optimize_dis_emo"] == "true") {
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
	} 
}

if (isset ($wmso_optionsopt["wmso_wikimint_optimize_rem_srtlnk"]) ){
			if ($wmso_optionsopt["wmso_wikimint_optimize_rem_srtlnk"] == "true") {
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	} 
}



#options maintenance
$wmso_optionsmaint = get_option( 'wmso_wikimint_maint_settings' ); 


?>
