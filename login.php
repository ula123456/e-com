<div class="login_box">
<form method="post" action="">
	<table align="left" width="70%">
		<tr align="left">
			<td colspan="4">
				<h2>login</h2><br/>
				<span>
Don't have accaunt? <a href="register.php">Register Here</a><br/><br/>
				</span>
			</td>
		</tr>
		<tr>

		<td width="15%"><b>Email:</b> </td>
		<td colspan="3"><input type="text" name="email" required placeholder="email"></td>

		</tr>
		<tr>

		<td width="15%"><b>Password:</b> </td>
		<td colspan="3"><input type="password" name="password" required placeholder="Password"></td>

		</tr>
		<tr align="left">
		<td > </td>
						 	 		
		<td colspan="4">
		<a href="checkout.php?forgot_pass">
			Forgot Password</a> </td>
		</tr>
		<tr align="left">
		<td > </td>
					 	 		
		<td colspan="4"> <input type="submit" name="login" value="Login"></td>
		</tr>
	</table>
</form>
</div>
<?php 
if (isset($_POST['login'])) {
	$email = trim($_POST['email']);
	$password = trim($_POST['password']); 
	$password = md5($password);

	$run_login = $db->prepare("SELECT count(*) FROM users WHERE password='$password' AND email='$email' ");
	$run_login->execute();
	$check_login = $run_login->fetchColumn();

	$runlogin = $db->prepare("SELECT * FROM users WHERE password='$password' AND email='$email' ");
	$runlogin->execute();
	$row_login = $runlogin->fetch();
	
	
	if ($check_login ==0) {
		echo "<script>alert('password or email is wrong. try again!')</script>";
		exit();
	}

	$ip = get_ip();	 
	$run_cart = $db->prepare("SELECT count(*) FROM cart WHERE ip_adress='$ip'");
	$run_cart ->execute();
	$check_cart = $run_cart->fetchColumn();

	
	
		

	if ($check_login > 0 AND $check_cart==0) {

		$_SESSION['user_id'] = $row_login['user_id'];
		$_SESSION['role'] = $row_login['role'];

		$_SESSION['email'] = $email;
		echo "<script>alert('You has logged sucessful !!!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}else{
		$_SESSION['user_id'] = $row_login['user_id'];
		$_SESSION['role'] = $row_login['role'];

		$_SESSION['email'] = $email;
		echo "<script>alert('You has logged sucessful!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	
	}

}



?>