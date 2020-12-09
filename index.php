<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<header>
	<div class="nav">

	</div>

	<div class="banner">
	<!--
	<picture>
		<source srcset="" type="image/webp">
		<source srcset="" type="image/png">
  		<img src="" alt="">
	</picture>

	<img src="https://lh3.googleusercontent.com/oCAxwvibn0y027sU0eex9HVPYJ4AeYGoxwPhJFC6D6LZEifL1UxnApbw0ej7mm2CG41GzDGvUf2JLNI2ax1hdZcX-b-h6L5rTzKXZCfwGp63r55Ih_l67No80SGdZASNJJexD13Jwg=w420-h183-p-k" />
	-->
	</div>
</header>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- Notification message -->
  	<?php if(isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- Logged in user info -->
    <?php if(isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<a href="netplay.php" class="login">Netplay</a>
		<hr>
		<span>
			<a href="index.php?logout='1'" class="login">logout</a>
		</span>
    <?php endif ?>
</div>
</body>

</html>