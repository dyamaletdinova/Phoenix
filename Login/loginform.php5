<div id="section_header">
  <div class="container">
    <h2><span>LogIn</span></h2>
    <h3><?php echo $messageLoginInfo; ?></h3>
  </div>
</div>

<div class="contact">
  <div class="container">
    <div class="col-md-6">
      <h3>Contact info</h3>
      <p><span>Address:</span> 321 Awesome Street, New York, NY 17022</p>
      <p><span>Email:</span> info@companyname.com</p>
      <p><span>Phone:</span> +1 800 123 1234</p>
    </div>

    <div class="col-md-6">
      <h3>Please login</h3>
      <form id="form" name="form" method="post" onsubmit="return(validate());" action= "login.php5">
        <div class="form_details">
          
          <p><label>Email:</label> 
            <input type="text" class="text" id = "email" name = "email" value="<?php echo $userName; ?>" required >
          </p>
        
          <p><label>Password:</label> 
            <input type="password" class="text" name = "password" value="<?php echo $userPass; ?>" required>
          </p>

          <div class="clearfix"> </div>
          <button class="btn" id ="submit" name="submit" type="submit" >LogIn</button>
        </div>
      </form>
    </div>
  </div>
</div>
<br><br>