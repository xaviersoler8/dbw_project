<?php

        session_start();

        if(!isset($_SESSION['user'])){
                echo '
                <script>
                        alert("Please, connect session");
                        window.location = "../login.php";
                </script>
                ';
                session_destroy();
                die();
        }

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Calendar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	<link href="indexcalendar.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6c757d;">
			<a class="navbar-brand" ><img width=50 src ="../img/logo4.png"> MyLab</a>
			<div class="navbar-collapse" id="navbarSupportedContent">
			  <!-- experiments -->
			  <div class="col-sm-2 col-xs-12 col-md-1">
				<li class="nav-item active">
				  <a class="nav-link" href="../experiments.php"><img width=30 src ="../img/exp_icon.png"></a>
				</li>
			  </div>
			  <!-- stock -->
			  <div class="col-sm-2 col-xs-12 col-md-1">
				<li class="nav-item">
				  <a class="nav-link" href="../stock.php"><img width=30 src ="../img/stock_icon.png"></a>
				</li>
			  </div>
			  <!-- calendar -->
			  <div class="col-sm-2 col-xs-12 col-md-1">
				<li class="nav-item">
					<a class="nav-link" href="calendar.php"><img width=30 src ="../img/cal_icon.png"></a>
				  </li>
			  </div>
			  <!-- chat -->
			  <div class="col-sm-2 col-xs-12 col-md-1">
				<li class="nav-item">
				  <a class="nav-link" href="../chat.php"><img width=30 src ="../img/chat_icon.png"></a>
				</li>
			  </div>
			  <!-- profile -->
			  <div class="col-sm-2 col-xs-12 col-md-1">
				<li class="nav-item">
				  <a class="nav-link" href="../profile.php"><img width=30 src ="../img/prof_icon.png"></a>
				</li>
			  </div>
			</div>
		  </nav>


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">MyLab's Calendar</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 text-center mb-5">
				    <div> <!-- Here the class was:   class="calendar-container"-->
				      <div class="calendar"> 
				        <div class="year-header"> 
				          <span class="left-button fa fa-chevron-left" id="prev"> </span> 
				          <span class="year" id="label"></span> 
				          <span class="right-button fa fa-chevron-right" id="next"> </span>
				        </div> 
				        <table class="months-table w-100"> 
				          <tbody>
				            <tr class="months-row">
				              <td class="month">Jan</td> 
				              <td class="month">Feb</td> 
				              <td class="month">Mar</td> 
				              <td class="month">Apr</td> 
				              <td class="month">May</td> 
				              <td class="month">Jun</td> 
				              <td class="month">Jul</td>
				              <td class="month">Aug</td> 
				              <td class="month">Sep</td> 
				              <td class="month">Oct</td>          
				              <td class="month">Nov</td>
				              <td class="month">Dec</td>
				            </tr>
				          </tbody>
				        </table> 
				        
				        <table class="days-table w-100"> 
				          <td class="day">Sun</td> 
				          <td class="day">Mon</td> 
				          <td class="day">Tue</td> 
				          <td class="day">Wed</td> 
				          <td class="day">Thu</td> 
				          <td class="day">Fri</td> 
				          <td class="day">Sat</td>
				        </table> 
				        <div class="frame"> 
				          <table class="dates-table w-100"> 
			              <tbody class="tbody">             
			              </tbody> 
				          </table>
				        </div> 
				      </div>
			
					  
				  </div>
				</div>

			</div>
			<div class="row justify-content-center">
						<form id="calendar" action="calendar_out.php" method="POST">
				<label>Month: </label>
				<select name="month" class="btn btn-secondary dropdown-toggle">
				<option value="0">Select</option>
				
				<?php
					$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
					$month="SELECT * FROM month";
					$resultado=mysqli_query($connection,$month);
					$my_array = array();
					while ($valores = mysqli_fetch_array($resultado)) {
					
					if (in_array($valores[month], $my_array)) {
						
					}
					else {
						echo '<option value="'.$valores[month].'">'.$valores[month].'</option>';
					};

					array_push($my_array, $valores[month]);
					
					}
				?>
				</select>
				

				<label>Day: </label>
				<select name="day" class="btn btn-secondary dropdown-toggle">
				<option value="0">Select</option>
				
				<?php
					$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
					$day="SELECT * FROM day";
					$resultado=mysqli_query($connection,$day);
					$my_array = array();
					while ($valores = mysqli_fetch_array($resultado)) {
					
					if (in_array($valores[day], $my_array)) {
						
					}
					else {
						echo '<option value="'.$valores[day].'">'.$valores[day].'</option>';
					};

					array_push($my_array, $valores[day]);
					
					}
				?>
				</select>


				<label>Hour: </label>
				<select name="hour" class="btn btn-secondary dropdown-toggle">
				<option value="0">Select</option>
				
				<?php
					$connection = mysqli_connect("localhost", "mylab", "dbmylab", "login_register_db" );
					$hour="SELECT * FROM hour";
					$resultado=mysqli_query($connection,$hour);
					$my_array = array();
					while ($valores = mysqli_fetch_array($resultado)) {
					
					if (in_array($valores[hour], $my_array)) {
						
					}
					else {
						echo '<option value="'.$valores[hour].'">'.$valores[hour].'</option>';
					};

					array_push($my_array, $valores[hour]);
					
					}
				?>
				</select>


				
				<input type="text" id="login" class="fadeIn second" placeholder="Event name" name = "event">
				<input type="text" id="login" class="fadeIn second" placeholder="Room" name = "room">
				<input type="text" id="login" class="fadeIn second" placeholder="Description" name = "description">

				<br>
				<br>
				<br>
				
				<input type="submit" class="fadeIn fourth btn btn-dark" value="Submit" name="submit">
			</form>
			</div>
		</div>
	</section>

	<!-- Register Form -->
<!--EXPERIMENTS-->







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

