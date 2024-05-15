<?php  
//create_cat.php  
include 'connect.php';  
include 'head.php';  
  
echo "<h3>Add Your Book</h3><br />";  
if($_SESSION['signed_in'] == false)  
{  
    //the user is not signed in  
    echo 'Sorry, you have to be <a href="signin.php">signed in</a> to add a book.';  
}  
else
{
	if($_POST['add'])
	{
		$title = mysql_real_escape_string($_POST['title']);
		$type =  mysql_real_escape_string($_POST['type']);
		$condition =  mysql_real_escape_string($_POST['condition']);
		$price =  mysql_real_escape_string($_POST['price']);
		$publisher =  mysql_real_escape_string($_POST['publisher']);
		$ISBN10 =  mysql_real_escape_string($_POST['ISBN_10']);
		$ISBN13 =  mysql_real_escape_string($_POST['ISBN_13']);
		$course =  mysql_real_escape_string($_POST['course']);
		$cover = mysql_real_escape_string($_POST['cover']);
		$image1 = mysql_real_escape_string($_POST['image1']);
		$image2 = mysql_real_escape_string($_POST['image2']);
		$image3 = mysql_real_escape_string($_POST['image3']);
		$image4 = mysql_real_escape_string($_POST['image4']);
		$user_id = $_SESSION['user_id'];
		
            $sql = "INSERT INTO `books` VALUES('', '$title', NOW(), '$type', '$condition', '$price', '$publisher', '$ISBN10', '$ISBN13', '$course', '1', '$cover', '$image1', '$image2', '$image3', '$image4', '$user_id')"; 
                      
            $result = mysql_query($sql); 
            if(!$result) 
            { 
                //something went wrong, display the error 
                echo 'An error occured while inserting your data. Please try again later.'; 
                $sql2 = "ROLLBACK;"; 
                $result = mysql_query($sql2); 
            }
			else
			{ 
				echo 'You have successfully Added your book. Click <a href="mybooks.php">here</a> to see all of your books.'; 
			
			}
	}
	else
	{
		 //admin stuff --> if($_SESSION['user_level'] == 1)  
                echo '<div id="form"><form id="add" method="post" action=""> 
                    Title <req>*</req> : <input type="text" name="title" /><br />'; 
                echo 'Type <req>*</req> :<select name="type">
                	<option value="Hardcover">Hardcover</option>
					<option value="Paper cover">Paper cover</option>
					<option value="Not Bound">Not Bound</option>   
					<option value="Not Bound w/ binder">Not Bound w/ binder</option> 
                	</select>';
                echo '<br />Condition <req>*</req> : <select name="condition">
				<option value="New">New</option>
				<option value="Used - Like new">Used - Like new</option>
				<option value="Used - Very good">Used - Very good</option>
				<option value="Used - Good">Used - Good</option>
				<option value="Used - Acceptable">Used - Acceptable</option></select>';      
                echo '<br />Price <req>*</req> : $<input type="text" name="price" onkeypress="validate(event)" maxlength="6"/>';
				echo '<br />publisher <req>*</req> : <input type="text" name="publisher" />';
				echo '<br />ISBN-10: <input type="text" id="not" name="ISBN_10" onkeypress="validate(event)" maxlength="10"/>';
				echo '<br />ISBN-13: <input type="text" id="not" name="ISBN_13" onkeypress="validate(event)" maxlength="13"/>';
                echo '<br />Course <req>*</req> : <input type="text" name="course" /> Must be the same as the one on WebPortal (easier for people to find)';
                echo '<br />Cover image <req>*</req> : <input type="text" name="cover" />';
                echo '<!-- br />Extra Image 1: <input type="text" id="not" name="image1" />';
                echo '<br />Extra Image 2: <input type="text" id="not" name="image2" />';
                echo '<br />Extra Image 3: <input type="text" id="not" name="image3" />';
                echo '<br />Extra Image 4: <input type="text" id="not" name="image4" / -->';
				echo '<br /><req>*</req> = Required Field.';
                echo '<br /><br /><center><input type="submit" id="not" name="add" value="Add the book" /></center>
                 </form></div>';  
	}
}
include 'foot.php';  
?>