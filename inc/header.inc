<div id="templatemo_top">
  <!--
	<div id="language"><a href="index.php" title="English"><img src="images/english.jpg" alt="English"/></a><a href="arabic/index.html" title="Arabic"><img src="images/arabic.jpg" /></a></div>
--></div>

<div id="templatemo_header">
  <div id="site_title">
    <h1><a href="index.php"></a></h1>
  </div>
  <?php
		$currentPage = $_SERVER["PHP_SELF"]; //gets file name
		$currentPage = str_replace("/",'href="',$currentPage).'"'; //removes the extra stuff
		$final = str_replace($currentPage, $currentPage.' class="marked"',$currentPage); //add marked
		$menu = file_get_contents('inc/menu.inc'); //fetch menu
		$menu = str_replace($currentPage,$final,$menu); //update menu
		echo($menu);
		?>
</div>
