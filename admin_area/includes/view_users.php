
<div class="view_product_box">
<h2>View Users</h2>
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
			<th>name</th>
			<th>email</th>
			<th>Image</th>
			<th>Status</th>
			<th>Delete</th>
			
		</tr>
	</thead>

	<?php 


$all_users = $db->query("SELECT * FROM users  order by user_id DESC");
$all_users->execute();
$i= 1;

while($row = $all_users->fetch())  {	


	?>

	<tbody>
		<tr>
			<td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['user_id']; ?>"></td>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php if($row['image'] !=''){ ?>
				<img src="images_DIR/<?php echo $row['image']; ?>" width= "70" height="50"/>
			<?php }else{ ?>	
				<img src="../images/profile-icon.png" width= "70" height="50"/>
			<?php }?>

			</td>
			
			
			<td>
				<?php if( $row['visible'] ==1){
					echo "Approved";
				}else{
					echo "Pending";
				} ?>
			</td><!--/.status -->
			<td><a href="index.php?action=view_users&delete_user=<?php echo $row['user_id'];?>">Delete</a> </td>
			
			
		</tr>
		
	</tbody>

<?php $i++;} //end while loop ?>	

<tr>
	<td><input type="submit" name="delete_all" value="Remove"/></td>
</tr>	
</table>

</form>

</div><!--/.view_products -->

<?php echo $row['id'];
//delete user Account
if (isset($_GET['delete_user'])) {
	

	$delete_user = $db->prepare("DELETE FROM `users` WHERE user_id ='$_GET[delete_user]' ");
	$delete_user->execute();
	
	


	if ($delete_user) {
		echo "<script>alert('user Account has been delete successfully!')</script> ";
		echo "<script>window.open('index.php?action=view_users','_self')</script>";

	}
}

//remove items selection using foreach loop
if (isset($_POST['deleteAll'])) {
	$remove = $_POST['deleteAll'];

	foreach ($remove as $key) {


	
$run_remove = $db->prepare("DELETE from users  where user_id='$key' ");
$run_remove->execute();


if ($run_remove) {
	
	echo "<script>alert('Items selected have  been remove successfully!')</script> ";
	echo "<script>window.open('index.php?action=view_users','_self')</script>";
	}else{
	echo "<script>alert('Mysqli Failed:msqli($con)!')</script> ";	
	}
}}
?>


