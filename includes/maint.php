<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function wmso_wikimint_maint_settings_init()
{
    register_setting( 'wikimint-maint-setting', 'wmso_wikimint_maint_settings');
    add_settings_section('wikimint-maint-plugin-section', __('Site Maintenance Options', 'wikimint-maint-plugin') , 'wmso_wikimint_maint_settings_section_callback', 'wikimint-maint-setting');
    add_settings_field('wmso_wikimint_maint_under_const', __('Enable under maintenance mode : ', 'wikimint-maint-plugin') , 'wmso_wikimint_maint_under_const', 'wikimint-maint-setting', 'wikimint-maint-plugin-section');

    add_settings_field('wmso_wikimint_maint_title', __('Title : ', 'wikimint-maint-plugin') , 'wmso_wikimint_maint_title', 'wikimint-maint-setting', 'wikimint-maint-plugin-section');

    add_settings_field('wmso_wikimint_maint_desc', __('Description : ', 'wikimint-maint-plugin') , 'wmso_wikimint_maint_desc', 'wikimint-maint-setting', 'wikimint-maint-plugin-section');

    add_settings_field('wmso_wikimint_maint_thm', __('Select theme : ', 'wikimint-maint-plugin') , 'wmso_wikimint_maint_thm', 'wikimint-maint-setting', 'wikimint-maint-plugin-section');

}

add_action('admin_init', 'wmso_wikimint_maint_settings_init');

function wmso_wikimint_maint_settings_section_callback()
{
    echo __('<p>Manage your site under cunstruction mode options here.</p><hr/>', 'wikimint-maint-plugin');
}

function wmso_wikimint_maint_under_const()
{
    $wmso_options = get_option('wmso_wikimint_maint_settings');
    if (isset($wmso_options["wmso_wikimint_maint_under_const"]))
    {
        $wmso_checked = "checked=\"checked\"";
    }
    else
    {
        $wmso_checked = "";
    }
?>
<label class="switch">
	<input type="checkbox" name="wmso_wikimint_maint_settings[wmso_wikimint_maint_under_const]" value="true"<?php echo __( $wmso_checked ); ?> />
  <span class="slider"/>
</label>

	<?php
}

function wmso_wikimint_maint_title()
{
    $wmso_options = get_option('wmso_wikimint_maint_settings');
    if (isset($wmso_options["wmso_wikimint_maint_title"]))
    {
        $wmso_title = $wmso_options["wmso_wikimint_maint_title"];
    }
    else
    {
        $wmso_title = "COMING SOON";
    }
?>
<input type="text" name="wmso_wikimint_maint_settings[wmso_wikimint_maint_title]" value="<?php echo __( $wmso_title ); ?>"/>
	<?php
}

function wmso_wikimint_maint_desc()
{
    $wmso_options = get_option('wmso_wikimint_maint_settings');
    if (isset($wmso_options["wmso_wikimint_maint_desc"]))
    {
        $wmso_desc = $wmso_options["wmso_wikimint_maint_desc"];
    }
    else
    {
        $wmso_desc = "Sorry, the site is under maintenace right now. We'll be back soon.";
    }
?>
<textarea rows="5" name="wmso_wikimint_maint_settings[wikimint_maint_desc]"><?php echo __( $wmso_desc ); ?>
</textarea>
<p>
	<b> Note </b>: HTML tags are allowed in the above title and description. 
	</p>
	<?php
}


function wmso_wikimint_maint_thm()
{
    $wmso_options = get_option('wmso_wikimint_maint_settings');
    if (isset($wmso_options["wmso_wikimint_maint_thm"]))
    {
        $wmso_thm = $wmso_options["wmso_wikimint_maint_thm"];
    }
    else
    {
        $wmso_thm = "1";
    }
	
	if ($wmso_thm == "1"){$wmso_checked_1 = "checked=\"checked\""; } else {$wmso_checked_1 = "";}
	if ($wmso_thm == "2"){$wmso_checked_2 = "checked=\"checked\""; } else {$wmso_checked_2 = "";}
	if ($wmso_thm == "3"){$wmso_checked_3 = "checked=\"checked\""; } else {$wmso_checked_3 = "";}
	if ($wmso_thm == "4"){$wmso_checked_4 = "checked=\"checked\""; } else {$wmso_checked_4 = "";}

?>
<label class="radio-inline">
	<input type="radio" name="wmso_wikimint_maint_settings[wmso_wikimint_maint_thm]" value="1"<?php echo __( $wmso_checked_1 ); ?> >Theme 1
    </label>
<label class="radio-inline">
	<input type="radio" name="wmso_wikimint_maint_settings[wmso_wikimint_maint_thm]" value="2"<?php echo __( $wmso_checked_2 ); ?> >Theme 2
    </label>
<label class="radio-inline">
	<input type="radio" name="wmso_wikimint_maint_settings[wmso_wikimint_maint_thm]" value="3"<?php echo __( $wmso_checked_3 ); ?> >Theme 3
    </label>
<label class="radio-inline">
	<input type="radio" name="wmso_wikimint_maint_settings[wmso_wikimint_maint_thm]" value="4"<?php echo __( $wmso_checked_4 ); ?> >Theme 4
    </label>
	
	<?php
}

?>
