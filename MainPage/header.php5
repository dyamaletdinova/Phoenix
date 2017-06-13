<?php
/*
includes the NavigationHandler method and 
instantiates a new obj $navHandlerObject
and calling a method in each <li> returns class="active"
for html prosessing
*/
  include '../NavigationHandler.php5';
  $navHandlerObject = new NavigationHandler();
?>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../Index/index.php5"><i class="fa fa-sun-o"></i> Phoenix</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li <?php echo $navHandlerObject->setActive('Index'); ?> ><a href="../Index/index.php5">Home</a></li>
        <li <?php echo $navHandlerObject->setActive('About'); ?> ><a href="../About us/about.php5">About us</a></li>
<?php 
//Using the object of sessionManager class check if use is valid
//This is not a valid user - show regular service page
  if ( $sessionObject->checkIfValidUserExist() === -1)
  { 
?>
        <li <?php echo $navHandlerObject -> setActive('Services'); ?> ><a href="../Services/services.php5">Services</a></li>
<?php 
  }
  //This is a valid user show the database results
  //shows the afterLogin and feedback page only after the user logged in
  else 
  { 
?>      <li <?php echo $navHandlerObject -> setActive('Services'); ?> ><a href="../Services/afterLogin.php5">Services</a></li>
        <li <?php echo $navHandlerObject -> setActive('Feedback'); ?> ><a href="../Feedback/feedback.php5">Feedback</a></li>
        
<?php
}
?> 
        <li <?php echo $navHandlerObject -> setActive('Contact'); ?> ><a href="../Contact us/contact.php5">Contact us</a></li>
<?php
  //This is not a valid user show protected pages
  if ( $sessionObject->checkIfValidUserExist() === -1)
  { 
?>         
        <li <?php echo $navHandlerObject->setActive('Login'); ?> ><a href="../Login/login.php5">LogIn</a></li> 
        <li <?php echo $navHandlerObject->setActive('Register'); ?> ><a href="../Register/register.php5">Register</a></li>
<?php
 }//This is a valid user - get the user session and name
  else 
  {   
    $userName = $sessionObject->getSessionAttribute('validUser');
    //display the user's name and logout btn
?>
        <li class = "usernamelabel"><?php echo $userName; ?></li>
        <li><a href = ../Login/logout.php5>LogOut</a></li>
<?php
  }
?>
      </ul>
    </div>
  </div>
</nav>



