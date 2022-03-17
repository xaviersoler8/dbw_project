<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    $connection = mysqli_connect("localhost", "mylab", "dbmylab", "mylab" ); #igual hai q cambiar esto
    
    if($connection){
     
    } else {
        echo "Couldn't connect to database";
    };

?>

<!-- he borrado lo del if lo que hay bajo porque sino salía -->
<!-- echo "Successfully connected to database!"; -->