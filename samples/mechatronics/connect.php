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
    <link rel="stylesheet" href="connect.css" type="text/css">
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
		echo '<div id="result"><ul>';
		$i = 0;
		while ($row = mysql_fetch_array($result)){
			//echo '<br/> Experince: '.$row['Experince'];
			echo '<li>
			<div class="button-checkbox">
				<input type="checkbox" value="None" id="button-checkbox'.$i.'" name="check" onclick="update('.$row['id'].',4)"';
			if($row['Meeting_4'] == '1'){
				echo 'checked="checked"';
			}
			echo '/>
				<label class="button button-primary" for="button-checkbox'.$i.'"></label>
				<div class="checkbox"></div>
			</div>';
			echo '<p>'.$row['Name'].'</p></li>';
			$i++;
		}
		echo '</ul></div>';
		echo 'New? Click <a href="reg.php">here</a> to register.';
	}
?>
</body></html>