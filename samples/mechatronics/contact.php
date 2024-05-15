<?php

// Set email variables
$email_to = 'mechatronics_club@yahoo.com';
$email_subject =  $_POST['subject'];

// Set required fields
$required_fields = array('fullname','email','comment','subject');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.',
	'subject' => 'Please enter a valid subject to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact MechaTronics Club</title>
<?php include("inc/meta.inc"); ?>
<?php include("inc/styles.inc"); ?>
<?php include("inc/scripts.inc"); ?>
</head>
<body>
<?php include("inc/header.inc"); ?>
    <div id="templatemo_main">
       <h2>Contact Information</h2>
        <div class="half float_l">
        <h4>Send us a message...</h4>
        <div id="contact_form">
                <?php if($form_complete === FALSE): ?>
                <form method="post" name="contact" action="contact.php" id="comments_form">
					
					<label for="fullname">Name:</label> <input type="text" id="fullname" name="fullname" class="validate-subject required input_field" value="<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" /><?php if(in_array('fullname', $validation)): ?><span class="error"><?php echo $error_messages['fullname']; ?></span><?php endif; ?>
					<div class="cleaner h10"></div>
																	
					<label for="email">Email:</label> <input type="text" class="validate-subject required input_field" name="email" id="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>" /><?php if(in_array('email', $validation)): ?><span class="error"><?php echo $error_messages['email']; ?></span><?php endif; ?>
					<div class="cleaner h10"></div>
															
					<label for="subject">Subject:</label> <input type="text" class="validate-subject required input_field" name="subject" id="subject" value="<?php echo isset($_POST['subject'])? $_POST['subject'] : ''; ?>" /><?php if(in_array('subject', $validation)): ?><span class="error"><?php echo $error_messages['subject']; ?></span><?php endif; ?>				               
					<div class="cleaner h10"></div>
											
					<label for="text">Message:</label> <textarea id="comment" name="comment" rows="0" cols="0" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea><?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
					<div class="cleaner h10"></div>				
																
					<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
					<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" /><?php else: ?><br /><p>Thank you for your Message!</p><?php endif; ?>
										
				</form>
            </div>
		</div>
        <div class="half float_r">
            <a href="https://www.facebook.com/groups/362730143752980/" target="_blank"><img src="http://icons.iconarchive.com/icons/yootheme/social-bookmark/48/social-facebook-box-blue-icon.png" /></a>
        </div>
        
        <div class="cleaner h40"></div>
        
        <iframe width="940" height="320" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=5225+Campanile+Drive+San+Diego,+CA+92115&amp;aq=&amp;sll=32.777215,-117.071383&amp;sspn=0.031716,0.066047&amp;ie=UTF8&amp;hq=&amp;hnear=5225+Campanile+Dr,+San+Diego,+California+92115&amp;ll=32.77288,-117.071656&amp;spn=0.031719,0.066047&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
    	<div class="cleaner"></div>
    
    </div> <!-- END of main -->
    
</div> <!-- END of wrapper -->
<?php include("inc/footer.inc"); ?>
</div> <!-- END of footer wrapper -->
</body>
</html>