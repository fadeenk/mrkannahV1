<?php  
//create_cat.php  
include 'connect.php';  
include 'head.php';
echo "<h3>Search</h3><br />";    
?>
<div id="result">
<ul>
<?php          
if($_POST['search2'])  
    {
	$cat = $_POST['cat'];
	$term = $_POST['term'];
	$type = $_POST['type'];
	$order = $_POST['order'];
	$sql = "SELECT * FROM books WHERE books_available = '1' AND $cat like '%$term%' ORDER BY $type $order";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo '<li>Something went wrong while searching. Please try again later.</li>'; 
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
					echo '<br/><a href="books.php?id='.$row['book_id'].'">more details</a></li>';
					}
			}
    } 
    else
    {
		echo '<div id="form"><form method="post" action="">
		Search: <input type="text" name="term" />';
		echo '<select name="cat">
				<option value="books_title">Title</option>
				<option value="books_pub">Publisher</option>
				<option value="books_ISBN_10">ISBN 10</option>
				<option value="books_ISBN_13">ISBN 13</option>
				<option value="books_course">Course</option>
				</select><br />';
		echo 'Sort by: <select name="type">
				<option value="books_price">Price</option>
				<option value="books_title">Title</option>
				<option value="book_id">Date</option>
			  </select>';
		echo '<select name="order">
				<option value="">Ascending</option>
				<option value="DESC">Descending</option>
			  </select><br /><br />';
		echo '<center><input type="submit" value="Search" name="search2"/><center>
         	</form></div>'; 
	}
?>
</ul></div>
<?php
include 'foot.php';  
?>