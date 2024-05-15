<?php  
$server = 'mysql10.000webhost.com';  
$username   = 'a8720456_admin';  
$password   = 'Austin1';  
$database   = 'a8720456_members';  

if(!mysql_connect($server, $username,  $password))  
{  
    exit('Error: could not establish database connection');  
}  
if(!mysql_select_db($database)){  
    exit('Error: could not select the database');  
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
    <meta name="description" content="A short description." />  
    <meta name="keywords" content="put, keywords, here" />  
    <title>test</title>
    <!--link rel="stylesheet" href="style.css" type="text/css"-->
	<script src="js/update.js" type="text/javascript"></script>
</head>
<body>
<?php
	$sql = "SELECT * FROM data ORDER BY Name";
	$result = mysql_query($sql);  
	if(!$result)  
	{  
		echo 'Something went wrong while searching. Please try again later.'; 
		//echo mysql_error(); //debugging purposes, uncomment when needed 
	} 
	else 
	{
		echo '<ul>';
		while ($row = mysql_fetch_array($result)){
			echo '<li>'.$row['Name'];
			//echo '<br/> Experince: '.$row['Experince'];
			echo '<div class="checkbox" style="float:left;"><input type="checkbox" name="check" value="0" onclick="update('.$row['id'].',0)"';
			if($row['Fee_Paid'] == '1'){
				echo 'checked="checked"';
			}
			echo '><label data-on="Sold" data-off="Available"></label></div><div style="clear:right;"></div>';
			echo '</li>';
		}
		echo '</ul>';
	}
?>
</body></html>