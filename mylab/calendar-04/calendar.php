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
			<div class="row">
				<div class="col-md-12">
					<div class="content w-100">
				    <div class="calendar-container">
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
				        <button class="navbar-light bg-dark button" id="add-button">Add Event</button>
				      </div>
				    </div>
				    <div class="events-container">
				    </div>
				    <div class="dialog" id="dialog">
				        <h2 class="dialog-header"> Add New Event </h2>
				        <form class="form" id="form">
				          <div class="form-container" align="center">
				            <label class="form-label" id="valueFromMyButton" for="name">Event name</label>
				            <input class="input" type="text" id="name" maxlength="36">
				            <label class="form-label" id="valueFromMyButton" for="count">Hour</label>
				            <input class="input" type="number" id="count" min="0" max="1000000" maxlength="7">
				            <input type="button" value="Cancel" class="button" id="cancel-button">
				            <input type="button" value="OK" class="button button-white" id="ok-button">
				          </div>
				        </form>
				      </div>
				  </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

