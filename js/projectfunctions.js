function validate()
{
 // Checks if the email input is correct data
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
  if(document.form.email.value.match(mailformat))  
  {  
    document.form.email.focus();  
  return true;  
  }  
  else  
  {  
    alert("You have entered an invalid email address!");  
    document.form.email.focus();  
    this.value = 'Email Address';
    return false;  
  }
}

function validateFields()
{      
   // Checks if the email input is correct data
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
  if(document.form.email.value.match(mailformat))  
  {  
    document.form.email.focus();  
    return true;  
  }  
  else  
  {  
    alert("You have entered an invalid email address!");  
    document.form.email.focus();  
    return false;  
  }    
}


