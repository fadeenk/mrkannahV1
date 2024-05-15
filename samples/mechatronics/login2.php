<?php
if(isset($_POST['signin2'])){
    if($_POST['user_name'] == 'austin' && $_POST['user_pass'] == 'Austin1'){
	header( 'Location: http://mecha.hostei.com/fees.php' ) ;
    }
    else{
	echo'<p>You have supplied a wrong user/password combination.</p><form action="" method="post">
	      <input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
	      <input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
	      <input type="submit" name="signin2" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
		</form>';
	}			
}
else{
echo '<form action="" method="post">
<input type="text" placeholder="username" name="user_name" id="username" title="username" class="txt_field" />
<input type="password" placeholder="password" name="user_pass" id="password" title="password" class="txt_field" />
<input type="submit" name="signin2" value="Sign in" alt="Sign In" id="searchbutton" title="Signin" class="sub_btn"  />
</form>';
}
?>			