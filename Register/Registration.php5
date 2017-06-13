<?php 

	/**
	* Registration class that stores that data provided 
	* from the registration page
	*/
class Registration {

	//data for the fields
	private $firstName = "";
	private $lastName= "";
	private $gender= ""; 
	private $email= ""; 
	private $password= "";
	private $role= "";
	private $about= "";
	private $registrationDate;
	private $displayDate;
	
	/*
	* Method that sets the first name of the user 
	*/
	public function setFirstName ($inFirstName){
		$this->firstName = $inFirstName;
		//echo "From class set ".$firstName;
	}

	/*
	* Method that gets the first name of the user 
	*/
	public function setLastName ($inLastName){
		$this->lastName = $inLastName;
	}

	/*
	* Method that sets the last name of the user
	*/
	public function getFirstName(){
		return $this->firstName;
	}
	
	/*
	* Method that gets the last name of the user
	*/
	public function getLastName(){
		return $this->lastName;
	}

	/*
	* Methd that sets the ful name of the user
	*/
	public function setFullName($inFirstName, $inLastName){
		$this->firstName = $inFirstName;
		$this->lastName = $inLastName;	
	}

	/*
	* Methd that gets the ful name of the user
	*/
	public function getFullName()
	{
		return $this->lastName . ", " . $this->firstName;	
	}
	
	/*
	* Method that sets the gender of the user
	*/
	public function setGender ($inGender){
		$this->gender = $inGender;
	}

	/*
	* Method that gets the gender of the user
	*/
	public function getGender (){
		return $this->gender;
	}

	/* 
	*Method that sets Email of the user
	*/
	public function setEmail ($inEmail){
		$this->email = $inEmail;
	}

	/* 
	*Method that gets Email of the user
	*/
	public function getEmail (){
		return $this->email;
	}

	/* 
	* Method that sets the the role of the user
	*/
	public function setRole ($inRole){
		$this->role = $inRole;
	}

	/* 
	* Method that gets the the role of the user
	*/
	public function getRole (){
		return $this->role;
	}

	/*
	* Methos that sets for About 
	*/
	public function setAbout ($inAbout){
		$this->about = $inAbout;
	}

	/*
	* Methos that gets for About 
	*/
	public function getAbout (){
		return $this->about;
	}

	/*
	* Method that sets the Password
	*/
	public function setPassword ($inPassword){
		$this->password = $inPassword;
	}

	/*
	* Method that gets the Password
	*/
	public function getPassword (){
		return $this->password;
	}

	/*
	* Method to set the registration date
	*/
	public function setRegistrationDate(){
		$this->displayDate = mktime(0,0,0);//using date() create mkttime stamp
	}

	/*
	* Method to get the registration date
	*/
	public function getRegistrationDate(){
		global $displayDate;//tells function to use global variable
		return date("n/d/Y", $this->displayDate);//using date() display 09/24/2015
	}
}

?> 