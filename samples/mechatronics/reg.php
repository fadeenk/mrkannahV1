<?php
echo '<div id="form"><form id="reg" method="post" action=""><br />  
		Name: <req>*</req> <input type="text" name="name" /><br />
		E-mail: <req>*</req> <input type="email" name="email"><br />
		Red Id: <req>*</req> <input type="text" name="id" /><br />
        Experince <req>*</req> : <select name="exp">
				<option value="Advanced">Advanced</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Beginner">Beginner</option>
				<option value="Novice">Novice</option>
				</select><br />
		Include Starter Kit? <select name="kit">
				<option value="0">No</option>
				<option value="1">Yes</option> 
				</select><br />   
		<req>*</req> = Required Field.<br /><br />
        <center><input type="submit" name="reg" value="Register" /></center>
     </form></div>'; 
	 
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
if($_POST['reg'])  
	{
	$sql = "INSERT INTO 
				data(Name, Email, id, Experince, Want_Kit) 
			VALUES('" . mysql_real_escape_string($_POST['name']) . "',
			   '" . mysql_real_escape_string($_POST['email']) . "',
			   '" . mysql_real_escape_string($_POST['id']) . "',
			   '" . mysql_real_escape_string($_POST['exp']) . "', 
			   '" . mysql_real_escape_string($_POST['kit']) . "')";  
			$result = mysql_query($sql);  
	if(!$result)  
	{    
		echo 'Something went wrong while registering. Please try again later.'; 
		//echo mysql_error(); //debugging purposes, uncomment when needed 
	} 
	else 
	{ 
		echo 'Successfully registered. You can now <a href="connect.php">sign in</a>'; 
	} 
}
?>