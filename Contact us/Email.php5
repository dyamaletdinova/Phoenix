<?php 
/*
* Class that gathers data from the contact us page
* and sends an email to the owner
*/
class Email {
	
	//data for the fields
	private $name;
	private $sentTo = "majestiquedi@mail.ru"; 
	private $sentFrom;
	private $subject;
	private $message;

	/*
	*Method that sets the name
	*/
	public function setName ($inName){
		$this->name = $inName;
	}

	/*
	*Method that gets the name
	*/
	public function getName (){
		return $this->name;
	}

	/*
	*Method that sets email addsess "sent to"
	*/
	public function setSentTo ($inEmail)
	{
		$this->sentTo = $inEmail;
	}

	/*
	*Method that gets email addsess "sent to"
	*/
	public function getSentTo (){
		return $this->sentTo;
	}


	/*
	*Method that sets email addsess "sent from"
	*/
	public function setSentFrom ($inName)
	{
		$this->sentFrom = $inName;
	}

	/*
	*Method that gets email addsess "sent from"
	*/
	public function getSentFrom ()
	{
		return $this->sentFrom;
	}

	/*
	*Method that sets the subjectfor email
	*/
	public function setSubject ($inSubject)
	{
		$this->subject = $inSubject;
	}

	/*
	*Method that gets the subjectfor email
	*/
	public function getSubject ()
	{
		return $this->subject;
	}

	/*
	*Method that sets the message for email
	*/
	public function setMessage ($inMessage)
	{
		$this->message = $inMessage;
	}

	/*
	*Method that gets the message for email
	*/
	public function getMessage ()
	{
		return $this->message;
	}

	/*
	*Method that send email to the owner
	* the data comes from the name value pais using post 
	* from the form where user entered the data
	*/
	public function sendMail()
	{
		//$sentFrom = "From: $sentFrom";
		//$message = wordwrap($message,80);
		return mail ("majestiquedi@mail.ru", $_POST["subject"], $_POST["message"], $_POST["sentFrom"]);
	}//end sendMail()
}

?> 