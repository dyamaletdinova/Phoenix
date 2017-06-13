<?php

  //include sessionManager on the top of each page
  //by adding these lnes of code o the header file that is sncluded on each pge, 
  //and start the session on top of each page, ереф way you 
  //dont havet to deal with it later on other pages
  include '../SessionManager.php5';
  $sessionObject = new SessionManager();
  $sessionObject->startSession(); //start the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Phoenix</title>
		<!-- Bootstrap -->
			<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>
			<!-- Font Awesome  -->
			<link href="../css/font-awesome.min.css" rel="stylesheet">
			<!-- Web Font  -->
			<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
			<!-- Custom CSS -->
			<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
			<script src="../js/jquery.min.js"></script>
				</head>
				<body>