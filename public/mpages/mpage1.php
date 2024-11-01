<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$wmso_maintdetails = get_option('wmso_wikimint_maint_settings');
if (isset($wmso_maintdetails["wmso_wikimint_maint_title"]))
{

    if ($wmso_maintdetails["wmso_wikimint_maint_title"] == "")
    {
        $wmso_mainttitle = "COMING SOON";
    }
    else
    {
        $wmso_mainttitle = $wmso_maintdetails["wmso_wikimint_maint_title"];
    }
}
else
{
    $wmso_mainttitle = "COMING SOON";
}

if (isset($wmso_maintdetails["wmso_wikimint_maint_desc"]))
{
    if ($wmso_maintdetails["wmso_wikimint_maint_desc"] == "")
    {
        $wmso_maintdesc = "Sorry, the site is under maintenace right now. We'll be back soon.";
    }
    else
    {
        $wmso_maintdesc = $wmso_maintdetails["wmso_wikimint_maint_desc"];
    }
}
else
{
    $wmso_maintdesc = "Sorry, the site is under maintenace right now. We'll be back soon.";
}
?>





<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
				<title><?php echo __( $wmso_mainttitle ); ?>
				</title>
				<style type="text/css">
      body { text-align: center; padding: 150px; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;}
      h1 { font-size: 40px; }
      body { font-size: 20px; color: #333; }
      #article { display: block; text-align: left; width: 650px; margin: 0 auto; }
      a { color: #dc8100; text-decoration: none; }
      a:hover { color: #333; text-decoration: none; }
    </style>
			</head>
			<body>
				<div id="article">
					<div style="max-width:800px;margin-left:auto;margin-right:auto;padding:20px;">
						<h1><?php echo __( $wmso_mainttitle ); ?>
						</h1>
						<hr/>
						<p><?php echo __( $wmso_maintdesc ); ?>
						</p>
					</div>
				</div>
			</body>
		</html>