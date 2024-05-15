<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fadee Kannah - Graphics Samples</title>
<?php include("inc/meta.inc"); ?>
<?php include("inc/styles.inc"); ?>
<?php include("inc/scripts.inc"); ?>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
			var flashvars = {};
			flashvars.xml_file = "list.xml";
			var params = {};
			params.allowfullscreen = true;
			var attributes = {};
			attributes.id = "gallery";
			attributes.name = "gallery";
			swfobject.embedSWF("gallery.swf", "gallery", "920", "600", "9.0.0", false, flashvars, params, attributes);
</script>
</head>
<body>
<div id="templatemo_wrapper">
<?php include("inc/header.inc"); ?>
    <div id="templatemo_main_wrapper"> <span class="top"></span><span class="bottom"></span>
    	<div id="templatemo_main">
        <h2>Graphics Samples</h2>

			<div id="gallery">
            	<br /><br />
                <a href="http://www.adobe.com/go/getflashplayer">
                    <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
                </a>
			</div><br />

        	<div class="cleaner h10"></div>
        </div> <!-- end of main -->
    </div> <!-- end of main wrapper -->
</div>
<?php include("inc/footer.inc"); ?>
</body>
</html>