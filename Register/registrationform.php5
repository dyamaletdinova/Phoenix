<div id="section_header">
  <div class="container">
    <h2><span>Register</span></h2>
    <h3 style="color:red;"><?php echo $message; ?></h3>
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
      <h3>Become a Part of Our Big Family!</h3>
      <form id="form" name="form" method="post" onsubmit="return(validateFields());" action="register.php5">
        <div class="form_details">
        
         <p><labell class = "labelradio">Female:</label> 
           <input type="radio" class="text" name="gender" value="female" required> 
            
          <labell class = "labelradio">Male:</label>
           <input type="radio" class="text" name="gender" value="male" required>
          </p>
            
          <p><label>First Name:</label> 
          <input type="text" class="text" id = "firstName" name = "firstName" value="<?php echo $firstName; ?>" required>
          </p>
        
          <p><label>Last Name:</label> 
          <input type="text" class="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
          </p>

          <p><label>Email: </label>
          <input type="text" class="text" id="email"name="email" value="<?php echo $email; ?>" required>
          </p>

          
          <p><label>Password:</label> 
          <input type="text" id ="password"  class="text" name="password" value="<?php echo $password; ?>" required>
          </p>

          <p><labell class = "labelradio">Listener:</label> 
           <input type="radio" class="text" name="role" value="listener" required> 
          
           <label class = "labelradio">Help Seeker: </label>
          <input type="radio" class="text" name="role" value="helpseeker" required>
          </p>

          <p><label>Tell us about yourself:</label> 
          <textarea name="about" value="" ></textarea>
          </p>

          <div class="clearfix"> </div>
          <button class="btn" id ="submit" name="submit" type="submit">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>