
<div class="view_product_box">
<h2>View Products</h2>
<div class="border_bottom"></div>

<div class="search_bar">
	<input type="text" id="search" placeholder="Type to search..."/>
	
</div>

<form action="" method="post" enctype="multipart/form-data "> 

<table width="100%">
	<thead>
		<tr>
			<th><input type="checkbox" id="checkAll">Check</th>
			<th>ID</th>
			<th>Title</th>
			<th>price</th>
			<th>Image</th>
			<th>Views</th>
			<th>Date</th>
			<th>Status</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
	</thead>

	<?php 

	
$all_products = $db->prepare("SELECT * FROM products ORDER BY product_id DESC");
$all_products->execute();

$i= 1;

		
while ($row = $all_products->fetch()) {
	?>

	<tbody>
		<tr>
			<td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['product_id']; ?>"></td>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['product_title']; ?></td>
			<td><?php echo $row['product_price']; ?></td>
			<td><img src="../upload-files/<?php echo $row['product_image']; ?>" width= "70" height="50"/></td>
			<td><?php echo $row['view']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td>
				<?php if( $row['visible'] ==1){
					echo "Approved";
				}else{
					echo "Pending";
				} ?>
			</td><!--/.status -->
			<td><a href="index.php?action=view_pro&delete_product=<?php echo $row['product_id'];?>">Delete</a> </td>
			<td><a href="index.php?action=edit_pro&product_id=<?php echo $row['product_id'];?>">Edit</a></td>

		</tr>
		
	</tbody>

<?php $i++;} //end while loop ?>	

<tr>
	<td><input type="submit" name="delete_all" value="Remove"/></td>
</tr>	
</table>

</form>

</div><!--/.view_products -->

<?php
//delete product
if (isset($_GET['delete_product'])) {

	

	$delete_product = $db->prepare("DELETE from products where product_id='$_GET[delete_product]' ");
	$delete_product->execute();

	if ($delete_product) {
		echo "<script>alert('Product has been delete successfully!')</script> ";
		echo "<script>window.open('index.php?action=view_pro','_self')</script>";
	}
}

//remove items selection using foreach loop
if (isset($_POST['deleteAll'])) {
	$remove = $_POST['deleteAll'];

	foreach ($remove as $key) {
	
	$run_remove = $db->prepare("DELETE from products where product_id='$key' ");
	$run_remove->execute();


if ($run_remove) {
	# code...

	echo "<script>alert('Items selected have  been remove successfully!')</script> ";
	echo "<script>window.open('index.php?action=view_pro','_self')</script>";
	}else{
	echo "<script>alert('Mysqli Failed:msqli($con)!')</script> ";	
	}
}}
?>


