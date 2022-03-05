<?php

	session_start();
	# Si existe una sesion iniciada, entra en ella
	if(isset($_SESSION['user'])){
		header("location: experiments.php");
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LogIn</title>
	<link href="login.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
<div class="wrapper fadeInDown">
	<div id="formContent">
	  <!-- Icon -->
	  <div class="fadeIn first">
		<img src="img/user.png" id="icon" alt="User Icon" />
	  </div>
  
	  <!-- Login Form -->
	  <form method="post" action="php/login_be.php">
		<input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
		<input type="password" id= "login" class="fadeIn third" name="pass" placeholder="password">
		<input type="submit" class="fadeIn fourth" value="Log In" name="login">
	  </form>
  
	  <!-- Remind Passowrd & Register -->
		<div id="formFooter">
		<a class="underlineHover" href="register.php">Register</a>
	</div>
	<div id="formFooter">
	<a href = "index.html"><buttom type = "buttom" class = "btn btn-outline-secondary btn-lg" style="background-color:grey; color:white ">MyLab Web</buttom></a>
	<style>
	.btn-outline-secondary:hover {
  background-color: #c0a8a1 !important;
}
</style>
</div>

  
	</div>
  </div>
</body>
