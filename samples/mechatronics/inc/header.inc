	<div id="templatemo_wrapper">
	
    <div id="templatmeo_header">
    	<div id="site_title"><h1><a href="index.phtml"></a></h1></div>

        <div class="cleaner"></div>
    </div> <!-- END of header -->
		<?php
		$currentPage = $_SERVER["PHP_SELF"]; //gets file name
		$currentPage = str_replace("/",'href="',$currentPage).'"'; //removes the extra stuff
		$final = str_replace($currentPage, $currentPage.' class="selected"',$currentPage); //add selected
		$menu = file_get_contents('inc/menu.inc'); //fetch menu
		$menu = str_replace($currentPage,$final,$menu); //update menu
		echo($menu);
		?>