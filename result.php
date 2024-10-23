<?php include("includes/header.php");  ?>
		<div class="menu_bar">
			<ul id="menu">
				<li><a href="index.php">Home</a> </li>
				<li><a href="all_product.php">All product</a> </li>
				<li><a href="my_accaunt.php">My Accaunt</a> </li>
				<li><a href="cart.php">Shopping Cart </a></li>
				<li><a href="contact.php">Contact</a> </li>
			</ul>

		</div>
		
		<div class="content_wrapper"><!-- content start -->
			<div id="sidebar"><!-- sidebar start -->
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					
					<?php get_cat();?>

				</ul>
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					
					<?php get_brand(); 	?>
				</ul>

			</div><!-- sidebar start -->

			<div id="content_area">
				<div id="product_box">

					<?php 	search_Pro();	?>

					<?php get_cat_by_cat_id(); ?>

					<?php get_cat_by_brand_id(); ?>
				</div>
			</div>
				
		</div><!-- content end -->
<?php include("includes/footer.php");  ?>