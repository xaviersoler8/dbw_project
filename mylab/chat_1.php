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
	<title>Chat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="experiments.css" rel="stylesheet">
  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <script src="mylab/js/scriptbutton.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script>
function gonow() {
document.getElementById('if').contentWindow.scrollTo(10,999999);

}
</script>
  <style>
.center {
  margin: auto;
  width: 60%;
  padding: 50px;
}
</style>


</head>

<body>

<!--HEADER--> 

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
  <a class="navbar-brand" ><img width=50 src ="img/logo4.png"> MyLab</a>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <!-- experiments -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item active">
        <a class="nav-link" href="experiments.php"><img width=30 src ="img/exp_icon.png"></a>
      </li>
    </div>
    <!-- stock -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="stock.php"><img width=30 src ="img/stock_icon.png"></a>
      </li>
    </div>
    <!-- calendar -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
          <a class="nav-link" href="calendar-04/calendar.php"><img width=30 src ="img/cal_icon.png"></a>
        </li>
    </div>
    <!-- chat -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="chat_1.php"><img width=30 src ="img/chat_icon.png"></a>
      </li>
    </div>
    <!-- profile -->
    <div class="col-sm-2 col-xs-12 col-md-1">
      <li class="nav-item">
        <a class="nav-link" href="profile.php"><img width=30 src ="img/prof_icon.png"></a>
      </li>
    </div>
  </div>
</nav>

<div class="center">

<h2>MyLab's xat</h2><br>


<iframe id="if" name="DP_Log_frame" src="chat_2.php" style="height:600px;width:450px" onload="gonow()"></iframe>

<form method="post" action="chat_1.php">
		<input type="text" id="chat" placeholder="Write here your message" name = "textchat">
		<input type="submit" value="Send" name="Send" href="chat_1.php">
	  </form>


</div>

<script>
function gotoBottom(id){
   var element = document.getElementById(id);
   element.scrollTop = element.scrollHeight - element.clientHeight;
}
</script>

<?php

$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" ); #igual hai q cambiar esto

if (isset($_POST["textchat"])) {
  $user1=$_SESSION['user'];
  
  $usuario="SELECT * FROM users WHERE email='$user1'";
  $x = mysqli_query($connection,$usuario);
  $row = mysqli_fetch_assoc($x);

  $count=1;
  foreach (array_keys($row) as $key){
      if ($count == 4){$user2=$row[$key];};
      $count=$count+1;
      };


  $message=trim($_POST["textchat"]);
  $query= "INSERT INTO xat(user,message) VALUES ('$user2','$message')";
  $execute = mysqli_query($connection, $query);  

};

?>



</body>

</html>