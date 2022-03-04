<?php

        session_start();

        if(!isset($_SESSION['user'])){
                echo '
                <script>
                        alert("Please, connect session");
                        window.location = "../login.php";
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

<!--HEADER--> 

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
  <a class="navbar-brand" href="../index.html" ><img width=50 src ="../img/logo4.png"> MyLab</a>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <!-- experiments -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item active">
        <a class="nav-link" href="../experiments.php"><img width=30 src ="../img/exp_icon.png"></a>
      </li>
    </div>
    <!-- stock -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="../stock.php"><img width=30 src ="../img/stock_icon.png"></a>
      </li>
    </div>
    <!-- calendar -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
          <a class="nav-link" href="calendar.php"><img width=30 src ="../img/cal_icon.png"></a>
        </li>
    </div>
    <!-- chat -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="../chat_1.php"><img width=30 src ="../img/chat_icon.png"></a>
      </li>
    </div>
    <!-- profile -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="../profile.php"><img width=30 src ="../img/prof_icon.png"></a>
      </li>
    </div>
  </div>
</nav>


<?php
        include('../php/connection_be.php');
$month=$_POST["month"];
$room=$_POST["room"];
$day=$_POST["day"];
$hour=$_POST["hour"];
$event=$_POST["event"];
$description=$_POST["description"];

if($month=='January'){$month_id=1;};
if($month=='February'){$month_id=2;};
if($month=='March'){$month_id=3;};
if($month=='April'){$month_id=4;};
if($month=='May'){$month_id=5;};
if($month=='June'){$month_id=6;};
if($month=='July'){$month_id=7;};
if($month=='August'){$month_id=8;};
if($month=='September'){$month_id=9;};
if($month=='October'){$month_id=10;};
if($month=='November'){$month_id=11;};
if($month=='December'){$month_id=12;};



$insertar="INSERT INTO calendar(event,day,month,room,description,hour,month_id) VALUES ('$event','$day','$month','$room','$description','$hour','$month_id')";
$resultado=mysqli_query($connection,$insertar);

      echo '
      <script>
          alert("The event has been added successfully!");
          window.location = "calendar.php";
      </script>
 ';

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="experiments.css" rel="stylesheet">
  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="mylab/js/scriptbutton.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <main role="main" class="container">
    <br>
    <button class="btn btn-dark" onclick="history.back()">Go back</button>

  </main>


</body>
</html>