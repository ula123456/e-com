<?php  session_start();  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Web Developer</title>
  <link href="styles/login.css" type="text/css" rel="stylesheet">
</head>


<body>

  
  <form class="forma" action="" method="post" enctype="multipart/form-data">
 <ul>
    <h2>Admin Login</h2>
    <li><input type="text" name="email" placeholder="Email"/></li>
    <li><input type="password" name="password"  placeholder="Password"/></li>
    <li><input type="submit" name="login"   value="Log In"/> </li>
</ul>
  </form>
  
     
</body>

<?php 
include('../includes/db.php');
if (isset($_POST['login'])) {
 
 $email = trim($_POST['email']);

 $has_pasword = md5(trim($_POST['password']));

  

  $chek_user = $db->prepare("SELECT count(*) FROM users WHERE email='$email' AND password='$has_pasword'");
  $chek_user->execute();
  $check_login = $chek_user->fetchColumn();

  $run_user = $db->prepare("SELECT * FROM users WHERE email='$email' AND password='$has_pasword'");
  $run_user->execute();
  $row_login = $run_user->fetch();
  
  
  
            if ($check_login >0)
            {

                      $_SESSION['email'] = $row_login['email'];
                      $_SESSION['name'] = $row_login['name'];
                      $_SESSION['user_id'] = $row_login['user_id'];
                      $_SESSION['role'] = $row_login['role'];
                      
                      

                    if ($row_login['role'] == 'admin') 
                        {echo "<script>window.open('index.php? loggin in','_self')</script>";}
                  elseif ($row_login['role'] == 'guest') 
                        { echo "<script>alert('You are not admin!')</script>";}
                  else
                        { echo "<script>alert('Wrong try again !!!')</script>"; }

            }
}


?>