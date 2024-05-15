<?php session_start(); 
	if(isset($_POST['search']))   
    {
		$keyword = $_POST['term'];
		header("Location: search.php?keyword=$keyword");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
    <meta name="description" content="A short description." />  
    <meta name="keywords" content="put, keywords, here" />  
    <title>Project X</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="menu.css" type="text/css" >
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="js/NumberLock.js" type="text/javascript"></script>
<script src="js/BookUpdate.js" type="text/javascript"></script>
<script src="js/canvas.js" type="text/javascript"></script>
</head>  
<body><canvas id="canvas"></canvas>
    <div id="wrapper">
    <div id="top"><img src="images/newbg.png" />
    <div id="login">
<?php
	if($_SESSION['signed_in'])  
    {  
		if(isset($_POST['signout']))  
		{
			session_unset();
			session_destroy();
			echo'<form action="" method="post">
              	<input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
              	<input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
              	<input type="submit" name="signin" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
            	</form>';
		}
		else
		{
			echo '<p>Welcome, ' . $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] . '. Not you?</p>' . '<form action="" method="post">
            <input type="submit" name="signout" value="Sign Out" alt="Sign Out" id="searchbutton" title="Signout" class="sub_btn"  />
            </form>';

		}
    }
	else
	{
	if(isset($_POST['signin']))   
    {
            $sql = "SELECT  
                        user_id, 
                        user_name,
						user_fname,
						user_lname, 
                        user_level,
						user_email 
                    FROM 
                        users 
                    WHERE 
                        user_name = '" . mysql_real_escape_string($_POST['user_name']) . "' 
                    AND 
                        user_pass = '" . sha1($_POST['user_pass']) . "'";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while signing in. Please try again later.'; 
                //echo mysql_error(); //debugging purposes, uncomment when needed 
            } 
            else 
            { 
                //the query was successfully executed, there are 2 possibilities 
                //1. the query returned data, the user can be signed in 
                //2. the query returned an empty result set, the credentials were wrong 
                if(mysql_num_rows($result) == 0) 
                { 
                    echo '<p>You have supplied a wrong user/password combination.</p><form action="" method="post">
            		<input type="submit" name="tryagain" value="Try Again" alt="Try Again" id="searchbutton" title="Try Again" class="sub_btn"  />
		            </form>';
					if(isset($_POST['tryagain']))
					{
						echo'<form action="" method="post">
              			<input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
            		  	<input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
             		 	<input type="submit" name="signin" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
            			</form>';
					}
                } 
                else 
                { 
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages 
                    while($row = mysql_fetch_assoc($result)) 
                    { 
                        $_SESSION['user_id']     = $row['user_id']; 
                        $_SESSION['user_name']   = $row['user_name'];
						$_SESSION['user_fname']  = $row['user_fname'];
						$_SESSION['user_lname']  = $row['user_lname']; 
                        $_SESSION['user_level']  = $row['user_level'];
						$_SESSION['user_email']  = $row['user_email'];
						$_SESSION['signed_in']   = true; 
                    } 
                     
                    echo '<p>Welcome, ' . $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] . '. Not you?</p>' . '<form action="" method="post">
            		<input type="submit" name="signout" value="Sign Out" alt="Sign Out" id="searchbutton" title="Signout" class="sub_btn"  />
		            </form>';
 
                } 
            } 
        } 
	else
	{
			echo'<form action="" method="post">
              	<input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
              	<input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
              	<input type="submit" name="signin" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
            	</form>';
	}
}
?>
    </div> <!-- login -->
    </div> <!-- end of top -->
    
    <div id="header">
    	<div id="site_title"><h1><a href="http://www.mrkannah.com">mrkannah</a></h1></div>
		<div id="search"><form action="" method="post">
		<input type="text" name="term" placeholder="Search keywords or ISBN#" alt="Search keywords or ISBN#" class="txt_field2"/>
		<input type="submit" value="" name="search" alt="Search" class="sub_btn2"/>  
        </form></div>
    </div>
    
<div id="menu">
<ul class="level1">
<?php		
        
    $menu = '<li><a href="index.php">Home</a></li><li><a href="adsearch.php">Search</a></li><li><a href="add_book.php">Add your Book</a></li>';
 
    if($_SESSION['signed_in'])  
    {  
        $menu .= '<li><a href="mybooks.php">My Books</a></li>';  
    }  
	else  
    {  
		$menu .= '<li><a href="register.php">Register</a></li>';
    }
	
	$menu .= '<li><a>About Us</a>
				<ul>
            		<li><a href="contact.php"><span>Contact Us</span></a></li>
   					<li><a href="supporters.php"><span>Supporters</span></a></li>
	  				<li><a href="donaters.php"><span>Donaters</span></a></li>
  					<li><a href="statement.pbp"><span>Our Statement</span></a></li>
        	    </ul>
			 </li>';
	$menu .= '<li><a></a></li>';
	
	$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
                === FALSE ? 'http' : 'https';
	$host     = $_SERVER['HTTP_HOST'];
	$script   = $_SERVER['SCRIPT_NAME'];
	$script = substr( $script, 1 );
	$currentPage = 'href="'. $script. '"';
	$final = str_replace($currentPage, 'class="selected" ' . $currentPage , $menu);
	echo $final;

?>
		
</ul>          
</div>
    <div id="content">
    	<div id="innercontent">
        <!-- results area-->