<?php include("includes/header.php");  ?>
		
		
		<div class="content_wrapper"><!-- content start -->

			<?php if (!isset($_GET['action'])) {?>
				
			

			

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

				<?php insert_to_cart();	?>
				
				<div id="product_box">

					


					<?php getPro();	?>

					<?php get_cat_by_cat_id(); ?>

					<?php get_cat_by_brand_id(); ?>


					</div><!-- product box -->
			</div><!-- content area -->
				<?php }else{ ?>

				<?php 
				include('login.php'); 
			}
			?>
		</div><!-- content end -->
<?php include("includes/footer.php");  ?>