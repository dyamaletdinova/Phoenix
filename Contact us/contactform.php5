<div id="section_header">
  <div class="container">
    <h2><span>Contact Us</span></h2>
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
      <h3>Get in touch</h3>
      <form id="form" name="form" method="post" onsubmit="return(validate());" action="contact.php5">
        <div class="form_details" >
          <p><label>Name:</label> 
          <input type="text" name="name" class="text" >
          </p>
         
          <p><label>Email:</label>
          <input type="text" class="text" id="email" name="email" required>
          </p>

          <p><label>Subject:</label>  
          <input type="text" class="text" name="subject" >
          </p>

          <p><label>Message:</label> 
          <textarea name="message"></textarea>
          </p>

          <div class="clearfix"> </div>
          <button class="btn" name = "submit" type="submit">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</div>