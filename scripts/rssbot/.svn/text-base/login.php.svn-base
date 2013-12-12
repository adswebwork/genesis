<? session_start();
$usr = $_POST['username'];$pas = $_POST['password'];$att = $_SESSION['attempts'];
if($usr != 'admin' || $pas != 'access')
	{
	$att++;	
	$_SESSION['attempts'] = $att;
	if($att == 5){
			$_SESSION['clock'] = date('h:i:s'); 
		$clock = $_SESSION['clock'] = date('h:i:s');
			$_SESSION['reset'] = date('h:m:s'); 
		$reset = 5;
		$cl = strtotime($clock); $res = strtotime("+$reset minutes", $cl);
		$_SESSION['reset'] = date('h:i:s',$res);
		
	}	
	
	header ('Location:index.php');
	}
	else{
		$_SESSION['user'] = 'valid';
		$_SESSION['user'] ='valid';
		header ('Location:admin/');
		}
?>