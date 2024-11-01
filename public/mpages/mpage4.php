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
			<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
			<title><?php echo __( $wmso_mainttitle ); ?>
			</title>
			<style type="text/css">
html { width: 100%; height: 100%; }
body { text-align: center; margin: 0px; padding: 0px; height: 100%; color: #fff;font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
background-size: 400% 400%;
-webkit-animation: Gradient 15s ease infinite;
-moz-animation: Gradient 15s ease infinite;
animation: Gradient 15s ease infinite;}
.vh { height: 100%; align-items: center; display: flex; }
.vh > div { width: 100%; text-align: center; vertical-align: middle; }
img { max-width: 100%; }
.wrap {text-align: center;}
.wrap h1 {font-size: 30px;font-weight: 700;margin: 0 0 30px;}
.wrap h2 {font-size: 24px;font-weight: 400;line-height: 1.6;margin: 0 0 80px;}
@-webkit-keyframes Gradient {
0% {background-position: 0% 50%}
50% {background-position: 100% 50%}
100% {background-position: 0% 50%}
}
@-moz-keyframes Gradient {
0% {background-position: 0% 50%}
50% {background-position: 100% 50%}
100% {background-position: 0% 50%}
}
@keyframes Gradient {
0% {background-position: 0% 50%}
50% {background-position: 100% 50%}
100% {background-position: 0% 50%}
}
    </style>
		</head>
		<body>
			<div class="vh">
				<div>
					<div class="wrap" style="max-width:800px;margin-left:auto;margin-right:auto;padding:20px;">
						<h1><?php echo __( $wmso_mainttitle ); ?>
						</h1>
						<hr/>
						<p><?php echo __( $wmso_maintdesc ); ?>
						</p>
					</div>
				</div>
			</div>
		</body>
	</html>