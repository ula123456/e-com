
<div class="form_box"> 
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="100%">

			<tr >
				<td colspan="7">
					<h2>Add Product</h2>
					<div class="border_bottom" ></div><!--border_bottom -->
				</td>
			</tr>
			<tr>
				<td><b>Product title</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
			<tr>
				<td><b>Product category</b></td>
				<td>
					<select name="product_cat">
						<option>select a category</option>
						<?php 
						

						$dbh = $db->query('SELECT * FROM Categories');
						while($row = $dbh->fetch()) {
					    
					    $cat_id = $row['cat_id'];
								 
						$cat_title = $row['cat_title'];
								 
						echo "<option value='$cat_id'>$cat_title</otion> ";
						} ?>
					</select>
				</td>
			</tr>
			
				<td ><b>Product brand</b></td>
				<td>
					<select name="product_brand">
						<option>select a brand</option>
						<?php 
						
						$dbh = $db->query('SELECT * FROM brands');
						while($row_brand = $dbh->fetch()) {
					    
					    $brand_id = $row_brand['brand_id'];
								 
						$brand_title = $row_brand['brand_title'];
			 
						echo "<option value='$brand_id'>$brand_title</otion> ";
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Product image</b></td>
				<td><input type="file" name="product_image"> </td>

			</tr>
			<tr>
				<td><b>Product price</b></td>
				<td><input type="text" name="product_price" required> </td>

			</tr>
			<tr>
				<td valign="top"><b>Product description</bscription></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea> </td>

			</tr>
			<tr>
				<td><b>Product keywords</b></td>
				<td><input type="text" name="product_keywords" required> </td>
			</tr>
			<tr>
				<td></td>
				<td colspan="7"><input type="submit" name="insert_post" value="insert product now"> </td>
			</tr>
		</table>
	</form>
	
</div> <!-- -->
<?php 
if (isset($_POST['insert_post'])){

	$product_cat = $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];
	$product_title = $_POST['product_title'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];

	//Getting the image from the field
	$product_image = $_FILES["product_image"]["name"];
	$image_temp = $_FILES["product_image"]["tmp_name"];
	

	move_uploaded_file($image_temp,"../upload-files/$product_image");
	
	$sql = "INSERT INTO products
	(product_cat,
		product_brand,
		product_title,
		product_price,
		product_desc,
		product_keywords,
		product_image) 
	 VALUES('$product_cat',
	 	'$product_brand',
	 	'$product_title',
	 	'$product_price',
	 	'$product_desc',
	 	'$product_keywords',
	 	'$product_image')";
	
	$stmt = $db->prepare($sql);
	$stmt->execute();

	if ($stmt) {
		echo "<script>alert('inserted successfully')</script>";	}

}

?>