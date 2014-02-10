<?
session_start();

$auth = $_GET['reset'];
if($auth = 'tza2y33r83wn4nflzpwn1rsrqshnwwd5')
	{
	$_SESSION['attempts'] = 0;
	header ('Location:index.php');	
	}


?>