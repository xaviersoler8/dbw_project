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
	<title>Experiments</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="experiments.css" rel="stylesheet">
  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="mylab/js/scriptbutton.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
  
 
<!--HEADER--> 

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
  <a class="navbar-brand" ><img width=50 src ="img/logo4.png"> MyLab</a>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <!-- experiments -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item active">
        <a class="nav-link" href="experiments.php"><img width=30 src ="img/exp_icon.png"></a>
      </li>
    </div>
    <!-- stock -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="stock.php"><img width=30 src ="img/stock_icon.png"></a>
      </li>
    </div>
    <!-- calendar -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
          <a class="nav-link" href="calendar-04/calendar.php"><img width=30 src ="img/cal_icon.png"></a>
        </li>
    </div>
    <!-- chat -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="chat.php"><img width=30 src ="img/chat_icon.png"></a>
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

<!--EXPERIMENTS-->
<main role="main" class="container">
  <br>
  <p>Type of experiment:</p>
  <form id="experiments" action="connection.php" method="POST">
    <label>nombre experimento</label>
    <select name="typeref">
      <option value="0">Seleccione</option>
    
      <?php
        $connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
        $experimentos="SELECT * FROM protocols";
        $resultado=mysqli_query($connection,$experimentos);
        while ($valores = mysqli_fetch_array($resultado)) {
          echo '<option value="'.$valores[type].'">'.$valores[type].'</option>';
        }
      ?>
      </select><br><br>
 
      <p>Number of experiments:</p>
      <label for="tentacles">Number of experiments</label>

        <input type="number" id="cantidad" name="tentacles" min="1" max="100">
      
      <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
  </form>


  <br>
  <p>User:</p>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        User
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Xavi</a>
        <a class="dropdown-item" href="#">Iria</a>
        <a class="dropdown-item" href="#">Alajuela</a>
        <a class="dropdown-item" href="#">Júlia</a>
        <a class="dropdown-item" href="#">Antonia</a>
        <a class="dropdown-item" href="#">Demetrio</a>
        <a class="dropdown-item" href="#">Josefina</a>
        <?php
        include("connection.php");
        $experimentos="SELECT * FROM experiments";
        $resultado=mysqli_query($connection,$experimentos);
        while ($valores = mysqli_fetch_array($resultado)) {
          echo '<a class="dropdown-item" href="#"><option value="'.$valores[user].'">'.$valores[user].'</option></a>';
        }
        ?>
      </div>
    </div>

  <br>
  <p>Do you want to write the protocol in a pdf file?</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
      <label class="form-check-label" for="inlineRadio1">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
      <label class="form-check-label" for="inlineRadio2">No</label>
    </div>

  <br>
  <br>
  <br>

  <!--SUBMIT-->
  <button type="button" class="btn btn-dark">Submit</button>

</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>