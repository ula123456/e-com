<?php include("includes/header.php");  ?>
		
		
		<div class="content_wrapper"><!-- content start -->
			
					<?php 

					if (!isset($_SESSION['user_id'])) {include('login.php');}
												  else{include('payment.php');}

					?>
								
		</div><!-- content end -->
<?php include("includes/footer.php");  ?>