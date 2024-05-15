<?php  
//create_cat.php  
include 'connect.php';  
include 'head.php';
echo "<h3>Book's Details</h3><br />";  
$id = $_GET['id'];
	$sql = "SELECT * FROM books WHERE book_id = $id";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while searching. Please try again later.'; 
                echo mysql_error(); //debugging purposes, uncomment when needed 
            } 
            else 
			{
			echo '<div id="result"><ul id="books">';
			if(mysql_num_rows($result) == 0) 
                { 
				echo 'Could not find any book with that id. Please use our search to find the book that you are looking for.';
				}
				else{
				while ($row = mysql_fetch_array($result)){
					echo '<li><img src="'.$row['books_cover'].'" />';
					echo 'Title: '.$row['books_title'];
					echo '<br/> Type: '.$row['books_type'];
					echo '<br/> Condition: '.$row['books_con'];
					echo '<br/> Price: $'.$row['books_price'];
					echo '<br/> Publisher: '.$row['books_pub'];
					echo '<br/> Course: '.$row['books_course'];
					echo '<br/> Time Added: '.$row['books_date'];
					echo '<br/> ISBN 10: '.$row['books_ISBN_10'];
					echo '<br/> ISBN 13: '.$row['books_ISBN_13'];
					echo '<br/><br/>';
					if($_SESSION['signed_in'] == false)  
					{  
				    	echo '<div id="owner">Sorry, you have to be <a href="signin.php">signed in</a> to contact owner.</div>';  
					}
					elseif($row['books_by'] == $_SESSION['user_id']){
						echo '<div class="checkbox"><input type="checkbox" name="check" value="0" disabled="disabled"';
						if($row['books_available'] == '0'){
							echo 'checked="checked"';
						}
						echo '><label data-on="Sold" data-off="Available"></label></div><div style="clear:right;"></div>';
					}
					else
					{
						echo '<br/><br/><a href="contact.php?id='.$row['books_by'].'&book='.$row['book_id'].'">Contact Owner</a>';
					}
					echo '</li>';
					}
			}
			}
?>
</ul></div>
<?php
include 'foot.php';  
?>