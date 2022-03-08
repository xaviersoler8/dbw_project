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
  <style>
#main {
  width: 80%;
  /* height: 30%; */
  display: flex;
  align-items: center;
}

#main div {
  flex: 1;
  margin-right: 15px
}
  </style>

</head>

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

<body>

  <main role="main" class="container">

  <!-- PHP -->
  <!-- AQUI PARA QUE NOS MUESTRE LOS PROTOCOLOS Y TO LA BAINA-->


  <?php
    include('php/connection_be.php');    
    if(isset($_POST["submit"]) &&
      strlen($_POST["typeref"]) != 1 &&
      $_POST["number"] != 0 &&
      strlen($_POST["userref"]) != 1 && 
      isset($_POST["inlineRadioOptions"])) { 


        $type=trim($_POST["typeref"]);
        $amounnt=trim($_POST["number"]);
        $user=trim($_POST["userref"]);
        $print=trim($_POST["inlineRadioOptions"]);
    
    }else{
        echo '
             <script>
                 alert("Please, complete the all the fields");
                 window.location = "experiments.php";
             </script>
        ';
        exit();
  };

  
    $valor_restar="SELECT * FROM protocols WHERE type='$type' AND user='$user'";
    $x = mysqli_query($connection,$valor_restar);
    $row = mysqli_fetch_assoc($x);


  ?>
  <div id="printableArea">
  <h1>
    <br>
    <?php
    echo $row['type'];
    ?>
    <br>
  </h1>
  <h3> STEPS </h3>
  <p>
    <?php
    $pattern = '/{{(\w*)}}/';
    $texto = $row['steps'];
    preg_match_all($pattern, $texto, $coincidencias);
    $num_matches = count($coincidencias[1]);

    for ($i = 0; $i < $num_matches; $i++) {
      $m = $coincidencias[1][$i];
      $replacement = $row[$m];
      $new_text = preg_replace($pattern, $replacement, $texto,1);
      $texto = $new_text;

    }
    
    echo "<pre>".$texto."</pre>";
    echo "<br><br>";
    $count=0;
    ?>
  </p>
  <h3> AMOUNTS </h3>

<?php
    foreach (array_keys($row) as $key){
        if ($key <> 'steps' && $key <> 'id_exp') {

          $valor_before="SELECT amount FROM reactives WHERE name ='$key'";
          $z=mysqli_query($connection,$valor_before);
          $uwu=mysqli_fetch_assoc($z);

          $cantidad= $row[$key]*$amounnt;

          if ($cantidad > $uwu['amount']) {
            echo '
             <script>
                 alert("Caution, there is not enough '.$key.' to carry out the experiment, please check the stock");
                 window.location = "experiments.php";
             </script>
            ';
            exit();
          };

          $units="SELECT units FROM reactives WHERE name ='$key'";
          $zz=mysqli_query($connection,$units);
          $uwu2=mysqli_fetch_assoc($zz);
          $count=$count+1;


          if ($count >= 3){
            if ($row[$key]<>0){
              echo '<div id="main"><div>The amount of ';
              echo '<b>'.$key.'</b>';    
              echo " to use is:</div>";
              echo "<div><b>".$row[$key]*$amounnt." ".$uwu2['units']."</b></div></div>"."<br>";
            }
         }
        $new_valor=($uwu['amount']-(($row[$key])*$amounnt));
        
        $actualizar="UPDATE reactives SET amount=$new_valor WHERE name='$key'";
        $y=mysqli_query($connection,$actualizar);
        };

      };
        
    ?>
</div>

    <br>
    <button class="btn btn-dark" onclick="history.back()">Go back</button>
    <?php if ($print == "yes") {    
      ?>
      <button class="btn btn-dark" onclick="printDiv('printableArea')">Download</button>

    
    <?php } ?>


  </main>


</body>
<!--footer -->

<div >
  <hr>
<footer class="row align-items-center " style="position:relative; bottom:0; width: 100%; height: 80px; background-color:#6c757d">
<div class="col text-center font-weight-dark">
		&copy Copyright MyLab Team, &#xae All rights reserved.
	</div>
    </footer>
  </div>

<!-- Print pdf -->
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

</html>