<style>
.delete_account_container{padding: 10px;}
.delete_account_box{
	width: 50%;
}
.delete_account_box input [type=submit]{
	padding: 7px 15px;
	margin: 20px;
	float: :right;
	border: none;
}
.yes_btn{
background: rgba(3, 169, 255, 0.9);
color: white;
}
</style>

<div class="delete_account_container">
	<h1 stile="text-align:left">Confirm Box</h1>
	<hr/>
	<div class="delete_account_box">
		<h4>Are you sure want to delete your account</h4>
		<form action="" method="post" >
			<input type="submit" class="yes_btn" name="yes" value="Yes">
			<input type="submit"  name="cansel" value="Cansel">
		</form>
	</div>
</div>

<?php
if (isset($_POST['yes'])) {
	
			$user_id=$_SESSION['user_id'];

			$select_user = $db->prepare("DELETE FROM users WHERE user_id='$user_id'");
			$select_user->execute();
			var_dump($select_user);
			session_destroy();
			echo "<script>alert(' Your Accouwnt has been deleted !')</script>";
			echo "<script>window.open('index.php','_self')</script>";
	}		 
	if (isset($_POST['yes'])) {
		echo "<script>window.open(window.location.href,'_self')</script>";
	}
?>