<?php

class DisplayStars {
	/*
	* Class that stores the displays stars
	*/
	public function displayStarsRating($rating){
		
		$starsOutput; //return value
		$roundNum = floor($rating); //get the whole number from the average rating(round down)
		$modNum = fmod($rating,1); // get the mod of the average rating, 2 dec after comma
		//while i is less or = roundNum, print the gold stars
		//e.i print as many gold starts as there whole numbers
		for( $i = 1; $i <= $roundNum; $i++)
		{
			$starsOutput .= '<img src="../images/gold_star.png"width = "17" height="17"/>';
		}	
		// if 0 < modulusNum print a half star
	    if ( 0 < $modNum)
		{
			$starsOutput .= '<img src="../images/half_star.png"width = "17" height="17"/>';
		}
		//for each i=ratingrounded up (includes a half star), and while i less 4, print empty stars
		for ( $i = $rating; $i <= 4; $i++){
			$starsOutput  .= '<img src="../images/empty_star.png" width = "17" height="17"/>';
		}
		return $starsOutput; //return results
	}
}

?>