<?
	$db_host = 'localhost';
	$db_user = '3217_ktn_IE';
	$db_pass = 'ktn_IE';
	$db_name = '3217_ktn_IE';
	
	$image_path = "/gallery_images/";
	
	mysql_connect($db_host,$db_user,$db_pass) or die("Unable to connect to database.");
	mysql_select_db($db_name) or die("Unable to open database.");
	
?>