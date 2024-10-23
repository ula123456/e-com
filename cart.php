<?php include("includes/header.php");  ?>

		
		<div class="content_wrapper"><!-- content wrapper start -->

				<div id="sidebar"><!-- sidebar start -->
					<div id="sidebar_title">Categories</div>
					<ul id="cats">	<?php get_cat();?>	</ul>
					<div id="sidebar_title">Brands</div>
					<ul id="cats"><?php get_brand(); ?>	</ul>
				</div><!-- sidebar END -->


				<div id="content_area">

					<div class="shopping_cart_container" >
						
						
						<div id="shopping_cart" align="right" style="padding:15px">
							
							<?php if (isset($_SESSION['custumer_email'])) 
							{ echo "<b> Your Email:</b> ".$_SESSION['custumer_email'];}
							else{echo""; }	?>

							<b style="color:navy">Yur Cart - </b> Total Item: <?php total_item();?>
							Total price: <?php total_price(); ?>
						</div><!-- shopping_cart end -->



						<form action=""method="post" encotype="multipart/form-data" >
						 	 <table align="center"  width="100%">
						 	 	<tr align="center">
						 	 		<th>Remove</th>
						 	 		<th>Product</th>
						 	 		<th>Quantity</th>
						 	 		<th>Price</th>
						 	 	</tr>
					<?php prod_in_cart();?>
		 						<tr>
		 							<td colspan="4" align="right"><b>Sub Total</b> </td> 
		 							<td><?php echo total_price(); ?></td>

		 						</tr>
						 	 	<tr align="center">
						 	 		<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"> </td>
						 	 		<td><input type="submit" name="continue" value="Continue shopping"> </td>
						 	 		<td><button><a href="checkout.php">Checkout</a></button> </td>
						 	 	</tr>

						 	 </table>
						</form>
						<?php del_item_fromcart();	?>

					</div>  <!--shopping_cart_cotainer-->

				</div><!-- content ERIA end -->

		</div><!-- content wrapper end -->

<?php include("includes/footer.php");  ?>