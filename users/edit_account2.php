
		
		
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
				<h2>Edit Account</h2><br/>
				
			</td>
		</tr>
		<tr>
		<td width="15%"><b>Name:</b> </td>
		<td colspan="3"><input type="text" name="name" value="<?php echo $fetch_user['name']; ?>" required placeholder="Name"></td>
		</tr>

		<tr>
		<td width="15%"><b>Email:</b> </td>
		<td colspan="3"><input type="text" name="email" value="<?php echo $fetch_user['email']; ?>" required placeholder="email"></td>
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

		<tr>
		<td width="15%"><b>Image:</b> </td>
		<td colspan="3"><input type="file" name="image"/>
		<div>
			<img src="upload-files/<?php echo $fetch_user['image']; ?>" width="100" height="70"/>
		</div>
		</td>
		</tr>

		<tr>
		<td width="15%"><b>Country:</b> </td>
		<td colspan="3">
			<?php include('users/edit_contries_list.php') ?>
		</td>
		</tr>

		<tr>
		<td width="15%"><b>City:</b> </td>
		<td colspan="3"><input type="text" name="city" value="<?php echo $fetch_user['city']; ?>" required placeholder="City"></td>
		</tr>

		<tr>
		<td width="15%"><b>Contact:</b> </td>
		<td colspan="3"><input type="text" name="contact" value="<?php echo $fetch_user['contact']; ?>" required placeholder="contact"></td>
		</tr>

		<tr>
		<td width="15%"><b>Address:</b> </td>
		<td colspan="3"><input type="text" name="address"  value="<?php echo $fetch_user['user_adress']; ?>" required placeholder="Address"></td>
		</tr>


		
		<tr align="left">
		<td > </td>
					 	 		
		<td colspan="4"> <input type="submit" name="register" value="Register"></td>
		</tr>
	</table>
</form>
</div>
<?php 	global $db;

if (isset($_POST['register'])) {

	if (isset($_POST['email']) &&
	 !empty($_POST['password']) && 
	 !empty($_POST['confirm_password']) &&
	  !empty($_POST['name']) ) {
		$ip = get_ip();
		$name = $_POST['name'];
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$hash_password = md5($password);
		$confirm_password = trim($_POST['confirm_password']);

		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];

		$check_exist = $db->prepare("SELECT count(*) FROM users WHERE email ='$email'");
		$check_exist->execute();

		$email_count = $check_exist->fetchColumn();
		$row_register = $check_exist->fetch();

		

	if ($count_cats < 0) { 	echo "";}


		if ($email_count>0) {
			echo "<script>alert('Sorry, your email $email address exist in our')</script>";
		}elseif ($row_register['email'] !=$email && $password == $confirm_password ) {
			move_uploaded_file($image_tmp, "upload-files/$image");
			
			$sql = "INSERT INTO `users`( 
			`ip_adress`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_adress`, `image`)
	 VALUES('$ip', '$name','$email','$hash_password','$country','$city','$contact',	'$address',	'$image')";
	
	$run_isert = $db->prepare($sql);
	
	$run_isert->execute();

	if ($run_isert) {
		 
		$sel_user = $db->prepare("SELECT * FROM users WHERE email=? ");
		$sel_user->execute([$email]);

		$row_user = $sel_user->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user_id']  = $row_user['user_id'] ."<br>";
		$_SESSION['role']  = $row_user['role'];
		}
		$run_cart = $db->prepare("SELECT * FROM cart WHERE ip_adress = ?");
		$run_cart->execute([$ip]);
		$check_cart=$run_cart->fetch();
		if ($check_cart==0) {
			$_SESSION['email']  = $email;
		echo "<script>alert('Account has been created sucessfully')</script>";
		echo "<script>window.open('customer/my_accaunt.php','_self')</script>";
		}else{

		$_SESSION['email']  = $email;
		echo "<script>alert('Account has been created sucessfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";	
		}
		}
	}
} ?>
				
		
