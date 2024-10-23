
<div class="form_box"> 
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="100%">
			<tr>
				<td colspan="7">
					<h2>Add Category</h2>
					<div class="border_bottom"></div> <!--/. border bottom -->
				</td>
				
			</tr>

			<tr>
				<td> <b>Add New Category:</b></td>
					<td><input type="text" name="product_cat" size="60" requared/></td>
			</tr>
			                                          

	<td></td>
	<td colspan="7"><input type="submit" name="insert_cat" value="Add Category"/></td>
	
</tr>
		</table>
		
	</form>
</div>

<?php //form box...

	if(isset($_POST['insert_cat'])){
		
	$product_cat = $_POST['product_cat'] ;

	

	$sql = "INSERT INTO categories (cat_title) 
	 VALUES('$product_cat')";
	
	$insert_cat = $db->prepare($sql);
	$insert_cat->execute();


	if($insert_cat){
	echo "<script>alert('Product category has been inserted successfully!')</script>";
	echo "<script>window.open(window.location.href,'_self')</script>";
	}

	}
?>
