<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>MOI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
	<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css\select2.min.css">
	<link rel="stylesheet" type="text/css" href="css\custom.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
	<!--Static JS -->
	<script src="js\jquery.js"></script>
	<script src="js\bootstrap.min.js"></script>
	
  </head>
  <style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
  <body background="img.jpg">
  
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand w3-padding-large w3-red" href="#">MOI </a>
			
		</div>
		<ul class="nav navbar-nav">
		
  	<div class="w3-top">
  <div class="w3-bar w3-blue w3-card w3-left-align w3-large">
			<li class="active"><a href="index.php" class="navbar-brand w3-button w3-padding-large w3-white">Home</a></li>
			<?php
				if(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"]){
			?>
		
  
			
			
			<li><a href="appointment.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Appointments</a></li>
			<li><a href="AddPatient.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Add Patient</a></li>
			<li><a href="UpdatePatient.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Update Patient</a></li>
			<li><a href="ViewAppointment.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">View Appointments</a></li>
			<li><a href="patientrecord.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">View Patient Record</a></li>
			<li class="nav navbar-nav pull-right"><a href="logout.php" class="btn btn-info btn-lg" >
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a></li>
			<?php }
			else{
			?>
			</ul>
		<ul class="nav navbar-nav pull-right">
			<li><a href="login.php">Login/Signup</a></li>
			<li><a href="login.php"><font color="black">Login/Signup</font></a></li>
			<?php 
				}
			?>
		
			<?php
				if(!(isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"])){
			?>
			
  
			
    	<div class="w3-top">
		<div class="w3-bar w3-blue w3-card w3-left-align w3-large">
			
			<li class="active"><a href="login.php" class="navbar-brand w3-button w3-padding-large w3-white">Login/Signup</a></li>
			<?php 
				}
			?>
		</ul>
		
		</div>
	</nav>
    