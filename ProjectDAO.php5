<?php
/*
* Class that inplements the basic sql processing
* - connects to the DB
* - closes the connection to DB
* - inserts data to DB when user registeres 
*/
class ProjectDAO {
	private $mysqli; // variable DB connection 
	private $query;
	/*
	* Class connects to the DB
	*/
	public function connectToDB (){
		$IP = "localhost";
	    $user = "ref";
	    $pass = "1234";
	    $db = "register_HP";

	    //php syntax to access variables, it references the object
		$this->mysqli = new mysqli("localhost","ref", "abcd1234", "register_HP");
	    // Check connection
	    //if the connection failed return -1, othervice return 0
	    if ($this->mysqli->connect_error) {  
	       return -1;
	    }  
		return 0;
	}

	/*
	* Class closes the connection to DB
	*/
	public function closeDBconnection(){
		mysqli_close($this->mysqli);	
	}

	/*
	* Class inserts data to DB when user registered
	* takes fname, lname, gender, email, passwrd, role, about as param from the user input
	*/
	public function registerUserSql($fName,$lName,$gender,$email,$password,$role,$about){

		$sql = "SELECT firstName FROM user_data WHERE email = ?";
		$query = $this->mysqli->prepare($sql);
      	$query->bind_param("s",$email); //bind parameters to prepared statement
      	$query->bind_result($firstName); 
      	$query->execute() or die("<p>Email address already exists </p>" );
      	$query->store_result();
		$rowCount = $query->num_rows;
     	if ( $rowCount > 0) 
   		{
   			//email already exists in the DB
   			return -1;
   		}
			//create the insert sgl command
   		$sql = "INSERT INTO user_data (firstName, lastName, gender, email, password,role, about_you) VALUES (?, ?, ?, ?, ?, ?, ?)";

		$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
	    $query->bind_param("sssssss",$fName,$lName,$gender,$email,$password,$role,$about); //bind parameters to prepared statement

	    //You can't use bind_result with an INSERT query. It doesn't have a result.
		//Run the SQL command using the database you connected to
		//Test to see if the query was successful or had a problem.
		//Returns TRUE on success or FALSE on failure. 
	    if ($query->execute())
	    {
	    	return 0;
	    }
	    //problem with the insert query		
		return -2;	
	}

	/*
	* Class that checks if the user excist in DB
	* it takes two param - username and password
	*/
	public function checkIfUserExistInDB($inUsername,$inPassword){

	  $sql = "SELECT user_id, firstName, role FROM user_data WHERE email = ? AND password = ?";             
      $query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
      $query->bind_param("ss",$inUsername,$inPassword); //bind parameters to prepared statement
      $query->execute() or die("<p>No such user </p>" );
      $query->bind_result($currentUser,$firstName,$role); 
      //$query->bind_result(); 
      $query->store_result(); 
      $query->fetch(); 
      $rowCount = $query->num_rows;
      $query->close();
      if ($rowCount == 1 ) //If this is a valid user there should be ONE row only
      {
         //this is a valid user so set your SESSION variable
        $_SESSION['validUser'] = $firstName;
        $_SESSION['userRole'] = $role;
        $_SESSION['userID'] = $currentUser;

		return 0;
      }
	  return -1;      
	}

	/*
	* Class that display users from a DB
	* it takes one param - a role of the user
	*/
	public function displayUsersFromDB($role){

		$sql = "SELECT firstName, lastName, gender, about_you FROM user_data WHERE role <> ?";
		$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
      	$query->bind_param("s",$role); //bind parameters to prepared statement
      	$query->bind_result($firstName,$lastName,$gender,$about_you); 
      	$query->execute() or die("<p>We can't display the data </p>" );
      	$query->store_result();
     //using an array to store the rsults of the sql query
     	$userDataAarray = array();
     	$rowCount = $query->num_rows;
     	if ( $rowCount > 0) 
   		{
	     	while($query->fetch()){
	     		$userDataAarray[] = array(
	     			"userFirstName"=>$firstName,
	     			"userLastName"=>$lastName,
	     			"userGender"=>$gender,
	     			"userAbout"=>$about_you
	     			);
	     	}
		} 
		$query->close();//close the quety and return the result array 
     	return $userDataAarray;
	}


	

	/*
	* Class that selects User Data From DB For Update on the update registration page
	* it takes one param - $updateRecId
	*/
	public function selectUserDataFromDBForUpdate($updateRecId){

		$sql = "SELECT firstName, lastName, gender, email, password, role, about_you FROM user_data WHERE user_id =?";
	  	$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
      	$query->bind_param("s",$updateRecId); //bind parameters to prepared statement
      	$query->bind_result($firstName,$lastName,$gender,$email,$password,$role,$about_you); 
      	$query->execute() or die("<p>Can't display the data </p>" );
      	$query->store_result();
        //using an array to store the rsults of the sql query
     	$userDataAarray = array();

	    if ($query->num_rows !=0) 
   		{
	     	while($query->fetch()) {
	     			$userDataAarray[] = array(
	     			"userFirstName"=>$firstName,
	     			"userLastName"=>$lastName,
	     			"userGender"=>$gender,
	     			"userEmail" =>$email,
	     			"userPassword"=>$password,
	     			"userRole"=>$role,
	     			"userAbout"=>$about_you
	     		);
	     	}
		} 
		$query->close();//close the quety and return the result array 
     	return $userDataAarray;
	}

	/*
	* Class that updates data on the feedback page
	* @param - $fName,$lName,$gender,$email,$password,$role,$about
	*/
	public function updateUserDataInDB($firstName,$lastName,$gender,$email,$password,$role,$about,$updateRecId){

		$sql = "UPDATE user_data SET firstName=?, lastName=?, gender=?, email=?, password=?,role=?, about_you=? WHERE user_id=?";
        $query = $this->mysqli->prepare($sql) or die("<p>Can't update the data</p>");
        $query->bind_param('ssssssss',$firstName,$lastName,$gender,$email,$password,$role,$about,$updateRecId);
        $query->store_result(); 
        $query->fetch();
        if($query->execute()){
            return 0;    
        }
		return -1;		
	}
	
	/*
	* Class that deletes User Data From DB For Delete on the feedback page
	* it takes one param - $updateRecId
	*/
	public function deleteUserDataFromDBForUpdate($updateRecId){
	
		$sql = "DELETE FROM user_data WHERE user_id=?";	
		$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");
		$query->bind_param("s",$updateRecId);
		if($query->execute()){
   			return 0;        
        }
		return -1;
	}

	/*
	* Class that displays all data from the DB on the feedback page
	*/
	public function displayAllUsersFromDB(){

		$sql = "SELECT user_id, firstName, lastName, gender, email, password,role, about_you FROM user_data";
		$query = $this->mysqli->prepare($sql);
      	$query->bind_result($user_id,$firstName,$lastName,$gender,$email,$password,$role,$about_you); 
      	$query->execute() or die("<p>Execution </p>" );
      	$query->store_result();
        //using an array to store the rsults of the sql query
     	$userDataAarray = array();
     	$rowCount = $query->num_rows;
     	if ( $rowCount > 0 ) 
   		{
	     	while($query->fetch()){
	     		$userDataAarray[] = array(
	     			"userFirstName"=>$firstName,
	     			"userLastName"=>$lastName,
	     			"userGender"=>$gender,
	     			"userEmail"=>$email,
	     			"userPassword"=>$password,
	     			"userRole"=>$role,
	     			"userAbout"=>$about_you,
	     			"userID"=>$user_id
	     			);
	     	}
		} 
		$query->close();//close the quety and return the result array 
     	return $userDataAarray;
	}

	/*
	* Class that stores the rating into the DB
	*/
	public function saveRatingIntoDB($currentUser, $user_id,$rating,$comment,$reviewerName){

		//create the insert sgl command
   		$sql = "INSERT INTO feedback (reviewer_id, user_id, rating, comment, reviewer_name) VALUES (?, ?, ?, ?, ?)";
   		//echo $currentUser, $user_id,$rating,$comment,$reviewerName;

		$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
	    $query->bind_param("sssss",$currentUser,$user_id,$rating,$comment, $reviewerName); //bind parameters to prepared statement

	    //You can't use bind_result with an INSERT query. It doesn't have a result.
		//Run the SQL command using the database you connected to
		//Test to see if the query was successful or had a problem.
		//Returns TRUE on success or FALSE on failure. 
	    if ($query->execute())
	    {
	    	return 0;
	    }
	    //problem with the insert query		
		return -1;	
	}

	/*
	* Class that displays the rating from DB
	*/
	public function displayUserRatingFromDB($reviewee){

		//complex sql command using that joints two tables to get the data
		//this statements gets the fName, lName of the user who gave the review,
		//and displays them along with the comments,and ratings
		$sql = "SELECT u.firstName, u.LastName, f.comment, f.rating, f.reviewer_id, f.user_id  FROM feedback f, user_data u WHERE f.reviewer_id = u.user_id AND f.user_id = ? ";
		$query = $this->mysqli->prepare($sql);
		$query->bind_param("s",$reviewee); //bind parameters to prepared statement
      	$query->bind_result($firstName,$lastName,$comment,$rating,$reviewer_id,$user_id); 
      	$query->execute() or die("<p>Execution </p>" );
      	$query->store_result();
        //using an array to store the rsults of the sql query
     	$userDataAarray = array();
     	$rowCount = $query->num_rows;
     	if ( $rowCount > 0 ) 
   		{	
	     	while($query->fetch()){
	     		$userDataAarray[] = array(
	     			"userFirstName"=>$firstName,
	     			"userLastName"=>$lastName,
	     			"userComment"=>$comment,
	     			"userRating"=>$rating		
	     			);
	     	}
		} 
		$query->close();//close the quety and return the result array 
     	return $userDataAarray;
	}
	/*
	* selects the name of the user that was selected to see the ratings and reviews
	*
	*/
	public function selectUsersNameForRatingDisplay($user_id){
		$sql = "SELECT firstName FROM user_data WHERE user_id =?";
	  	$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
      	$query->bind_param("s",$user_id); //bind parameters to prepared statement
      	$query->bind_result($firstName); 
      	$query->execute() or die("<p>Can't display the data </p>" );
      	$query->store_result(); 
        $query->fetch(); 
        $rowCount = $query->num_rows;
        $query->close();
        if ($rowCount == 1 ) //If this is a valid user there should be ONE row only
        { 
			return $firstName;
        }
	    return -1;      
	}

	/*
	* Method that displays the aveage rating for the person that was selected 
	* to see the ratings and reviews
	* based on the user's id
	*/
	public function selectAverageRatingDisplay($user_id){

		//the query displays the average rating where user id in feedback table=user id in user_data table
		$sql = "SELECT AVG(f.rating) FROM feedback f INNER JOIN user_data u ON f.user_id = u.user_id AND f.user_id = ?";
	  	$query = $this->mysqli->prepare($sql) or die("<p>SQL String: $sql</p>");  //prepare the query
      	$query->bind_param("s",$user_id); //bind parameters to prepared statement
      	$query->bind_result($avgRating); 
      	$query->execute() or die("<p>Can't display the data </p>" );
      	$query->store_result(); 
        $query->fetch(); 
        $rowCount = $query->num_rows;
        $query->close();
        if ($rowCount == 1 ) //If this is a valid user there should be ONE row only
        { 
			return $avgRating;
        }
	    return -1;      
	}

}

?>