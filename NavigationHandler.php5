<?php
/*
* class that sets that navbar menu links active depending on what link was clicked
* it gets the url address using the $_SERVER array on element ['REQUEST_URI'] and checks 
* uing the methoв strpos() if that elements has a string $path in this array 
* the string path I am passing from the header.php5
* $_SERVER is an array containing information such as headers, paths, and script locations. 
* The entries in this array are created by the web server.
* strpos() - Find the numeric position of the first occurrence of needle in the haystack string. 
* in my case i am treating it as a 
* strpos() returns bool or a number
*/
class NavigationHandler {

	/*
	* Method that sets the link active and styles it
	*/
	public function setActive($path){

		/* this is a way to print the whole array $_SERVER and see what it has
		foreach ($_SERVER as $key => $value) {
		   echo "$key: $value<br>";
		}*/

        if ( strpos($_SERVER['REQUEST_URI'], $path)){
	        return 'class = "active"';  
        }	
        return '';          	
	}
}

?>