<?php
   //include headers
	include '../MainPage/mainheader.php5';
	include '../MainPage/header.php5';
?>
	<!-- Slider -->
	<div class="header-banner"> 
	<script src="../js/responsiveslides.min.js"></script> 
	<script>
		$(function () {
			$("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
			});
		});
	</script>
	<div class="container">
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li> <img src="../images/fight3.jpg" alt="">
					<div class="caption">
						<h1><br><br>Resolve Your Conflict Fast<span>.</span></h1>
						<p>Your identity is protected. Your problem is solved!</p>
						<a href="../Services/services.php5" class="btn">More Info</a> </div>
					</li>
					<li> <img src="../images/teens.jpg" alt="">
						<div class="caption">
						<h1><br><br>Get Independent Oppinions<span>.</span></h1>
						<p>If you want to get an oppinion from someone who has no interest in results - you will get it here!</p>
						<a href="../Services/services.php5" class="btn">More Info</a> </div>
					</li>
					<li> <img src="../images/fight2.jpg" alt="">
						<div class="caption">
						<h1><br><br>Say NO to Arguments<span>.</span></h1>
						<p>Get back the control over your life with no arguments.</p>
						<a href="../Services/services.php5" class="btn">More Info</a> </div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<!-- Welcome Section -->
	<div id="section_header">
		<h2><span>Welcome</span> to our website!</h2>
	</div>
	<div id="welcome">
		<div class="container">
			<div class="col-md-6"> <img class="img-responsive" src="../images/teens-arguing.jpg" align=""> </div>
				<div class="col-md-6">
					<h3>About us</h3>
					<p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est. Saepe dolorum constituam ei vel. Te sit malorum ceteros repudiandae, ne tritani adipisci vis.</p>
					<p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est.</p>
					<a href="../About us/about.php5" class="btn">More</a> </div>
				</div>
			</div>
		</div>

	<!-- What we do Section -->
	<!--<div id="section_header">
	<h2><span>What</span> we do</h2>
	</div>
	<div id="main-services">
	<div class="container">
	<div class="row">
	<div class="col-lg-4 centered"> <i class="fa fa-gears fa-3x"></i>
	<h3>Aenean nonummy</h3>
	<p>Erat imperdiet dissentias ea usu, alia aliquid corrumpit ea qui. Eu vim oratio conclusionemque, vel at errem nominavi delicatissimi.</p>
	<a href="services.html" class="btn">More</a> </div>
	<div class="col-lg-4 centered"> <i class="fa fa-briefcase fa-3x"></i>
	<h3>Praesent vestibulum</h3>
	<p>Erat imperdiet dissentias ea usu, alia aliquid corrumpit ea qui. Eu vim oratio conclusionemque, vel at errem nominavi delicatissimi.</p>
	<a href="../Servises/services.php5" class="btn">More</a> </div>
	<div class="col-lg-4 centered"> <i class="fa fa-line-chart fa-3x"></i>
	<h3>Erat imperdiet</h3>
	<p>Erat imperdiet dissentias ea usu, alia aliquid corrumpit ea qui. Eu vim oratio conclusionemque, vel at errem nominavi delicatissimi.</p>
	<a href="../Servises/services.php5" class="btn">More</a> </div>
	</div>
	</div>
	</div>-->
	<!-- Our clients Section -->
	<div id="section_header">
		<h2><span>Follow</span> us</h2>
	</div>
	<div id="clients">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2"> <img src="../images/client1.jpg" class="img-responsive"> </div>
				<div class="col-lg-2"> <img src="../images/client2.jpg" class="img-responsive"> </div>
				<div class="col-lg-2"> <img src="../images/client3.jpg" class="img-responsive"> </div>
				<div class="col-lg-2"> <img src="../images/client4.jpg" class="img-responsive"> </div>
				<div class="col-lg-2"> <img src="../images/client5.jpg" class="img-responsive"> </div>
				<div class="col-lg-2"> <img src="../images/client6.jpg" class="img-responsive"> </div>
			</div>
		</div>
	</div>
	<!-- Footer and Bootstrap core JavaScript -->
<?php
	include '../MainPage/footer.php5';
	include '../MainPage/mainfooter.php5';
?>