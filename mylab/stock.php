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
}; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyLab web</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="stock.css" rel="stylesheet">
    <!-- Required meta tags -->    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

<!--HEADER--> 

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
    <a class="navbar-brand" href="index.html"><img width=50 src ="img/logo4.png"> MyLab</a>
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

  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <strong>REACTIVES</strong>
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <dl>
            <table class="table table-hover">
                
                <tbody>
                
                <tr>
                    
  <?php
          include('php/connection_be.php');
$counter=1;
while($counter <= 7){

$reactivestable="SELECT * FROM reactives WHERE id_reactive='$counter'";
$x=mysqli_query($connection,$reactivestable);
$counter=$counter+1;
$row = mysqli_fetch_assoc($x);
$count=0;

foreach (array_keys($row) as $key){
    $count=$count+1;
    if ($count == 2){$spaces=str_repeat("&nbsp", 140);echo '<tr align= "right"><th scope="row">';echo $row[$key]; echo "</th>";};
    if ($count == 3){$amount=$row[$key]; echo "<td>";echo $amount;};
    if ($count == 4){$units=$row[$key]; echo "&nbsp";echo $units; echo "</td>";};    
    if ($count == 5){if($amount>$row[$key]){echo "<td>&#9989;</td></tr>";$count=0;}else{echo "<td>&#10060;</td></tr>"; $count=0;};};
};};


?>

                </tr>
            </tbody>
            </table>
          </dl>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <strong>EQUIPMENT</strong>
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <dl>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">EXPENDABLE</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Alarms</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Paper</th>
                        <td>10</td>
                        <td>&#9989;</td>
                    </tr>
                    <tr>

                    </tr>
                </tbody>
            </table>
                <br>
            <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">NON-EXPENDABLE</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Alarms</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Authomatic pipettes</th>
                        <td>19</td>
                        <td>&#9989;</td>
                    </tr>
                        </tr>
                </tbody>
            </table>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">MACHINES</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Alarms</th>
                        </tr>
                    </thead>
                <tbody>
                        <tr>
                            <th scope="row">Centrifuge</th>
                            <td>02</td>
                            <td>&#9989;</td>
                    
                        </tr>
                </tbody>
            </table>
            </dl>
        </div>
      </div>
    </div>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>