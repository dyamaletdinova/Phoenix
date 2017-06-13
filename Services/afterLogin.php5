<?php
//include headers and database class
  include '../MainPage/mainheader.php5';
  include '../MainPage/header.php5';
  include '../ProjectDAO.php5';
  //error_reporting(E_ALL);
  //error_reporting(E_ALL ^ E_NOTICE);

  //using the session pobj chack if the user exist in db
  //if yes - get his role
  if ( $sessionObject->checkIfValidUserExist() === 0){

    $userRole = $sessionObject->getSessionAttribute('userRole');
    //instantiate a new obj of the database class
    $daoObject = new ProjectDAO();
    //connect to db
    if($daoObject->connectToDB() < 0){
      //echo "Error in connection";
    }
    //get the user's id using GET

    //assign the rsult of the displayUsersFromDB() method to the resultArray var to display on the page
    $resultArray= $daoObject->displayUsersFromDB($userRole);
    //while array is not empty, loop through it and assign the results to the displayUserData var
    if ( !empty($resultArray) )
    {
      $displayUserData = "<table>";//ctate a table
      $displayUserData .= "<caption><h3>Who is online:</caption> ";
      $displayUserData .= "<tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>About the user</th><th>Get Connected</th>";
      //for each element in the array - get the key and the value
      foreach ($resultArray as $value){
          $displayUserData .= "<tr><td>";
          $displayUserData .= $value["userFirstName"];
          $displayUserData .= "</td><td>";
          $displayUserData .= $value["userLastName"];
          $displayUserData .= "</td><td>";
          $displayUserData .= $value["userGender"];
          $displayUserData .= "</td><td>";
          $displayUserData .= $value['userAbout'];
          $displayUserData .= "</td><td>";
          $displayUserData .= "<a <a href = 'audioChat.php5?user_id=$reviewee'> <p><span>Chat</span></p> </a>";
          $displayUserData .= "</td></tr>";        
      }
      $displayUserData .= "</table>";
    } //if array is empty, display the message to the user
    else{
      $displayUserData ="<br><br><br><br>";
      $displayUserData .= "<h2>I got nothing for you, Sorry</h2>";
      $displayUserData .="<br><br><br><br><br>";
    }  
      $daoObject->closeDBconnection(); //close the connection to db
  }
 
?>
  <div id="section_header">
    <div class="container">
      <h2><span>Our Services</span></h2>
    </div>
  </div>

  <div class="centertextinmain">
    <h4>Please select one of the users to start a conversation.</h4>
  </div>
  
  <div class='userResultsTable'>
      <?php echo $displayUserData;?>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- Footer and Bootstrap core JavaScript-->
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>