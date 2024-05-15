<?php  
//create_cat.php  
include 'connect.php';  
include 'head.php';
if($_SESSION['signed_in'] == false)  
{  
    //the user is not signed in  
    echo 'Sorry, you have to be <a href="signin.php">signed in</a> to access your books.';  
}  
else
{
echo "<h3>My Books</h3><br />";  
	echo '<div id="result"><ul id="books">';
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM books WHERE books_by = '$id' ORDER BY book_id DESC";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while searching. Please try again later.'; 
                //echo mysql_error(); //debugging purposes, uncomment when needed 
            } 
            else 
			{
				while ($row = mysql_fetch_array($result)){
					echo '<li><img src="'.$row['books_cover'].'" />';
					echo 'Title: '.$row['books_title'];
					echo '<br/> Type: '.$row['books_type'];
					echo '<br/> Condition: '.$row['books_con'];
					echo '<br/> Price: $'.$row['books_price'];
					echo '<br/> Publisher: '.$row['books_pub'];
					echo '<br/> Course: '.$row['books_course'];
					echo '<br/><br/>';
					if($_SESSION['signed_in'] == false)  
					{  
				    	echo '<div id="owner">Sorry, you have to be <a href="signin.php">signed in</a> to contact owner.</div>';  
					}
					elseif($row['books_by'] == $_SESSION['user_id']){
						echo '<div class="checkbox"><input type="checkbox" name="check" value="0" onclick="bookupdate('.$row['book_id'].')"';
						if($row['books_available'] == '0'){
							echo 'checked="checked"';
						}
						echo '><label data-on="Sold" data-off="Available"></label></div><div style="clear:right;"></div>';
					}
					else
					{
						echo '<br/><br/><a href="contact.php?id='.$row['books_by'].'&book='.$row['book_id'].'">Contact Owner</a>';
					}
					echo '<br/><a href="books.php?id='.$row['book_id'].'">more details</a></li>';
					}
			}
}
?>
</ul></div>
<?php
include 'foot.php';  
?>