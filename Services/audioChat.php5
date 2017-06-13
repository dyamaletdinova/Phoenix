<?php
//include headers and database class
  include '../MainPage/mainheader.php5';
  include '../MainPage/header.php5';
  include '../ProjectDAO.php5';
  //error_reporting(E_ALL);
  //error_reporting(E_ALL ^ E_NOTICE);

  ?>
  <div id="section_header">
    <div class="container">
      <h2><span>Welcome to Audio Chat!</span></h2>
    </div>
  </div>

<div class="contact">
	<div class="container">
		<div class="centertextinmain">
		  <img  src="../images/mic.PNG" align=""> 

			  <form id="form"> 
				  <div class="form_details"> 
				  	<p>
				  		<button class="btn" style="background-color:green">Call</button>
				  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  		<a href="afterLogin.php5"<button class="btn" >Cancel</button></a>
				  	</p>
				  </div>
			  </form> 

			  <!-- Begin Fresh Tilled Soil Video Chat Embed Code -->
			<div id="freshtilledsoil_embed_widget" class="video-chat-widget"></div>
			<script id="fts" src="http://freshtilledsoil.com/embed/webrtc-v5.js?r=FTS0316-CZ6NqG97"></script>
			<!-- End Fresh Tilled Soil Video Chat Embed Code -->
		</div>
	</div>
</div>	
		
<?php
  include '../MainPage/footer.php5';
  include '../MainPage/mainfooter.php5';
?>