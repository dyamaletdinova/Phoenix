<?php
  //include main headers
  include '../MainPage/mainheader.php5';
  include '../MainPage/header.php5';
  include '../Register/Registration.php5'; //registration class
  include '../ProjectDAO.php5';//database class
  //error_reporting(E_ALL);
  //error_reporting(E_ALL ^ E_NOTICE);

  $daoObject = new ProjectDAO();//instantiating new obj of ProjectDAO class
  //call the connection method to connect ot DB
  if($daoObject->connectToDB() < 0){
    //$message= "Error in connection";
  }

 //if form is submitted assign the variables from te post
  //and call the update method to update data in db
  if( isset($_POST['submit']) ) 
  {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $about = $_POST['about_you'];
    $updateRecId = $_POST['user_id'];

    //we are not checking for failure here because the class projectDAO throws an error if something will go wrong
    $daoObject->updateUserDataInDB($firstName,$lastName,$gender,$email,$password,$role,$about,$updateRecId);
    $displayMsg ="Dear <span>$firstName $lastName</span>"; 
    //using the sessiobObject of the user's role if it was changed in the form
    $sessionObject->setSessionAttribute('userRole',$role);
  }
  //if the form is not submitted display the form
  //and use the selectUserDataFromDBForUpdate() to display the data from db for update & delete
  else{
    $updateRecId = $_GET['user_id'];
    $resultArray= $daoObject->selectUserDataFromDBForUpdate($updateRecId);
    //get the array from selectUserDataFromDBForUpdate() method ad display the data
    if ( !empty($resultArray) )
    {
      //for each element form the array assign the value to the var so you can use it laer in the form
      foreach ($resultArray as $key => $value){
        $firstName = $value["userFirstName"];
        $lastName = $value["userLastName"];
        $gender = $value["userGender"];
        $email = $value['userEmail'];
        $password = $value['userPassword'];
        $role = $value['userRole'];
        $about = $value['userAbout'];
      }
    }
    //else display the message to the user that there is nothing to display
    else{
      $displayMsg = "<h2>I got nothing for you, Sorry</h2>";
    }  
    $daoObject->closeDBconnection(); //close the connection to db
  }
  ?>


<?php
  "<br><br><br>";//alligns the page after the registration
  if(!isset($_POST['submit']) )   //Checks to see if the form data was entered and submitted to this page, if not then display the form
  {
?>
    <div id="section_header">
      <div class="container">
        <h2><span>Update the record</span></h2>
        <h4><a href="feedback.php5">Back to selection.</a></h4>
      </div>
    </div>

    <div class="contact">
      <div class="container">
        <div class="col-md-6">
          <h3>It's easy to update your record</h3>
          <p><span>Update your record in a few easy steps.</span></p>
          <p><span>Click 'Update' when you are done.</span></p>
        </div>

        <div class="col-md-6">
          <h3>Enter new information:</h3>
          <form id="form" name="form" method="post" onsubmit="return(validate());" action="registerForm.php5">
            <div class="form_details">

             <p><label class = "labelradio"> Female:</label>  
               <input type="radio" class="text" name="gender" value="female" required>	

               <label class = "labelradio"> Male:</label> 
               <input type="radio" class="text" name="gender" value="male" required>
             </p>

             <p><label>First Name:</label> 
              <input type="text" class="text" id = "firstName" name = "firstName" placeholder = "First Name" value="<?php echo $firstName; ?>" required>
             </p>

            <p><label>Last Name:</label> 
              <input type="text" class="text" id="lastName" name="lastName" placeholder = "Last Name" value="<?php echo $lastName; ?>" required>
            </p>

            <p><label>Email:</label> 
              <input type="text" class="text" id="email"name="email" placeholder = "Email Address" value="<?php echo $email; ?>" required>
            </p>

            <p><label>Password:</label> 
              <input type="text" id ="password"  class="text" name="password" placeholder = "Password" value="<?php echo $password; ?>" required>
            </p>

            <p><labell class = "labelradio">Listener:</label> 
             <input type="radio" class="text" name="role" value="listener" required> 

             <label class = "labelradio">Help Seeker: </label>
             <input type="radio" class="text" name="role" value="helpseeker" required>
           </p>

           <input type="hidden" name="user_id" id="user_id" value="<?php echo $updateRecId; ?>" required/>

           <p>Tell us about yourself: 
            <label>
              <textarea name="about_you" value="<?php echo $about; ?>" ><?php echo $about; ?></textarea>
            </label></p>
            <div class="clearfix"> </div>
            <button class="btn" id ="submit" name="submit" type="submit">Update</button>
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
      <h2><?php echo $displayMsg; ?></h2>
    </div>
  </div>
  <div class="centertextinmain">
  <h4>Your record was successfully <span>updated</span>.</h4>
    <h4>Please <a href = 'feedback.php5'><span>view</span></a> your results!</h4>
  </div> 
    <br><br><br><br><br><br><br><br><br><br>
<?php
  }//ends else branch and the if statement
?>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- Footer and Bootstrap core JavaScript-->
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>