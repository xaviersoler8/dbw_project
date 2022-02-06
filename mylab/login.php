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
	  <!-- Tabs Titles -->
  
	  <!-- Icon -->
	  <div class="fadeIn first">
		<img src="img/user.png" id="icon" alt="User Icon" />
	  </div>
  
	  <!-- Login Form -->
	  <form>
		<input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
		<input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
		<input type="submit" class="fadeIn fourth" value="Log In">
	  </form>
  
	  <!-- Remind Passowrd & Register -->
	<div id="formFooter">
		<a class="underlineHover" href="#">Forgot Password?</a>
	</div>
		<div id="formFooter">
		<a class="underlineHover" href="register.php">Register</a>
	</div>
  
	</div>
  </div>
</body>