<?php
$id=$_GET["q"];

include 'connect.php';  

$sql="SELECT * FROM books WHERE book_id = '".$id."'";

$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)){
	if($row['books_available'] == '1'){
	$sql = "UPDATE books SET books_available = '0' where book_id=".$id;
	mysql_query($sql);
	}
	else{
	$sql = "UPDATE books SET books_available = '1' where book_id=".$id;
	mysql_query($sql);
	}
}
?>
