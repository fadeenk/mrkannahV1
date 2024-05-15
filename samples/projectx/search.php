<?php  
//create_cat.php  
include 'connect.php';  
include 'head.php';  
$keyword = $_GET['keyword'];
$keyword = str_replace('%20', ' ', $keyword);
?>
<div id="result">
<ul>
<?php
	$sql = "SELECT * 
			FROM books 
			WHERE books_available = '1' AND ( books_course like '%$keyword%' OR books_title like '%$keyword%')";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while searching. Please try again later.'; 
                echo mysql_error(); //debugging purposes, uncomment when needed 
            } 
            else 
			{
				if(mysql_num_rows($result) == 0) 
                { 
                    echo 'No results found please try a different keyword. Or use our <a href="adsearch.php">advanced search engine</a>.'; 
                } 
				else
				{
				while ($row = mysql_fetch_array($result)){
					echo '<li><img src="'.$row['books_cover'].'" />';
					echo 'Title: '.$row['books_title'];
					echo '<br/> Type: '.$row['books_type'];
					echo '<br/> Condition: '.$row['books_con'];
					echo '<br/> Price: '.$row['books_price'];
					echo '<br/> Publisher: '.$row['books_pub'];
					echo '<br/> Course: '.$row['books_course'];
					echo '<br/><br/>';
					if($_SESSION['signed_in'] == false)  
					{  
				    	echo '<div id="owner">Sorry, you have to be <a href="signin.php">signed in</a> to contact owner.</div>';  
					}
					elseif($row['books_by'] == $_SESSION['user_id']){
						echo '<div class="checkbox"><input type="checkbox"><label data-on="Sold" data-off="Available"></label></div><div style="clear:right;"></div>';
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