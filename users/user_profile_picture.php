
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
				<h2>User Profile Picture</h2><br/>
				
			</td>
		</tr>
		
		<tr>
		<td width="15%"><b>Image:</b> </td>
		<td colspan="3"><input type="file" name="image"/>
		<div>
			<img src="admin_area/images_DIR/<?php echo $fetch_user['image']; ?>" width="100" height="70"/>
		</div>
		</td>
		</tr>

			
		<tr align="left">
		<td > </td>
					 	 		
		<td colspan="4"> <input type="submit" name="user_profile_picture" value="Save"></td>
		</tr>
	</table>
</form>
</div>
<?php if (isset($_POST['user_profile_picture'])) {

	if (!empty($_FILES['image']['name'])) {
		
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$target_file = "admin_area/images_DIR/". $image;
						
		$uploadOK = 1;
		$message ='';

		// check if the file size more then 5 mb
		if ($_FILES['image']['name'] < 5098888) {
			
		
		if (file_exists($target_file)) {

			$uploadOK = 0;
			$message .="Sorry, file alredy exist.";
		}if($uploadOK == 0){ // chek if uplodOk is set tp 0by an error
			$message .=" Sorry, your file was not uploadet.";
		}else{
			if (move_uploaded_file($image_tmp, $target_file)) {

			$user_id= $_SESSION['user_id'];
			$run_isert = $db->prepare("UPDATE users SET image='$image' WHERE user_id= '$user_id' ");
			$run_isert->execute();

			$message .= " the file " . basename($image) . "has been uploaded. ";
			

			}else{
			$message .= " Sorry there was an error uploaded Your file.";
		}

	}
}// end if the file size more then 5 mb
else{$message .= "File size max 5MB";}
}
}


 ?>
 <p style="color:green; margin-left:"> <?php if (isset($message)) {echo $message; }?> </p>
				
		
