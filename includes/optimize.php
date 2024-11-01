<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function wmso_wikimint_optimize_settings_init()
{
    register_setting( 'wikimint-optimize-setting', 'wmso_wikimint_optimize_settings');
    add_settings_section('wikimint-optimize-plugin-section', __('Site optimization Options', 'wikimint-optimize-plugin') , 'wmso_wikimint_optimize_settings_section_callback', 'wikimint-optimize-setting');
    add_settings_field('wmso_wikimint_optimize_min_source', __('Minify source code : ', 'wikimint-optimize-plugin') , 'wmso_wikimint_optimize_min_source', 'wikimint-optimize-setting', 'wikimint-optimize-plugin-section');
    add_settings_field('wmso_wikimint_optimize_rem_rsd', __('Remove RSD links : ', 'wikimint-optimize-plugin') , 'wmso_wikimint_optimize_rem_rsd', 'wikimint-optimize-setting', 'wikimint-optimize-plugin-section');
    add_settings_field('wmso_wikimint_optimize_rem_wlw', __('Remove WLW Manifest link : ', 'wikimint-optimize-plugin') , 'wmso_wikimint_optimize_rem_wlw', 'wikimint-optimize-setting', 'wikimint-optimize-plugin-section');
    add_settings_field('wmso_wikimint_optimize_dis_emo', __('Disable Emoticons : ', 'wikimint-optimize-plugin') , 'wmso_wikimint_optimize_dis_emo', 'wikimint-optimize-setting', 'wikimint-optimize-plugin-section');
    add_settings_field('wmso_wikimint_optimize_rem_srtlnk', __('Remove Shortlink : ', 'wikimint-optimize-plugin') , 'wmso_wikimint_optimize_rem_srtlnk', 'wikimint-optimize-setting', 'wikimint-optimize-plugin-section');
}

add_action('admin_init', 'wmso_wikimint_optimize_settings_init');

function wmso_wikimint_optimize_settings_section_callback()
{
    echo __('<p>Manage your site optimization options here.</p><hr/>', 'wikimint-optimize-plugin');
}

function wmso_wikimint_optimize_min_source()
{
    $wmso_options = get_option('wmso_wikimint_optimize_settings');
    if (isset($wmso_options["wmso_wikimint_optimize_min_source"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
	
		 <label class="switch">
	<input type="checkbox" name="wmso_wikimint_optimize_settings[wmso_wikimint_optimize_min_source]" value="true" <?php echo __( $wmso_checked ); ?> />
  <span class="slider"></span>
</label>

	<?php
}

function wmso_wikimint_optimize_rem_rsd()
{
    $wmso_options = get_option('wmso_wikimint_optimize_settings');
    if (isset($wmso_options["wmso_wikimint_optimize_rem_rsd"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
	
		 <label class="switch">
	<input type="checkbox" name="wmso_wikimint_optimize_settings[wmso_wikimint_optimize_rem_rsd]" value="true" <?php echo __( $wmso_checked ); ?> />
  <span class="slider"></span>
</label>

<p>
<b>Note </b>: RSD (Really Simple Discovery) links are not required if you don't want to use XML-RPC client, pingback, etc. You can remove this unnecessary header checking this option.


</p>
	<?php
}

function wmso_wikimint_optimize_rem_wlw()
{
    $wmso_options = get_option('wmso_wikimint_optimize_settings');
    if (isset($wmso_options["wmso_wikimint_optimize_rem_wlw"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
	
		 <label class="switch">
	<input type="checkbox" name="wmso_wikimint_optimize_settings[wmso_wikimint_optimize_rem_wlw]" value="true" <?php echo __( $wmso_checked ); ?> />
  <span class="slider"></span>
</label>

<p>
<b>Note </b>: WLW Manifest link is not required, if you are not using tagging support with Windows Live Writer. You can remove it by checking this option.


</p>
	<?php
}

function wmso_wikimint_optimize_dis_emo()
{
    $wmso_options = get_option('wmso_wikimint_optimize_settings');
    if (isset($wmso_options["wmso_wikimint_optimize_dis_emo"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
	
		 <label class="switch">
	<input type="checkbox" name="wmso_wikimint_optimize_settings[wmso_wikimint_optimize_dis_emo]" value="true" <?php echo __( $wmso_checked ); ?> />
  <span class="slider"></span>
</label>

<p>
<b>Note </b>: If you not required, you can remove this extra coded emoticons by checking this option.


</p>
	<?php
}

function wmso_wikimint_optimize_rem_srtlnk()
{
    $wmso_options = get_option('wmso_wikimint_optimize_settings');
    if (isset($wmso_options["wmso_wikimint_optimize_rem_srtlnk"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
	
		 <label class="switch">
	<input type="checkbox" name="wmso_wikimint_optimize_settings[wmso_wikimint_optimize_rem_srtlnk]" value="true" <?php echo __( $wmso_checked ); ?> />
  <span class="slider"></span>
</label>

<p>
<b>Note </b>: Every page and post in your site has shortlink with rel attribution in the site header. If you don't want this, you can remove this by checking this option.


</p>
	<?php
}

?>
