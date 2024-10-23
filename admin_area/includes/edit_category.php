<?php 



$edit_cat = $db->prepare("SELECT * FROM categories WHERE cat_id='$_GET[cat_id]' ");
$edit_cat->execute();
$fetch_cat = $edit_cat->fetch();
 ?>


<div class="form_box"> 
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="100%">
			<tr>
				<td colspan="7">
					<h2>Edit Category</h2>
					<div class="border_bottom"></div> <!--/. border bottom -->
				</td>
				
			</tr>

			<tr>
				<td> <b>Edit Cateogory:</b></td>
					<td><input type="text" name="product_cat" value="<?php echo $fetch_cat['cat_title'];  ?>" size="60" requared/></td>
			</tr>
			                                          

	<td></td>
	<td colspan="7"><input type="submit" name="edit_cat" value="SAVE"/></td>
	
</tr>
		</table>
		
	</form>
</div>

<?php //form box...

	if(isset($_POST['edit_cat'])){
		
	$cat_title = $_POST['product_cat'] ;
	$cat_id=$_GET['cat_id'];
	
	$edit_cat = $db->prepare("UPDATE categories SET cat_title='$cat_title' WHERE cat_id = :cat_id");
	$edit_cat->execute(array(':cat_id' => $cat_id));

	if($edit_cat){
	echo "<script>alert('Product category was update successfully!')</script>";
	echo "<script>window.open(window.location.href,'_self')</script>";
	}

	}
?>
