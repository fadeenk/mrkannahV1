<?php
$id=$_GET["id"];
$num=$_GET["meeting"];
$meeting = 'Meeting_'.$num;
if($meeting == "Meeting_0"){
	$meeting = "Fee_Paid";
}

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

$sql="SELECT * FROM data WHERE id = '".$id."'";

echo $sql;
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)){
	if($row[$meeting] == '1'){
	$sql = "UPDATE data SET ".$meeting." = '0' where id=".$id;
	mysql_query($sql);
	}
	else{
	$sql = "UPDATE data SET ".$meeting." = '1' where id=".$id;
	mysql_query($sql);
	}
}
?>
