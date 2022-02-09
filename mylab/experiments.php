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
        <title>MyLab app</title>
</head>

<body>
        <h1>OLAA</h1>  
        <button class = "navbar-toggler" type="button" data-toggle = "collapse" data-target = "#navbarResponsive">
                 <a href = "php/close_session_be.php"> Log out </a>
	</button>
</body>