<?php
$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
$type=$_POST["typeref"];
$amounnt=$_POST["tentacles"];


$insertar="INSERT INTO prueba(type,amount) VALUES ('$type','$amounnt')";
$resultado=mysqli_query($connection,$insertar);


$valor_restar="SELECT * FROM protocols WHERE type ='$type'";
$x=mysqli_query($connection,$valor_restar);

$row = mysqli_fetch_assoc($x);
echo $row[type];
foreach (array_keys($row) as $key) {

    $valor_before="SELECT amount FROM reactives WHERE name ='$key'";
    $z=mysqli_query($connection,$valor_before);
    $uwu=mysqli_fetch_assoc($z);

    $new_valor=($uwu['amount']-(($row[$key])*$amounnt));
    
    $actualizar="UPDATE reactives SET amount=$new_valor WHERE name='$key'";
    $y=mysqli_query($connection,$actualizar);
    
};

?>

<!-- $valor_before="SELECT amount FROM prueba WHERE type ='$type'";
$x=mysqli_query($connection,$valor_before);


$row = mysqli_fetch_assoc($x);


$new_valor=($row['amount']-$amounnt);
echo $new_valor;

$actualizar="UPDATE prueba SET amount =$new_valor WHERE type ='$type'";
$y=mysqli_query($connection,$actualizar); -->