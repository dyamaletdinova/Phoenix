<?php
//include headers and database class
  include '../MainPage/mainheader.php5';
  include '../MainPage/header.php5';
  include '../ProjectDAO.php5';
  //error_reporting(E_ALL);
  //error_reporting(E_ALL ^ E_NOTICE);

  $updateRecId = $_GET['user_id'];
  $daoObject = new ProjectDAO();
  //connect to db
  if($daoObject->connectToDB() < 0){
    //echo "Error in connection";
  }
  //call deleteUserDataFromDBForUpdate method and pass the recId
  $daoObject->deleteUserDataFromDBForUpdate($updateRecId);
  $daoObject->closeDBconnection(); //close the db connection
  $displayMsg ="Dear <span>$firstName $lastName</span>";     //user friendly msg  
?>

  <div id="section_header">
    <div class="container">
      <h2><?php echo $displayMsg; ?></h2>
    </div>
  </div>
  <div class="centertextinmain">
  <h4>Your record was successfully <span>deleted</span>.</h4>
    <h4>Please <a href = 'feedback.php5'><span>view</span></a> your results!</h4>
  </div> 

  <br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- Footer and Bootstrap core JavaScript -->
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>
