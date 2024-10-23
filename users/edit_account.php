
		
		
	

<?php

			$user_id=$_SESSION['user_id'];

			$select_user = $db->prepare("SELECT * FROM users WHERE user_id='$user_id'");
			$select_user->execute();
			$fetch_user = $select_user->fetch();
			 
?>
<div class="register_box">
<form method="post" action="" enctype="multipart/form-data">
	<table align="left" width="70%">
		<tr align="left">
			<td colspan="4">
				<h2>Edit Account</h2><br/>
				
			</td>
		</tr>

		<tr>
		<td width="15%"><b>Change Email:</b> </td>
		<td colspan="3"><input type="text" name="email" value="<?php echo $fetch_user['email']; ?>" required placeholder="email"></td>
		</tr>

		<tr>
		<td width="30%"><b>Current Password:</b> </td>
		<td colspan="3"><input type="password" id="password_confirm1" name="current_password" required placeholder="Current Password"></td>
		</tr>

		
		<tr align="left">
		<td > </td>
					 	 		
		<td colspan="4"> <input type="submit" name="edit_account" value="Save"></td>
		</tr>
	</table>
</form>
</div>
<?php if (isset($_POST['edit_account'])) {

		
		$email = trim($_POST['email']);
		$current_password = trim($_POST['current_password']);
		$hash_password = md5($current_password);
		
		$check_exist = $db->prepare("SELECT count(*) FROM users WHERE email ='$email'");
		$check_exist->execute();

		$email_count = $check_exist->fetchColumn();
		$row_register = $check_exist->fetch();

		
		if ($email_count>0) {
			echo "<script>alert('Sorry, your email $email address exist in our')</script>";

		}elseif ($fetch_user['password'] !=$hash_password) {
						
			echo "<script>alert('Your Curren Password is Wrong')</script>";

	}else{

		$user_id= $_SESSION['user_id'];

		
	
	$run_isert = $db->prepare("UPDATE users SET email='$email' WHERE user_id= '$user_id' ");
	
	$run_isert->execute();
	

	if ($run_isert) {
		echo "<script>alert('Your Email  was Updated successfuly!')</script>";
		echo "<script>window.open(window.location.href,'_self')</script>";
	}

	}
		

	}	 ?>
				
		
