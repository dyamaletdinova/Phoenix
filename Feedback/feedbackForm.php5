<?php
	include '../MainPage/mainheader.php5';
	include '../MainPage/header.php5';
	include '../ProjectDAO.php5';
	//error_reporting(E_ALL);
	//error_reporting(E_ALL ^ E_NOTICE);

	$daoObject = new ProjectDAO();//instantiating new obj of ProjectDAO class
	 if($daoObject->connectToDB() < 0){
    	//$message= "Error in connection";
     }
	$reviewee = $_GET['user_id'];
	//echo $reviewee;
	
	$currentUser = $sessionObject->getSessionAttribute('userID');
	//echo "hello $currentUser";
	//echo "<br>";
    if( isset($_POST['submit']) ) 
    {
    	$reviewee = $_POST['user_id'];
    	$rating = $_POST['rating'];
      	$comment = $_POST['comment'];
      	$reviewer = $_POST['reviewer'];
      	$reviewerName = $_POST['reviewer'];
    	//echo $reviewee, $rating, $currentUser, $comment, $reviewerName;
    	//echo "<br>";

    	$result = $daoObject->saveRatingIntoDB($currentUser,$reviewee,$rating,$comment,$reviewerName);
	    if ($result === 0){
		    $displayMsg ="<h2>Thanks for your review</h2>";
		    $displayMsg .="<h2>Please <a href = 'reviews.php5?user_id=$reviewee'><span>view</span></a> your results!</h2>";
		}
		else{
			$displayMsg ="<h2>Oops, something went wrong.</h2>";
		}
    }
     //if the form is not submitted display the form
    //and use the selectUserDataFromDBForUpdate() to display the data from db for update & delete
?>
<?php
  "<br><br><br>";//alligns the page after the registration
  if( $result < 0 || !isset($_POST['submit']) )   //Checks to see if the form data was entered and submitted to this page, if not then display the form
  {
?>
    <div id="section_header">
      <div class="container">
        <h2><span>Rating</span></h2>
        <h4><a href="reviews.php5">Back to selection.</a></h4>
      </div>
    </div>

    <div class="contact">
      <div class="container">
        <div class="col-md-6">
          <h3>See the what other people said.</h3>
          <h3><span><a href = 'reviews.php5'><span>Reviews.</span></a></span></h3>       </div>

  <div class="col-md-6">
	<form  id="form" name="form" method="post"  action="feedbackForm.php5" name="review_form">
	<div class="form_details">
		<h4>Your Review</h4>
		<p><input type="radio" class="text" name="rating" value="5" required>	
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating"></p>

		<p><input type="radio" class="text" name="rating" value="4" required>	
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating"></p>		

		<p><input type="radio" class="text" name="rating" value="3" required>	
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating"></p>

		<p><input type="radio" class="text" name="rating" value="2" required>	
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating"></p>

		<p><input type="radio" class="text" name="rating" value="1" required>	
		<img src="../images/gold_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating">
		<img src="../images/empty_star.png" width = "30" height = "30" alt="rating"></p>

		<input type="hidden" name="user_id" id="user_id" value="<?php echo $reviewee; ?>" required/>

		<p><label>Your Name: </label>
		<input class="text" type="text" name="reviewer" id="reviewer" ></p>
		<p><label>Comments: </label>
		<textarea name="comment" ></textarea></p>
		<div class="clearfix"> </div>
		<button class="btn" id ="submit" name="submit" type="submit">Submit Review</button>
	</div>
	</form>
      </div>
    </div>
  </div>
 <?php //The form has been submitted, the data processed, display a confirmation message instead of the form
  }
  else 
  {
?>
  <div id="section_header">
    <div class="container">
      <h2>Dear <span><?php echo $reviewer; ?></span>,</h2>
      <h1><?php echo $displayMsg; ?></h1>
    </div>
  </div>
  <br><br><br><br><br><br><br>
<?php
  }//ends else branch and the if statement
?>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- Footer and Bootstrap core JavaScript-->
<?php
	include '../MainPage/footer.php5';
	include '../MainPage/mainfooter.php5';
?>