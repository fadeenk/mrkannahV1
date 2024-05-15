<?php  
include 'connect.php';  
include 'head.php';

$buyer = $_SESSION['user_fname'].' '. $_SESSION['user_lname'];
$buyer_address = $_SESSION['user_email'];

$id = $_GET['id'];
	$sql = "SELECT * FROM users WHERE user_id = $id";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while prepearing the email. Please try again later and notify an admin.'; 
            } 
            else 
			{
				while ($row = mysql_fetch_array($result)){
					$seller = $row['user_fname'].' '. $row['user_lname'];
					$address = $row['user_email'];
					}
			}
			
$book = $_GET['book'];
	$sql = "SELECT * FROM books WHERE book_id = $book";  
                          
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                //something went wrong, display the error  
                echo 'Something went wrong while prepearing the email. Please try again later and notify an admin.'; 
            } 
            else 
			{
				while ($row = mysql_fetch_array($result)){
					$title = $row['books_title'];
					$price = $row['books_price'];
					$class = $row['books_course'];					
					}
			}

$email_subject = $buyer . ' wants to buy your book.';

// Set required fields
$required_fields = array('comment');

// set error messages
$error_messages = array('comment' => 'Please enter your Message to continue.');

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();
		// Prepare our content string
		$email_content = 'Dear '. $seller.',' . "\n\n" . $_POST['comment']. "\n\n". 'Sincerely, '. "\n\n". $buyer;
				
		//headers
		$headers = 'From: web@mrkannah.com' . "\r\n" . 
        'Reply-To: '.$buyer_address. "\r\n" . 
        'X-Mailer: PHP/' . phpversion(). "\r\n" .
		"Return-Path: ".$buyer." <".$buyer_address.">\r\n";
		
		if(isset($_POST['submit'])){
		mail($address, $email_subject, $email_content, $headers);
		echo 'sent';
		}
?>
<form action="" method="post">
<label for="text">Message:</label><br>
<p>Dear User, (note that when the email is sent the word user will be replaced with the actual name of the owner)</p>
<textarea id="comment" name="comment" rows="0" cols="0" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea>
<?php
echo '<br />Sincerely,<br /><br />';
echo $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'];
?><br />
<input type="submit" value="Send" id="submit" name="submit"/>
</form>
<?php
include 'foot.php';  
?>