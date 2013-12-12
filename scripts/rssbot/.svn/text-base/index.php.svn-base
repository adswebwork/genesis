<?
session_start();
if(!isset($_SESSION['attempts'])){$_SESSION['attempts'] = 0;} // Sets the attempts to '0' if none is set
$max = 5; // Maximum attems for login
$cur = $_SESSION['attempts']; // Current attempt count
$rem = $max - $cur; // Does the math to find out the remaining attempts

$status = $_GET['status'];
if($status == 1){$msg = '<span style="color:#030;font-weight:bold;">Successful logout</span>';}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/css.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="javascript/js.js"></script>
<title>RSS BOT - Automatic (PHP > XML) Integration - Brought to you by - The Genesis Project&trade;</title>
</head>
<body>
<div id="ha">
  <div class="headline">
    <div class="logo"> 
		<a href="index.php" target="_parent"><img src="images/logo.gif" width="160" height="59" /></a><img src="images/rss_icon.jpg" style="position:relative;top:-30px;"/> 
	</div> <!--logo -->
    <div class="hline">&nbsp;</DIV>
    <div class="title">AISMEDIA | RSS BOT</DIV>
  </div> <!--headline -->
  
  <div id="menu">
    <ul>
      <li> <a id="control6" name="control6" href="/rss">Login</a></li>
    </ul>
  </div> <!--menu -->
  
  
  <div id="content">
    <h2>Administration Section</h2>
   
    <div class="actionBar"> 
		<a id="control5" name="control5" href="mailto:aspencer@aismedia.com?subject=Please%20reset%20my%20rssBot%20password">Reset Password</a>
		<?
		
		/* Shows a status message is one is set */
		if(isset($status)){ ?>Status: <?= $msg; ?><? } ?>
		
		
	</div> <!--actionBar -->
	
<? if($rem == 0)
	{
	?>
	<fieldset class="err">
	<legend class="err">Maximum Login-in Attempts Reached</legend>
		<p class="norm">This login has been deactivated for 5 minutes.</p>
		<p class="norm">Please wait 5 minutes for this script to reset. Do not refresh or close this page during this time.</p>
		<?= 'Deactivation Time: '.$_SESSION['clock']; ?> <span class="norm">|</span>
		<?= '<span class="good">Re-Activation Time: '.$_SESSION['reset'].'</span>'; ?>
		 <span class="norm">|</span> <strong class="norm">Time Remaining: </strong> 
		 
		 
<script type="text/javascript">
var counter = 0;
function redirectPortfolio() {
if(counter < 300) {
counter++;
document.getElementById('counter').innerHTML = 300 -counter;
setTimeout("redirectPortfolio();", 1000);
} else {
document.location.href = 'reset.php?reset=tza2y33r83wn4nflzpwn1rsrqshnwwd5';
}}
window.onload = redirectPortfolio;
</script>
	<span id="counter"></span>	 
	</fieldset>
	<?
	}	
	
	else {
	?>
	<form name="login" id="login" method="post" action="login.php" onsubmit="return loginX('login');">
	    <input type="hidden" name="mwh" value="15">
		<fieldset>
	      <legend>Panel</legend>
			  <div><label for="username" style="font-weight: bold">Username</label><input type="text" name="username" id="username" value="" SIZE="20"></div>
			  <div><label for="password" style="font-weight: bold">Password</label><input type="password" name="password" id="password" value="" size="20"></div>
		</fieldset>

		<div id="msg">
			<? if($_SESSION['attempts'] != 0)
				{
					echo '<span class="err">'.$_SESSION['attempts'].'</span> Invalid Attempts | <span class="good">'.$rem.'</span> Remaining';
				} 
			?>
		</div>
		<div class="buttonBar"><input type="submit" name="submit" value="Login"></div> <!--buttonBar -->
    </form>
	<?
		}
	?>

  </div> <!--content -->
  
  <div class="bline">&nbsp;</div>
		
  <div class="copyright">
  	Copyright &copy; <?= date('Y'); ?> | RSS Bot Version 1.1 - June 2009<br />
  </div> <!--copyright -->
</div>
</body>
</html>
