<?php
//include headers and the database and registration classes
  include '../MainPage/mainheader.php5';
  include '../MainPage/header.php5';
  include '../ProjectDAO.php5';
  include 'Registration.php5'; 

  //error_reporting(E_ALL);
  //error_reporting(E_ALL ^ E_NOTICE);

  $daoObject = new ProjectDAO();//object of the database class

  if($daoObject->connectToDB() < 0){
  //$message= "Error in connection";
  }

  $result = 1; //set it to not null for the checks later
  $message = ""; //setting an empty session

  if( isset($_POST['submit']) )//Checks to see if the form data was entered and submitted to this page, if not then display the form
  {  
    $registrObject = new Registration(); 
    $registrObject->setFirstName($_POST['firstName']);
    $registrObject->setLastName($_POST['lastName']);
    $registrObject->setGender($_POST['gender']);
    $registrObject->setEmail($_POST['email']);
    $registrObject->setPassword($_POST['password']);
    $registrObject->setRole($_POST['role']);
    $registrObject->setAbout($_POST['about']);
    $registrObject->setRegistrationDate();
   //using the object of DB class calling the method registerUserSql() to register user and save data to DB
    //passing registrObject results as a parameters
  $result = $daoObject->registerUserSql( $registrObject->getFirstName(),$registrObject->getLastName(),$registrObject->getGender(),$registrObject->getEmail(),$registrObject->getPassword(),$registrObject->getRole(),$registrObject->getAbout() );

//chack if the result is 0 (true) inform that user registered
  if ($result === 0)
  {
    $message = "Thank you for registering.<br>Please keep the following information available as your registration data:";        
  }//if the result is - that means that the user already exsist in DB (email is a unique key)
  else if ($result === -1)
  {
    $message = "User already exists in the database. Please enter new information on the form.";
  } //if the result is -2 than something went wrong with actual insert statement, we won't show that message to the user
  //but just inform that someting went wrong and try again later
  else if  ($result === -2)
  {
    $message = "Something went wrong, please try again later";
  }
    $daoObject->closeDBconnection();//close the connection to db
  }

  //if result is false, and the form is not submitted display the form
  if($result < 0 || !isset($_POST['submit'])) 
  {
    include 'registrationform.php5';
  }//else display the message that user registered
  else 
  {
?>
  <div id="section_header">
    <div class="container">
      <h3>Dear <span><?php echo $registrObject->getFirstName(). " " . $registrObject->getLastName(); ?></span>,</h3>
      <h2><?php echo $message; ?></h2>
      <p>Registration First Name: <span> <?php echo $registrObject->getFirstName(); ?></span><br>
        Registration Last Name: <span><?php echo $registrObject->getLastName(); ?></span><br>
        Login Email: <span><?php echo $registrObject->getEmail(); ?></span><br>
        Password: <span><?php echo $registrObject->getPassword(); ?></span><br>
        Gender: <span><?php echo $registrObject->getGender(); ?></span><br>
        Role: <span><?php echo $registrObject->getRole(); ?></span><br>
        Registration Date: <span><?php echo $registrObject->getRegistrationDate(); ?></span>
      </p>
      <br><br>
      <h3>Welcome to our family!</h3>
      <h3>Please <a href = "../Login/login.php5"><span>login</span></a> to start.</h3>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
  }//ends else branch and the if statement
?>
  <br><br><br>
  <!-- Footer and Bootstrap core JavaScript  -->
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>
