<?php
if(isset($_POST['signin'])){
    if($_POST['user_name'] == 'admin' && $_POST['user_pass'] == 'pass'){
		echo '<a href="connect.php">Sign in members</a><br><a href="login2.php">Manage Fees</a>';
    }
    else{
	echo'<p>You have supplied a wrong user/password combination.</p><form action="" method="post">
	      <input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
	      <input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
	      <input type="submit" name="signin" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
		</form>';
	}			
}
else{
echo '<form action="" method="post">
<input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
<input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
<input type="submit" name="signin" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
</form>';
}
?>			