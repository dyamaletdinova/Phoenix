<?php

/*
* Class that manages the sessions
* this class is used so I can only call methods instead of putting 
* the teddious code all over the pages again and again. 
*/

class SessionManager {

 	/* 
 	* Method that cheks if there is a valid user and if the session is on
 	* if there is a valid user it returns 0 (true) or -1 if no user is found and 
 	* no session is started
 	*/
	public function checkIfValidUserExist() {

		if ( isset($_SESSION['validUser']) && !empty($_SESSION['validUser']))
  		{ 
  			return 0;//This is a valid user show the Admin Page
  		}
  		return -1;
	}

 	/* 
 	* Method that adds a user to the session 
 	* one the session is started
 	*/
	public function addUserToSession($firstName,$role) {

		$_SESSION['validUser'] = $firstName;
        $_SESSION['userRole'] = $role;
	}

 	/* 
 	* Method that starts the session
 	*/
	public function startSession() {

		session_cache_limiter('none');//This prevents a Chrome error when using the back button to return to this page.
		session_start();
	}
 	/* 
 	* Method that ends the session
 	* first: provides access to the current session
 	* second: removes all session variables related to current session
 	* third: removes current session
 	*/
	public function destroySession(){

		session_start();	
		session_unset();	
		session_destroy();	
	}

 	/* 
 	* Method gets the session attribute
 	* Essencially this method gets the needed attribute, 
 	* whether its userName or userRole.
 	* This way I reduse lines of code 
 	*/
	public function getSessionAttribute($attributeName){
		
		return $_SESSION[$attributeName];
	}

   /* 
 	* Method sets the session attribute
 	* when the user's role is changes
 	* this data is submitted
 	*/
	public function setSessionAttribute($attributeName, $attributeValue){
		
		$_SESSION[$attributeName] = $attributeValue;
	}
}
?>