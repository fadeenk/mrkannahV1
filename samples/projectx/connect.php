<?php  
$server = 'localhost';  
$username   = 'fadee_admin';  
$password   = '5558100';  
$database   = 'fadee_projectx';  
  
if(!mysql_connect($server, $username,  $password))  
{  
    exit('Error: could not establish database connection');  
}  
if(!mysql_select_db($database)){  
    exit('Error: could not select the database');  
}  
?>