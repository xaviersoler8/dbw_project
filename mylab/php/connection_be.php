<?php
    $connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" ); #igual hai q cambiar esto
    
    if($connection){
     
    } else {
        echo "Couldn't connect to database";
    };

?>

<!-- he borrado lo del if lo que hay bajo porque sino salía -->
<!-- echo "Successfully connected to database!"; -->