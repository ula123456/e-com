<?php include("includes/header.php");  ?>
		
		
		<div class="content_wrapper"><!-- content start -->
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

<div class="register_box">
<form method="post" action="" enctype="multipart/form-data">
	<table align="left" width="70%">
		<tr align="left">
			<td colspan="4">
				<h2>Register</h2><br/>
				<span>
				already have accaunt? <a href="index.php?action=login">Login now</a><br/><br/>
				</span>
			</td>
		</tr>
		<tr>
		<td width="15%"><b>Name:</b> </td>
		<td colspan="3"><input type="text" name="name" required placeholder="Name"></td>
		</tr>

		<tr>
		<td width="15%"><b>Email:</b> </td>
		<td colspan="3"><input type="text" name="email" required placeholder="email"></td>
		</tr>

		<tr>
		<td width="15%"><b>Password:</b> </td>
		<td colspan="3"><input type="password" id="password_confirm1" name="password" required placeholder="Password"></td>
		</tr>

		<tr>
		<td width="15%"><b>Confirm Password:</b> </td>
		<td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password"><p id="status_for_confirm_password"></p><!-- shuving validate password here -->
		</td>
		</tr>

		<tr>
		<td width="15%"><b>Image:</b> </td>
		<td colspan="3"><input type="file" name="image"/></td>
		</tr>

		<tr>
		<td width="15%"><b>Country:</b> </td>
		<td colspan="3">
			<?php include('includes/country_list.php') ?>
		</td>
		</tr>

		<tr>
		<td width="15%"><b>City:</b> </td>
		<td colspan="3"><input type="text" name="city" required placeholder="City"></td>
		</tr>

		<tr>
		<td width="15%"><b>Contact:</b> </td>
		<td colspan="3"><input type="text" name="contact" required placeholder="contact"></td>
		</tr>

		<tr>
		<td width="15%"><b>Address:</b> </td>
		<td colspan="3"><input type="text" name="address" required placeholder="Address"></td>
		</tr>


		
		<tr align="left">
		<td > </td>
					 	 		
		<td colspan="4"> <input type="submit" name="register" value="Register"></td>
		</tr>
	</table>
</form>
</div>
<?php register_user(); ?>
				
		</div><!-- content end -->
<?php include("includes/footer.php");  ?>