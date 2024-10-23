<?php 


$edit_brand = $db->prepare("SELECT * FROM brands WHERE brand_id='$_GET[brand_id]' ");
$edit_brand->execute();
$fetch_brand = $edit_brand->fetch();


 ?>


<div class="form_box"> 
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="100%">
			<tr>
				<td colspan="7">
					<h2>Edit Brands</h2>
					<div class="border_bottom"></div> <!--/. border bottom -->
				</td>
				
			</tr>

			<tr>
				<td> <b>Edit Brand:</b></td>
					<td><input type="text" name="product_brand" value="<?php echo $fetch_brand['brand_title'];  ?>" size="60" requared/></td>
			</tr>
			                                          

	<td></td>
	<td colspan="7"><input type="submit" name="edit_brand" value="SAVE"/></td>
	
</tr>
		</table>
		
	</form>
</div>

<?php //form box...

	if(isset($_POST['edit_brand'])){
		$brand_title = $_POST['product_brand'];
		$brand_id=$_GET['brand_id'];

	$edit_brand = $db->prepare("UPDATE brands 
									SET brand_title='$brand_title' 
								  WHERE brand_id = :brand_id");
$edit_brand->execute(array(':brand_id' => $brand_id));
	
	if($edit_brand){
	echo "<script>alert('Product category was update successfully!')</script>";
	echo "<script>window.open(window.location.href,'_self')</script>";
	}

	}
?>
