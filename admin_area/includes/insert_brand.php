
<div class="form_box"> 
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="100%">
			<tr>
				<td colspan="7">
					<h2>Add Brand</h2>
					<div class="border_bottom"></div> <!--/. border bottom -->
				</td>
				
			</tr>

			<tr>
				<td> <b>Add New Brand:</b></td>
					<td><input type="text" name="product_brand" size="60" requared/></td>
			</tr>
			                                          

	<td></td>
	<td colspan="7"><input type="submit" name="insert_brand" value="Add Brand"/></td>
	
</tr>
		</table>
		
	</form>
</div>

<?php //form box...

	if(isset($_POST['insert_brand'])){
		
	$product_brand = $_POST['product_brand'] ;

	

	$sql = "INSERT INTO brands (brand_title) 
	 VALUES('$product_brand')";
	
	$insert_brand = $db->prepare($sql);
	$insert_brand->execute();


	if($insert_brand){
	echo "<script>alert('Product Brand has been inserted successfully!')</script>";
	echo "<script>window.open(window.location.href,'_self')</script>";
	}

	}
?>
