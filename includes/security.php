<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function wmso_wikimint_security_settings_init()
{
    register_setting( 'wikimint-security-setting',  'wmso_wikimint_security_settings');
    add_settings_section('wikimint-security-plugin-section', __('Site Security Options', 'wikimint-security-plugin') , 'wmso_wikimint_security_settings_section_callback', 'wikimint-security-setting');
    add_settings_field('wmso_wikimint_hide_ver_meta', __('Hide version number in meta data : ', 'wikimint-security-plugin') , 'wmso_wikimint_hide_ver_meta', 'wikimint-security-setting', 'wikimint-security-plugin-section');
    add_settings_field('wmso_wikimint_hide_ver_url', __('Hide version number in source URL : ', 'wikimint-security-plugin') , 'wmso_wikimint_hide_ver_url', 'wikimint-security-setting', 'wikimint-security-plugin-section');
    add_settings_field('wmso_wikimint_remove_mal_url_req', __('Reject malicious URL requests : ', 'wikimint-security-plugin') , 'wmso_wikimint_remove_mal_url_req', 'wikimint-security-setting', 'wikimint-security-plugin-section');
    add_settings_field('wmso_wikimint_security_rem_xrpc', __('Disable XML-RPC : ', 'wikimint-security-plugin') , 'wmso_wikimint_security_rem_xrpc', 'wikimint-security-setting', 'wikimint-security-plugin-section');

}

add_action('admin_init', 'wmso_wikimint_security_settings_init');

function wmso_wikimint_security_settings_section_callback()
{
    echo __('<p>Manage your site security options here.</p><hr/>', 'wikimint-security-plugin');
}

function wmso_wikimint_hide_ver_meta()
{
    $wmso_options = get_option('wmso_wikimint_security_settings');
    if (isset($wmso_options["wmso_wikimint_hide_ver_meta"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
<label class="switch">
	<input type="checkbox" name="wmso_wikimint_security_settings[wmso_wikimint_hide_ver_meta]" value="true"<?php echo __( $wmso_checked ); ?> />
  <span class="slider"/>
</label>
	
	<?php
}

function wmso_wikimint_hide_ver_url()
{
    $wmso_options = get_option('wmso_wikimint_security_settings');
    if (isset($wmso_options["wmso_wikimint_hide_ver_url"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
<label class="switch">
	<input type="checkbox" name="wmso_wikimint_security_settings[wmso_wikimint_hide_ver_url]" value="true"<?php echo __( $wmso_checked ); ?> />

  <span class="slider"/>
</label>

	<?php
}

function wmso_wikimint_remove_mal_url_req()
{
    $wmso_options = get_option('wmso_wikimint_security_settings');
    if (isset($wmso_options["wmso_wikimint_remove_mal_url_req"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
<label class="switch">
	<input type="checkbox" name="wmso_wikimint_security_settings[wmso_wikimint_remove_mal_url_req]" value="true"<?php echo __( $wmso_checked ); ?> />

  <span class="slider"/>
</label>
	
	<?php
}

function wmso_wikimint_security_rem_xrpc()
{
    $wmso_options = get_option('wmso_wikimint_security_settings');
    if (isset($wmso_options["wmso_wikimint_security_rem_xrpc"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
<label class="switch">
	<input type="checkbox" name="wmso_wikimint_security_settings[wmso_wikimint_security_rem_xrpc]" value="true"<?php echo __( $wmso_checked ); ?> />
  <span class="slider"/>
</label>
<p>
	<b>Note </b>: Having XML-RPC enabled may lead to DDoS and brute force attack. You may disable XML-RPC by checking this option.


</p>
	<?php
}

?>
