<?php include("includes/header.php");  ?>

		
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

	<?php $dbh = $db->query('SELECT * FROM products ');
		while($row_pro = $dbh->fetch()) {
		  $pro_id = $row_pro['product_id'];
		  $pro_cat = $row_pro['product_cat'];
		  $pro_brand = $row_pro['product_brand'];
		  $pro_title = $row_pro['product_title'];
		  $pro_price = $row_pro['product_price'];
		  $pro_image = $row_pro['product_image'];
		  
		  
		  echo "
		      <div id='single_product'>
			    <h3>$pro_title</h3>
				<img src='upload-files/$pro_image' width='180' height='180' />
				
				<p><b> Price: $ $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'>
				  <button style='float:right'>Add to Cart</button>
				</a>
			  </div>";
		}	?>

				</div>
			</div>
				
		</div><!-- content end -->


<?php include("includes/footer.php");  ?>