<?php
/*
Plugin Name:  WM Secure and Optimize
Plugin URI:   https://developer.wikimint.com 
Description:  A light weight plugin to keep your site secured and optimized. One place where you can handle security and performance of your website.
Version:      1.0.2
Author:       Wikimint Developer 
Author URI:   https://developer.wikimint.com/p/about.html
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wikimint-security
Domain Path:  /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (is_admin())
{ #admin area start

add_filter( 'plugin_action_links', 'wmso_wikimint_shortcut_links', 10, 5 );
 
function wmso_wikimint_shortcut_links( $actions, $plugin_file ) 
{
   static $plugin;
 
   if (!isset($plugin))
        $plugin = plugin_basename(__FILE__);
   if ($plugin == $plugin_file) {
	  $url = esc_url( add_query_arg(
		'page',
		'wikimint-security',
		get_admin_url() . 'admin.php'
	) );
      $settings = array('settings' => '<a href="' . __( $url ) . '">' . __('Settings', 'General') . '</a>');
      $support_link = array('support' => '<a href="https://wordpress.org/support/plugin/wm-secure-and-optimize/" target="_blank">Support</a>');
               $donate_link = array('donate' => '<a style="color:green;" href="https://developer.wikimint.com/p/donate.html" target="_blank">Donate</a>');
	        $actions = array_merge($donate_link, $actions);
			      $actions = array_merge($support_link, $actions);
      $actions = array_merge($settings, $actions);



   }
     
   return $actions;
}


    add_action('admin_menu', 'wmso_wikimint_security_menu');
    function wmso_wikimint_security_menu()
    {
        add_menu_page('WM Security', 'WM Security', 'administrator', 'wikimint-security', 'wmso_wikimint_security_page', 'dashicons-superhero');
    }

    #Register and enqueue a custom stylesheet in the WordPress admin.
    function wmso_wikimint_enqueue_admin_links()
    {
        wp_register_style('wmso_wikimint_security_css', plugin_dir_url(__FILE__) . 'admin/style.css', true, '1.0.1');
        wp_enqueue_style('wmso_wikimint_security_css');

        wp_register_script('wmso_wikimint_security_js', plugin_dir_url(__FILE__) . 'admin/script.js', true, '1.0.1');
        wp_enqueue_script('wmso_wikimint_security_js');
    }

    add_action('admin_enqueue_scripts', 'wmso_wikimint_enqueue_admin_links');

    #Include utilities start
    include (plugin_dir_path(__FILE__) . 'includes/security.php');
    include (plugin_dir_path(__FILE__) . 'includes/optimize.php');
    include (plugin_dir_path(__FILE__) . 'includes/maint.php');

    function wmso_wikimint_security_page()
    { ?>
<div class="wrap">
	<a name="About" class="wmso-anchor"/>
	<a name="Maintenance" class="wmso-anchor"/>
	<a name="Security" class="wmso-anchor"/>
	<a name="Optimization" class="wmso-anchor"/>
	<div class="tab">
		<a href="#Security">
			<button class="tablinks active" id="btnSecurity" onclick="openWMoptions(event, 'Security')">Security</button>
		</a>
		<a href="#Optimization">
			<button class="tablinks" id="btnOptimization" onclick="openWMoptions(event, 'Optimization')">Optimization</button>
		</a>
		<a href="#Maintenance">
			<button class="tablinks" id="btnMaintenance" onclick="openWMoptions(event, 'Maintenance')">Maintenance mode</button>
		</a>
		<a href="#About">
			<button class="tablinks" id="btnAbout" onclick="openWMoptions(event, 'About')">About</button>
		</a>
	</div>
	<div id="Security" class="tabcontent" style="display:block;">
		<form action='options.php' method='post'><?php
        settings_fields('wikimint-security-setting');
        do_settings_sections('wikimint-security-setting');
        submit_button(); ?>
		</form>
	</div>
	<div id="Optimization" class="tabcontent">
		<form action='options.php' method='post'><?php
        settings_fields('wikimint-optimize-setting');
        do_settings_sections('wikimint-optimize-setting');
        submit_button(); ?>
		</form>
	</div>
	<div id="Maintenance" class="tabcontent">
		<form action='options.php' method='post'><?php
        settings_fields('wikimint-maint-setting');
        do_settings_sections('wikimint-maint-setting');
        submit_button(); ?>
		</form>
	</div>
	<div id="About" class="tabcontent">
		<div style="max-width:800px;">
			<h3>About WM Security</h3>
			<p>WM Security is a simple light weight plugin to enhance your site security and performance. The plugin was developed and published by Wikimint Developer, a web development reference platform founded by Selvakumaran Krishnan.</p>
			<p>This is a fully free to use plugin. There is no any premium plan to upgrade. You can use this plugin at no cost for lifetime.</p>
			<h2>Plugin Details</h2>
			<hr/>
			<p>
<?php
        $wmso_plugin_data = get_plugin_data(__FILE__);
        $wmso_plugin_version = $wmso_plugin_data['Version'];
        $wmso_plugin_uri = $wmso_plugin_data['PluginURI'];
        $wmso_plugin_name = $wmso_plugin_data['Name'];
        $wmso_plugin_description = $wmso_plugin_data['Description'];
        $wmso_plugin_author = $wmso_plugin_data['Author'];
        $wmso_plugin_authoruri = $wmso_plugin_data['AuthorURI'];

        echo __( "<b>Name </b>: " . $wmso_plugin_name . "<br/>" );
        echo __( "<b>Version</b> : " . $wmso_plugin_version . "<br/>" );
        echo __( "<b>Website </b>: " . $wmso_plugin_uri . "<br/>" );
        echo __( "<b>Description </b>: " . $wmso_plugin_description . "<br/>" );
        echo __( "<b>Author </b>: " . $wmso_plugin_author . "<br/>" );
        echo __( "<b>Author URI </b>: " . $wmso_plugin_authoruri . "<br/>" );

?>
			</p>
		</div>
	</div>
</div>
<?php
    }

    #Include utilities end
    

    
} #admin area end
include (plugin_dir_path(__FILE__) . 'public/execute.php');

if (isset($wmso_optionsopt["wmso_wikimint_optimize_min_source"]))
{
    $wmso_optionsval4 = $wmso_optionsopt["wmso_wikimint_optimize_min_source"];

    if ($wmso_optionsval4 == "true")
    {
        include (plugin_dir_path(__FILE__) . 'public/minpublic.php');

    }
}

if (isset($wmso_optionsmaint["wmso_wikimint_maint_under_const"]))
{
    if ($wmso_optionsmaint["wmso_wikimint_maint_under_const"] == "true")
    {
	
        function wmso_wikimint_maintenance_mode()
        {
            if (!current_user_can('edit_themes') || !is_user_logged_in())
            {
				$wmso_optionsmaint = get_option( 'wmso_wikimint_maint_settings' ); 
						    if (isset($wmso_optionsmaint["wmso_wikimint_maint_thm"]))
    {
        $wmso_thm = $wmso_optionsmaint["wmso_wikimint_maint_thm"];

    }
    else
    {
        $wmso_thm = "1";
    }
				
                die(include (plugin_dir_path(__FILE__) . 'public/mpages/mpage' . $wmso_thm . '.php'));
            }
        }
        add_action('get_header', 'wmso_wikimint_maintenance_mode');
    }
}


?>
