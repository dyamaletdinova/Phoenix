<?php
//include the headers
  include '../MainPage/mainheader.php5';
  include '../ProjectDAO.php5';

  //turn error reporting on, 
  //it makes life easier if you make typo in a variable name etc
  //error_reporting(E_ALL);
  //error_reporting(E_ALL ^ E_NOTICE);

  //instantiate a new obj of the databae class
  $daoObject = new ProjectDAO();//

  //if the form submitted, get the values from the form
  if (isset($_POST['submit']) )      //Was this page called from a submitted form?
  {
    $inUsername = $_POST['email'];  //pull the username from the form
    $inPassword = $_POST['password'];  //pull the password from the form

  //call the method to connect to DB
    if($daoObject->connectToDB() < 0){
      //echo "Error in connection";
    }
    //check if the user exist in the DB
    // get the user's name using getSessionAttribute() method
    if ($daoObject->checkIfUserExistInDB($inUsername,$inPassword) === 0)
    {
      $userName = $sessionObject->getSessionAttribute('validUser');
      $messageLoginInfo = "You logged in as $userName"; 
    }//if user does not exist display the message for the user
    else{
      $messageLoginInfo = "The user does not exist. Please try again.";  
    }
    $daoObject->closeDBconnection(); //close the connection to db
  }
  //include header that displays the menu options and user's name with logout option
  //the reason why that in here and not on the top of that page 
  //is because only after the getSessionAttribute() method we know if the user is found and DB and 
  //assign the name the the $userName var in that method
  include '../MainPage/header.php5';
  //if the username is not set and empty, meaning the form wasn't submitted   
  //display the form
  if ( $sessionObject->checkIfValidUserExist() === -1 ){
    include 'loginform.php5';
  } 
  else{  
?>
  <div id="section_header">
    <div class="container">
      <h2><span>Welcome back!</span></h2>
    </div>
  </div>
  <br><br>
  <div class="afterlogindisplay">
    <h3><span> <?php echo $messageLoginInfo; ?>.</span></h3>
    <br>
    <h4>Go to the <a href="../Services/afterLogin.php5"><span>services</span></a> page to get started.</h4>
    <br>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br>
<?php
  }
?>
<br><br><br><br><br><br><br><br><br><br><br>
  <!-- Footer and Bootstrap core JavaScript -->
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>
