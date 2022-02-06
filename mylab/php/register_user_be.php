<?php

    include 'connection_be.php';

    $complete_name = $_POST['complete_name'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $password = $_POST['pass'];

    $query= "INSERT INTO users(complete_name, email, user, pass) 
             VALUES('$complete_name', '$email', '$user', '$password')";
    
    $execute = mysqli_query($connection, $query);

    if($execute){
        echo '
            <script>
                alert("Congratulations! User registered!");
                window.location = "../login.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Something went wrong! Try again");
                window.location = "../register.php";
            </script>
        ';
    }

    mysqli_close($connection);
?>