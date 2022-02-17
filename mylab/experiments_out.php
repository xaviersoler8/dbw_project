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


<?php
$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
$type=$_POST["typeref"];
$amounnt=$_POST["tentacles"];
$user=$_POST["userref"];


$insertar="INSERT INTO prueba(type,amount,uwu) VALUES ('$type','$amounnt','$user')";
$resultado=mysqli_query($connection,$insertar);


$valor_restar="SELECT * FROM protocols WHERE type='$type' AND user='$user'";
$x=mysqli_query($connection,$valor_restar);

$row = mysqli_fetch_assoc($x);
echo "<br>";
echo $row[steps];
echo "<br><br>";
$count=0;

foreach (array_keys($row) as $key){

    $valor_before="SELECT amount FROM reactives WHERE name ='$key'";
    $z=mysqli_query($connection,$valor_before);
    $uwu=mysqli_fetch_assoc($z);
    $count=$count+1;
    if ($count >= 3){
      if ($row[$key]<>0){
      echo "The amount of ";
      echo $key;    
      echo " to use is: ";
      echo $row[$key]*$amounnt."<br>";
      }
    }
    $new_valor=($uwu['amount']-(($row[$key])*$amounnt));
    
    $actualizar="UPDATE reactives SET amount=$new_valor WHERE name='$key'";
    $y=mysqli_query($connection,$actualizar);
};

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
    <?php
    echo $row[type];
    ?>

    <br>
    <button class="btn btn-dark" onclick="history.back()">Go back</button>

  </main>


</body>
</html>