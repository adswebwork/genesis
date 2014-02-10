<?
/* Mysql Connaction 
#==================*/
mysql_connect('localhost','aismedia','aiscorp317');
$conn = mysql_select_db('aismedia_rss');
if(!$conn){echo 'Unable to connect to database';}

#FUNCTIONS
 function new_date($datex, $format)
 	{
		$output = date($format,strtotime($datex));
		return $output;
 	}
		


?>