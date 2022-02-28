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

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- CHAT -->


<?php


$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
$sql = "SELECT * FROM xat";
$result=mysqli_query($connection,$sql);


    $counter=1;

    while($counter<=10){

$xatline="SELECT * FROM xat WHERE idxat='$counter'";

$x=mysqli_query($connection,$xatline);
$counter=$counter+1;
$row = mysqli_fetch_assoc($x);
$count=1;
foreach (array_keys($row) as $key){
    if ($count == 1){$numid=$row[$key];};
    if ($count == 2){echo '<div class="w3-panel w3-border w3-round-xlarge">
      <p>'.$row[$key].'</p></div>';};
    $count=$count+1;
    };};


    
    

    ?>


