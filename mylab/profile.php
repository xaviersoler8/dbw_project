<?php

        session_start();

        if(!isset($_SESSION['user'])){
                echo '
                <script>
                        alert("Please, connect session");
                        window.location = "login.php";
                </script>
                ';
                session_destroy();
                die();
        }

?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link href="login.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="experiments.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>

<!--HEADER--> 

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
      <a class="navbar-brand" href="index.html"><img width=50 src ="img/logo4.png"> MyLab</a>
<div class="navbar-collapse" id="navbarSupportedContent">

      <!-- experiments -->
      <div class="col-sm-auto col-xs-12 col-md-1">
        <li class="nav-item active">
          <a class="nav-link" href="experiments.php"><img width=30 src ="img/exp_icon.png"></a>
        </li>
      </div>
      <!-- stock -->
      <!-- <div class="col-sm-auto col-xs-12 col-md-auto"> -->
      <div class="col-sm-2 col-xs-12 col-md-1">
        <li class="nav-item">
          <a class="nav-link" href="stock.php"><img width=30 src ="img/stock_icon.png"></a>
        </li>
      </div>
      <!-- calendar -->
      <div class="col-sm-2 col-xs-12 col-md-1">
        <li class="nav-item">
            <a class="nav-link" href="calendar/index.php"><img width=30 src ="img/cal_icon.png"></a>
          </li>
      </div>
      <!-- chat -->
      <div class="col-sm-2 col-xs-12 col-md-1">
        <li class="nav-item">
          <a class="nav-link" href="chat_1.php"><img width=30 src ="img/chat_icon.png"></a>
        </li>
      </div>
      <!-- profile -->
      <div class="col-sm-2 col-xs-12 col-md-1">
        <li class="nav-item">
          <a class="nav-link" href="profile.php"><img width=30 src ="img/prof_icon.png"></a>
        </li>
      </div>
    </div>
  </nav>


<!--PROFILE-->
<div>
<div class="wrapper fadeInDown">
	<div id="formContent" style="position: relative !important; top:70px">
  
	  <!-- Icon -->
	  <div class="fadeIn first">
		<img src="img/user.png" id="icon" alt="User Icon" />
	  </div>
      <br>
      <!-- Info 
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Name and Surname</h5>
          </div>
          <p class="mb-1">Júlia Vilalta Mor</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">User</h5>
          </div>
          <p class="mb-1">juliavm</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Email</h5>
          </div>
          <p class="mb-1">juliavilmor@gmail.com</p>
        </a>
      </div>
      <br>  -->

	  <!-- Log out Form -->
    <!--
	  <buttom class="navbar-toggler" type="button" data-toggle = "collapse" data-target = "#navbarResponsive">
        <a href="php/close_session_be.php"> Log Out </a>
    </buttom>
      -->

    <form method="post" action="php/close_session_be.php">
		  <input type="submit" class="fadeIn fourth" value="Log Out" name="login">
	  </form>

	</div>
  </div>

<!--footer -->
<div style="position:absolute; bottom:33px; width: 100%; height: 80px;">
<hr >
<footer class="row align-items-center" style="width: 100%; height: 80px;background-color:#6c757d">
<div class="col text-center font-weight-dark">
		&copy Copyright MyLab Team, &#xae All rights reserved.
	</div>
</footer>
<div>

</body>

  