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
	<style>
body, html {
  height: 100% ! important;
  width:100% ! important;
  padding:0px ! important;
  margin:0px ! important;
  min-width:100%;
  max-width: 100%;
  overflow-x:hidden;
  overflow-y:hidden;
  border:none;
}

.bgimg {
  background : #f2f2f2;
  height: 100%;
  width:100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: inherit;
  border:none;
  text-shadow : 0px 0px 10px #000;
}



.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  max-width: 600px;
}
h1 {
	border-bottom: 0px ! important;
	font-size:40px ! important;
color: #fff ! important;}
.desc {
	font-size: inherit ! important;
	padding: 25px 15px;
	margin-top: 30px;
    background: rgba(0, 0, 0, .5);
    border-radius: 10px;
}

hr {
  margin: auto;
  max-width: 300px ! important;
  border: 1px solid #fff;
  text-shadow: 0px 0px 5px #000;
}
</style>
	<body>
		<div class="bgimg">
			<div class="middle">
				<h1><?php echo __( $wmso_mainttitle ); ?>
				</h1>
				<hr>
					<div class="desc"><?php echo __( $wmso_maintdesc ); ?>
					</div>
				</div>
			</div>
		</body>
	</html>
