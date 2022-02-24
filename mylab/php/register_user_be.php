<?php
//por as mensaxes bonitas
//condicions ale
//condicion do @ no email
//

include('connection_be.php');
if (isset($_POST['register'])) { # check if "Enviar consulta" bottom was check
    # Then, check if all fields are not empty
    if(strlen($_POST['complete_name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['user']) >= 1 &&
        strlen($_POST['pass']) >= 1 )  {

        $complete_name = trim($_POST['complete_name']);
        $email = trim($_POST['email']);
        $user = trim($_POST['user']);
        $password = trim($_POST['pass']);

    }else{
        echo '
             <script>
                 alert("Please, complete the required fields");
                 window.location = "../register.php";
             </script>
        ';
        exit();
     }

    //Encripted password NON FUNCIONA!! password_Verify para recuperal i thk
    //$password = password_hash( $password ,PASSWORD_BCRYPT); CREOQ  XA SEI PQ, PQ HAI Q AUMENTAR O NUM DE CARACTERES

    $query= "INSERT INTO users(complete_name, email, user, pass) VALUES ('$complete_name', '$email', '$user', MD5('$password'))";

    //Verify that the email is unique:
    $verify_email = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($verify_email) > 0) {
        echo '
            <script>
                alert("This email is already register! Try again with another one");
                window.location = "../register.php";
            </script>
        ';
        exit();
    }

    //Verify that the user is unique:
    $verify_user = mysqli_query($connection, "SELECT * FROM users WHERE user = '$user'");

    if(mysqli_num_rows($verify_user) > 0) {
        echo '
            <script>
                alert("This user is already register! Try again with another one");
                window.location = "../register.php";
            </script>
        ';
        exit();
    }

    $execute = mysqli_query($connection, $query) or print mysqli_error();
        
    if($execute){
        echo '
            <script>
                alert("Congratulations! User registered!");
                window.location = "../login.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Something went wrong! Try again");
                window.location = "../register.php";
            </script>
        ';
    }
}

mysqli_close($connection);
?>