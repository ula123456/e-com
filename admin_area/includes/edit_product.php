<?php

$edit_product = $db->prepare("SELECT * FROM products where product_id='$_GET[product_id]'");
$edit_product->execute();
$fetch_edit = $edit_product->fetch();

?>

<div class="form_box"> 
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="100%">

			<tr >
				<td colspan="7">
					<h2>Edit Product</h2>
					<div class="border_bottom" ></div><!--border_bottom -->
				</td>
			</tr>
			<tr>
				<td><b>Product title</b></td>
				<td><input type="text" name="product_title" value="<?php echo $fetch_edit['product_title']; ?>" size="60" required/></td>
			</tr>
			<tr>
				<td><b>Product category</b></td>
				<td>
					<select name="product_cat">
						<option>select a category</option>
				<?php 
						
				$dbh = $db->query('SELECT * FROM Categories');
				while($row = $dbh->fetch()) 
				{
					    $cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];

						if ($fetch_edit['product_cat'] == $cat_id) 

						{echo "<option value='$fetch_edit[product_cat]'selected> $cat_title</option>";}

						else

						{echo "<option value='$cat_id'> $cat_title </option>";	}

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
			while($row_brand = $dbh->fetch()) 
			{
				$brand_id = $row_brand['brand_id'];
				$brand_title = $row_brand['brand_title'];

						 if ($fetch_edit['product_brand'] == $brand_id)
						 {
						 	echo "<option value='$fetch_edit[product_brand]'selected>$brand_title</otion> ";
						 }
					 else
						 {
						 	echo "<option value='$brand_id'>$brand_title</otion> ";
						 }
						
			} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Product image</b></td>
				<td><input type="file" name="product_image"> <div class="edit_image">
	<img src="images_DIR/<?php echo $fetch_edit['product_image']; ?>" width="100" height="70">
	
				</div>
				</td>

			</tr>
			<tr>
				<td><b>Product price</b></td>
				<td><input type="text" name="product_price" value="<?php echo $fetch_edit['product_price']; ?>" required>
				
			</td>

			</tr>
			<tr>
				<td valign="top"><b>Product description</bscription></td>
				<td><textarea name="product_desc" cols="20" rows="10"> <?php echo $fetch_edit['product_desc']; ?> </textarea> </td>

			</tr>
			<tr>
				<td><b>Product keywords</b></td>
				<td><input type="text" name="product_keywords" value="<?php echo $fetch_edit['product_keywords']; ?>" required> </td>
			</tr>
			<tr>
				<td></td>
				<td colspan="7"><input type="submit" name="edit_product" value="Edit product "> </td>
			</tr>
		</table>
	</form>
	
</div> <!-- -->
<?php 
if (isset($_POST['edit_product']))//проверяет нажатали кнопка Edit product
{
						$product_cat = $_POST['product_cat'];
						$product_brand = $_POST['product_brand'];
						$product_title = $_POST['product_title'];
						$product_price = $_POST['product_price'];
						$product_desc = $_POST['product_desc'];
						$product_keywords = $_POST['product_keywords'];
						$date = date("F d, Y");
						
						
						//Getting the image from the field
						$product_image = $_FILES['product_image']['name'];
						$image_temp = $_FILES['product_image']['tmp_name'];

if (!empty($_FILES['product_image']['name']) ) //проверяет выбранли фото файл
	{					//копирует фото в папку images_DIR 
							if (move_uploaded_file($image_temp, "images_DIR/$product_image") )
							   { 
							   	$update_profile = $db->prepare("UPDATE products 
										SET product_cat = '$product_cat', 
											product_brand = '$product_brand', 
											product_title = '$product_title', 
											product_price = '$product_price', 
											product_desc = '$product_desc',
											product_keywords = '$product_keywords',
											product_image = '$product_image'
									  WHERE product_id ='$_GET[product_id]'");
								 $update_profile->execute();
								}
	}
else                              
	{	
	 $update_profile = $db->prepare("UPDATE products 
										SET product_cat = $product_cat, 
											product_brand = $product_brand, 
											product_title = $product_title, 
											product_price = $product_price, 
											product_desc = $product_desc,
											product_keywords = $product_keywords
									  WHERE product_id ='$_GET[product_id]'");
								 $update_profile->execute();
	}

	if ($update_profile) {echo "<script>alert('Product was update successfully!')</script>"; 
					      #echo "<script>window.open(window.location.href,'_self')</script>"; 
					 }		
			var_dump($update_profile);
}

?>
