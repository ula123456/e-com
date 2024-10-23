<?php include("includes/header.php");  ?>
		
		
		<div class="content_wrapper"><!-- content start -->

			<?php if ($_SESSION['user_id']) {?>
				
		
 		<div class="user_container" >
 			<div class="user_content" >
 				<?php
		if (isset($_GET['action'])) {
		$action = $_GET['action'];
		}else{
			$action = '';
		}
		switch ($action) {

				case 'edit_account':
				include('users/edit_account.php');
				break;

				case 'edit_profile':
				include('users/edit_profile.php');
				break;

				case 'user_profile_picture':
				include('users/user_profile_picture.php');
				break;

				case 'chage_password':
				include('users/change_password.php');
				break;

				case 'delete_account':
				include('users/delete_account.php');
				break;
		
			
			default:
				echo "do something";
				break;
		}
		/*if ($_GET['action'] == 'edit_account') {
			echo $action;
		}*/
 	
 				?>

 			</div><!-- user_content -->
 			<div class="user_sidebar" >
 				<?php 
 				$user_id=$_SESSION['user_id'];

			$select_user = $db->prepare("SELECT * FROM users WHERE user_id='$user_id'");
			$select_user->execute();
			$row_image = $select_user->fetch();
			if ($row_image['image'] !='') {
				?>
				<div class="user_image" align="center">
					<img src="admin_area/images_DIR/<?php echo $row_image['image']; ?>"/>
				</div>
			<?php }else{ ?>
				<div class="user_image" align="center">
					<img src="images/profile-icon.png"/>
				</div>
				<?php }?>
 				
 				
 				<ul>
 					<li><a href="my_account.php?action=my_order">My Order</a> </li>
 					<li><a href="my_account.php?action=edit_account">Edit Account</a> </li>
 					<li><a href="my_account.php?action=edit_profile">Edit Profile</a> </li>
 					<li><a href="my_account.php?action=user_profile_picture">User Profile Picture</a> </li>
 					<li><a href="my_account.php?action=chage_password">Change password</a> </li>
 					<li><a href="my_account.php?action=delete_account">Delete Account</a> </li>
 					<li><a href="logout.php">Logout</a> </li>
 				</ul>

 			</div><!-- user_sidebar -->
 		</div><!-- user_container -->	

 		<?php }else{ ?>		

 		<h1>Account Setting Page</h1>
 		<h5><a href="index.php?action=login">Log in</a>to Your Account</h5>

 		<?php } ?>		
		</div><!-- content_wrapper -->
<?php include("includes/footer.php");  ?>