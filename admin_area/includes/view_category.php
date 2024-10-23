
<div class="view_product_box">
<h2>View Catigiries</h2>
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
			<th>Category Title</th>
			<th>Status</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
	</thead>

	<?php 

$all_categories = $db->query("SELECT * FROM categories order by cat_id DESC");
	 


$i= 1;
while($row = $all_categories->fetch()) {
	
	?>

	<tbody>
		<tr>
			<td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['cat_id']; ?>"></td>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['cat_title']; ?></td>
			
			<td>
				<?php if( $row['visible'] ==1){
					echo "Approved";
				}else{
					echo "Pending";
				} ?>
			</td><!--/.status -->
			<td><a href="index.php?action=view_cat&delete_cat=<?php echo $row['cat_id'];?>">Delete</a> </td>
			<td><a href="index.php?action=edit_cat&cat_id=<?php echo $row['cat_id'];?>">Edit</a></td>

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
//delete category
if (isset($_GET['delete_cat'])) {
	$delete_cat = $db->prepare("DELETE from categories where cat_id='$_GET[delete_cat]' ");
	$delete_cat->execute();
	if ($delete_cat) {
		echo "<script>alert('Product catigory has been delete successfully!')</script> ";
		echo "<script>window.open('index.php?action=view_cat','_self')</script>";
	}
}

//remove items selection using foreach loop
if (isset($_POST['deleteAll'])) {
	$remove = $_POST['deleteAll'];

	foreach ($remove as $key) {
	

	$run_remove = $db->prepare("DELETE from categories where cat_id='$key' ");
	$run_remove->execute();

if ($run_remove) {
	# code...

	echo "<script>alert('Items selected have  been remove successfully!')</script> ";
	echo "<script>window.open('index.php?action=view_cat','_self')</script>";
	}else{
	echo "<script>alert('Mysqli Failed:msqli($con)!')</script> ";	
	}
}}
?>


