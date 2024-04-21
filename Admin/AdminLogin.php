
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  <link rel="stylesheet" href="./css/AdminLogin.css">
</head>
<body>
  
  <div class="container">
    <div class="myform">
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
      <form action="AdminLoginFunc.php" method="post">
        <h2>ADMIN LOGIN</h2>
        <input type="text" id="fname" name="adminUid" placeholder="Email / Username">
        <input type="password" id="lname" name="adminPwd" placeholder="Password">
        <button name="submit" type="submit">Login</button>
      </form>
    </div>
    <div class="image">
      <img src="./images/image.jpg">
    </div>
  </div>

</body>
</html>