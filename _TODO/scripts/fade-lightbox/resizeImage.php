<?
#resize image function
function imgRsz($width,$height,$target)
{
	#check to see which of the two dimensions is larger
	#takes the larger of the dimension and applies the formula
	if($width > $height) { $percentage = ($target / $width);  }
	else 	             { $percentage = ($target / $height); }
	
	
	#gets the value, applies the formula, then rounds the percentage
	$width = round($width * $percentage);
	$height = round($height * $percentage);
	
	#returns the new dimensions in html format
	return "width=\"$width\" height=\"$height\"";
}
?>


