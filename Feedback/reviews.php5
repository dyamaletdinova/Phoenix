<?php
	include '../MainPage/mainheader.php5';
	include '../MainPage/header.php5';
	include '../ProjectDAO.php5';
	include 'DisplayStars.php5';
	//error_reporting(E_ALL);
	//error_reporting(E_ALL ^ E_NOTICE);

	$daoObject = new ProjectDAO();
	$displayStarsObject = new DisplayStars();
	$currentUser = $sessionObject->getSessionAttribute('userID');

	if($daoObject->connectToDB() < 0){
	//echo "Error in connection";
	}
	$reviewee = $_GET['user_id'];
	//echo "who reviewed $reviewee<br>";

	$userWhoWasReviewedName= $daoObject->selectUsersNameForRatingDisplay($reviewee);
	$resultArray= $daoObject->displayUserRatingFromDB($reviewee);
    $avgRating= $daoObject->selectAverageRatingDisplay($reviewee);
    $starsOutput = $displayStarsObject->displayStarsRating($avgRating);
    /*$whoGaveReview = $daoObject->selectPersonWhoGaveReview($currentUser);
	if ( !empty($whoGaveReview) )
	{
		foreach ($whoGaveReview as $value){
			$userFirstName = $value["userFirstName"];
			$userLastName = $value["userLastName"];
			echo $userFirstName." ".$userLastName;
		}
	}*/

    //echo "Gave Review $whoGaveReview<br>";
	$daoObject->closeDBconnection();//close DB
	$displayUserData = "<table class='table'>";
	$displayUserData .= "<caption><h3>Reviews for $userWhoWasReviewedName <br> $starsOutput</caption> ";
	$displayUserData .= "<table><tr><th>First Name</th><th>Last Name</th><th>Comment</th><th>Rating</th></tr>";		
		
	if ( !empty($resultArray) )
	{
		foreach ($resultArray as $value){
			//wrap the text if its too long
			$comment = $value["userComment"];
			$wrapped_comment = wordwrap($comment, 45, "<br/>\n");
			
			$displayUserData .= "<tr><td>";
			$displayUserData .= $value["userFirstName"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $value["userLastName"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $wrapped_comment;
			$displayUserData .= "</td><td>";
			$displayUserData .= $displayStarsObject->displayStarsRating($value["userRating"]);
			$displayUserData .= "</td></tr>";    
		}
		$displayUserData .= "</table>";
	}
	else{
		$displayUserData .= "<tr><td colspan=5>";
		$displayUserData .= "<h4>There is no reviews for $userWhoWasReviewedName.<br>Be the first to give your review.</h4>";
		$displayUserData .= "</td></tr>";    
		$displayUserData .= "</table>";
	}
?>
	<div id="section_header">
		<div class="container">
			<h2><span>Rating</span></h2>
		</div>
	</div>
	<div class="centertextinmain">
		<h4>Click <a href="feedbackForm.php5?user_id=<?php echo $reviewee; ?>"><span>here</span> to leave your review.</a></h4>
			<div class='userResultsTable'>
				<p><?php echo $displayUserData; ?></p>
			</div>
		<h4>Go <a href="feedback.php5"><span>back</span>.</a></h4>
		  
	</div>
	<br><br><br><br><br>
	<!-- Footer and Bootstrap core JavaScript-->
<?php
	include '../MainPage/footer.php5';
	include '../MainPage/mainfooter.php5';
?>