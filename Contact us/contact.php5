<?php
  //include headers
  include '../MainPage/mainheader.php5';
  include '../MainPage/header.php5';
  include 'Email.php5'; //Email class
  error_reporting(E_ALL);
  error_reporting(E_ALL ^ E_NOTICE);

  //if the user clicked submit - instantiating a new object of Email class
  //and setting the variables and calling tmethodsof Email function
  //
  if( isset($_POST['submit']) )
  {  
    $emailObject = new Email();
    $emailObject->setName($_POST['name']);
    $emailObject->setSubject($_POST["subject"]);
    $emailObject->setMessage($_POST["message"]); 
    //calling the sendMail method 
    $result = $emailObject->sendMail();//assigning the results of the sendMail function oto result var
    $message = "You have submitted the form. We will come back to you later.";
  }
  else 
  {
    // if the form has not seen by the user display the form so
    //the user can enter their data.
    $message = "Please enter your information on the form.";
    include 'contactform.php5';
  }

  //if the sendMail method sent email to the owner, display friendly message for the user
  if ($result)
  {
?>
      <div id="section_header">
        <div class="container">
          <h3>Dear <span><?php echo $emailObject->getName(); ?>,</span> </h3>
        </div>
      </div>

      <div class="centertextinmain">
        <h4>Your message regarding <span><?php echo $emailObject->getSubject(); ?></span> successfully sent!</h4>
        <h4>We will review your message and reply to you within a week.</h4>
      </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
  }//ends else branch and the if statement
?>
<br><br><br><br><br><br><br><br><br><br>
  <!-- Footer and Bootstrap core JavaScript-->
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>