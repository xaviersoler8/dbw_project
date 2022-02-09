<?php

    $connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" ); #igual hai q cambiar esto
    
    if($connection){
        echo "Successfully connected to database!";
    } else {
        echo "Couldn't connect to database";
    };




?>