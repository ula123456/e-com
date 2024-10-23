<?php
session_start();
 include("functions/function.php");?>
<html>
<head>
<title>online shopping</title>
<link rel="stylesheet" media="all" href="style/style.css">
<script src="js/jquery-3.5.1.js"></script>

<body>
	<div class="main_wrapper"> <!-- start main container -->
		<div class="header_wrapper"><!-- start heder -->

			<div class="header_logo"><!-- logo -->
				<a href="index.php"><img id="logo" src="images/logo.png"></a>
			</div>

			<div id="form"><!-- forma -->
				<form metod="get" action="result.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="serch a product"/>
					<input type="submit" name="search" value="Search"/>
				</form>
			</div>
			<div class="cart">
				<ul>
					<li class="dropdown_header_cart">
						<div id="notification_total_cart" class="shoping-cart">
							<img src="images/cart_icon.png">
							<div class="cart_number">

								<?php total_item();	 ?>

							</div><!--noty_cart_nuber -->
						</div>
					</li>
				</ul>
			</div>

			<?php if (!isset($_SESSION['user_id'])) {?>
				

			<div class="register_login">
				<div class="login"><a href="index.php?action=login">Login</a></div>
				&nbsp;&nbsp;
				<div class="register"><a href="register.php">Register<a/></div>
			</div><!-- register login -->
			<?php }else{ ?>

			<?php 
			$user_id=$_SESSION['user_id'];

			$select_user = $db->prepare("SELECT * FROM users WHERE user_id='$user_id'");
			$select_user->execute();
			$data_user = $select_user->fetch();

	
			?>

			<div id="profile">
				<ul>
					<li class="dropdown_header">
						
						<a>
							<?php if ($data_user['image'] !='') {?>
							<span><img src="admin_area/images_DIR/<?php echo $data_user['image']; ?>"> </span>
							<?php }else{ ?><span><img src="images/profile-icon.png"> </span><?php } ?>
						</a>

						<ul class="dropdown_menu_header" >
							<li><a href="my_account.php?action=edit_account">Account Setting</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>

					</li>
				</ul>
			</div>

			<?php }?>
		</div><!-- heder end -->
		<div class="menu_bar">
			<ul id="menu">
				<li><a href="index.php">Home</a> </li>
				<li><a href="all_product.php">All product</a> </li>
				<li><a href="my_account.php">My Accaunt</a> </li>
				<li><a href="cart.php">Shopping Cart </a></li>
				<li><a href="contact.php">Contact</a> </li>
				<li><a href="logout.php">Logout</a> </li>
			</ul>

		</div>
<?php include('js/drop_doun_menu.php'); ?>