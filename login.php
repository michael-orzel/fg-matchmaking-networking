<?php include('server.php') ?>
<?php
	if(isset($_SESSION['username'])) {
		header('location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group center">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<div class="subtext">
		<span>
			Need an account? <a href="register.php" class="login">Register</a>
		</span>
	</div>
  </form>
</body>
</html>