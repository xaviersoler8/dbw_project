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
echo $row[steps];

foreach (array_keys($row) as $key) {

    $valor_before="SELECT amount FROM reactives WHERE name ='$key'";
    $z=mysqli_query($connection,$valor_before);
    $uwu=mysqli_fetch_assoc($z);

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
    <br>
    <button class="btn btn-dark" onclick="history.back()">Go back</button>

</html>

<!-- $valor_before="SELECT amount FROM prueba WHERE type ='$type'";
$x=mysqli_query($connection,$valor_before);


$row = mysqli_fetch_assoc($x);


$new_valor=($row['amount']-$amounnt);
echo $new_valor;

$actualizar="UPDATE prueba SET amount =$new_valor WHERE type ='$type'";
$y=mysqli_query($connection,$actualizar); -->