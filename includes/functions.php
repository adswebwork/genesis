<?php
# FORMATS THE FILE SIZE
function format_size($size, $round = 0) {
    //Size must be bytes!
    $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $total = count($sizes);
    for ($i=0; $size > 1024 && $i < $total; $i++) $size /= 1024;
    return round($size,$round).' '.$sizes[$i];
}


#RESIZE IMAGES TO SPECIFIED DIMENSIONS
function imgRsz($width,$height,$target)
{
	#takes the larger of the dimension and applies the formula
	if($width > $height) { $percentage = ($target / $width);  }
	else 	             { $percentage = ($target / $height); }
	
	#gets the value, applies the formula, then rounds the percentage
	$width = round($width * $percentage);
	$height = round($height * $percentage);
	
	#returns the new dimensions in html format
	return "width=\"$width\" height=\"$height\"";
}



function c()
{
	echo '<div class="clear"></div>';	

}


// Create a list of options for a select dropdown, based on the passed array
function optionsFor($var, $sort = null) 
{
	if($sort == 'asc'){$var = sort($var);}
	if($sort == 'dec'){$var = rsort($var);}
	foreach($var as $option)
	{
		$optionLabel = (strlen($option) < 1) ? 'Please Select' : $option;
		print '<option value="'.$option.'">'.$optionLabel.'</option>';
	}
}
?>
