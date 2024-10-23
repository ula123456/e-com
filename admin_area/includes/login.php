<?php session_start(); ?>
<head>
<meta charset="UTF-8">
<title>Log In</title>

<link rel="stylesheet" href="styles/admin_form_login.css" />

</head>

<body>

<nav><a href="#" class="focus">Log In</a></nav>

<form action="" method="post" encotype="multipart/form-data">

	<h2>Admin Login</h2>

	<input type="text" name="email" class="text-field" placeholder="Username" />
    <input type="password" name="password" class="text-field" placeholder="Password" />
    
  <input type="submit" name="login" class="button" value="Log In" />

</form>

</body>
<?php

incluede('../db.php');
$msg = ""; 
if(isset($_POST['login'])) {
  $username = trim($_POST['email']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `users` where `email`=:email and `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('email', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
       
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['role'] = $row['role'];
       
      } else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>