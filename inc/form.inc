<?php if($form_complete === FALSE): ?>
                <form method="post" name="contact" action="contact.phtml" id="comments_form">
					
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