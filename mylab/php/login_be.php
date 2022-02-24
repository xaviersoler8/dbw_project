<?php

session_start();

include('connection_be.php');

if (isset($_POST['login'])) { # check if "Enviar consulta" bottom was check
    # Then, check if all fields are not empty
    if( strlen($_POST['email']) >= 1 &&
        strlen($_POST['pass']) >= 1 )  {
            
        $email = trim($_POST['email']);
        $password = trim($_POST['pass']);
    }else{
        echo '
             <script>
                 alert("Please, complete the required fields");
                 window.location = "../login.php";
             </script>
        ';
        exit();
     }

    $validate_login = mysqli_query($connection, "SELECT * FROM users WHERE email ='$email' and pass=MD5('$password')");

    if(mysqli_num_rows($validate_login) > 0) {
        $_SESSION['user'] = $email;
        header("location: ../experiments.php");
        exit();
    } else {
        echo '
        <script>
            alert("User not registered. Please, verify the data again");
            window.location = "../login.php";
        </script>
        ';
        exit();
    }
}

mysqli_close($connection);


?>