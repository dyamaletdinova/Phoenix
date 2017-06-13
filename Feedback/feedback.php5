<?php
	include '../MainPage/mainheader.php5';
	include '../MainPage/header.php5';
	include '../ProjectDAO.php5';
	//error_reporting(E_ALL);
	//error_reporting(E_ALL ^ E_NOTICE);
	//instantiate the object of the database class
	$daoObject = new ProjectDAO();
	$currentUser = $sessionObject->getSessionAttribute('userID');//get the id of the current user(the one who logged in)
	
    //connect to the database
	if($daoObject->connectToDB() < 0){
		//echo "Error in connection";
	}
	//get the results of the displayAllUsersFromDB() and assign them to array
	$resultArray= $daoObject->displayAllUsersFromDB();
	$daoObject->closeDBconnection();//close DB since we do not need it anymore
	//if the results of the array are not empty, \
	//create a table and get the data for displaying later
	if ( !empty($resultArray) )
	{
		$displayUserData = "<table class='table'>";
		$displayUserData .= "<caption><h3>Database results:</h3></caption> ";
		$displayUserData .= "<tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>Email</th><th>Role</th><th>About the user</th><th colspan=2>Modify Data</th><th>Feedback</th><th></th>";
		//for each element in the array - get the key and the value
		foreach ($resultArray as $value){
			$displayUserData .= "<tr><td>";
			$displayUserData .= $value["userFirstName"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $value["userLastName"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $value["userGender"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $value["userEmail"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $value["userRole"];
			$displayUserData .= "</td><td>";
			$displayUserData .= $value['userAbout'];
			$displayUserData .= "</td><td>";
			//display the update and delete options 
			//only for the same user who logged in
			if ($value['userID'] === $currentUser){
				$displayUserData .= "<a href=\"registerForm.php5?user_id=".$value['userID']."\"><p><span>Update</span></p></a>";
				$displayUserData .= "</td><td>"; 
				$displayUserData .= "<a href=\"deleteUserData.php5?user_id=".$value['userID']."\"><p><span>Delete</span></p></a>"; 
				$displayUserData .= "</td><td>"; 
			}//else disable these buttons
			else{
				$displayUserData .= "";
				$displayUserData .= "</td><td>"; 
				$displayUserData .= ""; 
				$displayUserData .= "</td><td>"; 
			}//however every user able to see all reviews and leave a reviews
			$displayUserData .= "<a href=\"reviews.php5?user_id=".$value['userID']."\"><p><span>Fedback</span></p></a>";
			$displayUserData .= "</td></tr>";    
		}
		$displayUserData .= "</table>";
	} //if array is empty inform the user about that
	else{
		$displayUserData ="<br><br><br><br>";
		$displayUserData .= "<h2>Sorry, there is no data to display.</h2>";
		$displayUserData .="<br><br><br><br><br>";
	}
?>
	<div id="section_header">
		<div class="container">
			<h2><span>Feedback</span></h2>
		</div>
	</div>
	<p><?php echo $displayUserData; ?></p>
	<br><br><br><br><br><br><br><br><br><br><br>
	<!-- Footer and Bootstrap core JavaScript-->
<?php
	include '../MainPage/footer.php5';
	include '../MainPage/mainfooter.php5';
?>