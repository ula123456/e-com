<script>

$(document) .ready(function(){

	$("#password_confirm2") .on('keyup', function(){

		
		var password_confirm1 = $("#password_confirm1") .val();
		var password_confirm2 = $("#password_confirm2") .val();
		//alert(password_confirm2);
		if (password_confirm1==password_confirm2) {
			$("#status_for_confirm_password") .html('<strong style="color:green">Password match</strong>');
		}else{
			$("#status_for_confirm_password") .html('<strong style="color:red">Password do not match</strong>');
		}

	});

});
</script>
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
				<h2>Change password</h2><br/>
				
			</td>
		</tr>
		
		<tr>
		<td width="15%"><b>Current Password:</b> </td>
		<td colspan="3"><input type="password" id="password_confirm1" name="current_password" required placeholder="Current Password"></td>
		</tr>

		<tr>
		<td width="35%"><b>New Password:</b> </td>
		<td colspan="3"><input type="password"  name="new_password" required placeholder="New Password"></td>
		</tr>

		<tr>
		<td width="15%"><b>Re-Type Password:</b> </td>
		<td colspan="3"><input type="password" id="password_confirm2" name="confirm_new_password" required placeholder="Re-Type Confirm Password"><p id="status_for_confirm_password"></p><!-- shuving validate password here -->
		</td>
		</tr>

		
		<tr align="left">
		<td > </td>
					 	 		
		<td colspan="4"> <input type="submit" name="change_password" value="Register"></td>
		</tr>
	</table>
</form>
</div>
<?php if (isset($_POST['change_password'])) {
		$user_id=$_SESSION['user_id'];
		$current_password = trim($_POST['current_password']);
		$hash_current_password = md5($current_password);

		$new_password = trim($_POST['new_password']);
		$hash_new_password = md5($new_password);
		$confirm_new_password = trim($_POST['confirm_new_password']);

		$select_password = $db->prepare("SELECT count(*) FROM users WHERE password='$hash_current_password'AND user_id='$user_id' ");
		$select_password->execute();
		$fetch_password = $select_password->fetchColumn();
		if ($fetch_password == 0) {
			echo "<script>alert(' Your Current Password is Wrong!')</script>";
		}elseif ($new_password != $confirm_new_password) {
			echo "<script>alert(' Password do not match!')</script>";
		}else{
			$user_id=$_SESSION['user_id'];
			$update = $db->prepare("UPDATE users SET password='$hash_new_password' WHERE user_id= '$user_id' ");
			$update ->execute();
			if ($update) {
				echo "<script>alert(' your Password was update successful!')</script>";
				echo "<script>window.open(window.location.href,'_self')</script>";
			}else{
				echo "<script>alert(' Dtabase query failed!')</script>";
			}
		}
} ?>
		


				
		
