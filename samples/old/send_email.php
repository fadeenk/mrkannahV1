<?php

// Set email variables
$to = 'fadeenk@yahoo.com';
$subject = $contact_subject = $_POST['subject'];
$name = $contact_name = $_POST['name'];
$email = $contact_email = $_POST['email'];
$message = $contact_message = $_POST['message'];
$ip = $client_ip = $_SERVER['REMOTE_ADDR'];


$message = "Name: ".$name."\n"."Email: ".$email."\n"."IP: ".$ip."\n"."Subject: ".$subject."\n"."Message:"."\n".$message;
$reply = "Dear ".$contact_name.", \n\nThis is an auto generated message! \n\nYou are recieving this message because I have recieved a message from you. I will be replying as soon as possible. \n\nFadee Kannah";

mail($email, "Auto Reply - Re: $subject", $reply);

if (mail($to, $subject, $message))
		{
			echo "success=yes";
		}
		else
		{
			echo "success=no";
		}
?>