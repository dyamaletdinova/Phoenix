<?php
    //including the class sessionManager that has a method to log out from the session
	include '../SessionManager.php5';
	$sessionObject = new SessionManager();
	$sessionObject->destroySession();
	header('Location: login.php5');//redirect to the login page
?>