<?
	require_once('conf.php');
	
	$gallery = $_GET['gallery'];
	unset($_GET['gallery']);
	if (empty($gallery)) {exit;}
	
	foreach($_GET as $key => $value) {
		if (!is_numeric($key)) continue;
		$key = addslashes($key);
		$value = addslashes($value);
		
		mysql_query("Update images Set rank='$value' Where id='$key'");
	}
	
	header('Content-Type: text/xml');	
?>
<response>done</response>