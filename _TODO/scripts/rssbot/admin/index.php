<?
session_start();
$ok = $_SESSION['user'];
if(!isset($ok))
{
	header('Location:../index.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/css.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="../javascript/js.js"></script>
<title>RSS BOT - Automatic (PHP > XML) Integration - Brought to you by - The Genesis Project&trade;</title>
</head>
<body>
<div id="ha">
  <div class="headline">
    <div class="logo"> 
		<a href="index.php" target="_parent"><img src="../images/logo.gif" width="160" height="59" /></a><img src="../images/rss_icon.jpg" style="position:relative;top:-30px;"/> 
	</div> <!--logo -->
    <div class="hline">&nbsp;</DIV>
    <div class="title">AISMEDIA | RSS BOT</DIV>
  </div> <!--headline -->
  
  <div id="menu" style="padding-left:5px;">
    <ul>
      <li>Administration Panel</li>
    </ul>
  </div> <!--menu -->
  
  
  <div id="content">
    <h2>RSS Bot V 1.1</h2>
   
    <div class="actionBar2" align="right"> 
	<a class="control5" name="control5" href="rss.php">View Current Articles</a>	
    
    <a id="control6" name="control5" href="../logout.php">Log Out</a>
	</div> <!--actionBar -->
	

	<fieldset>
	<legend class="err">Welcome</legend>
		<p class="norm">
		You may use this administration area to update the xml feeds on the corporate websites.<br />
		Complete the form below and click submit to proceed.

		</p>
	
	</fieldset>
	
	<form id="rssBot" action="update.php?type=submit" method="post" onsubmit="return verifyForm('rssBot');">
	
	<div class="block">
	<div class="row"><label for="date" style="font-weight: bold">Date:</label><input type="text" name="Date" class="formField" dir="ltr" value="<?= date('Y-m-d'); ?>" /></div>
	<div class="row"><label for="title" style="font-weight: bold">Title:</label><input type="text" name="Title" class="formField" dir="ltr" /></div>
	<div class="row"><label for="author" style="font-weight: bold">Author:</label><input type="text" name="Author" class="formField"  dir="ltr"/></div>
	<div class="row"><label for="link" style="font-weight: bold">Link:</label><input type="text" name="Link" class="formField" dir="ltr" /></div>
	<div class="row"><label for="pubDate" style="font-weight: bold">PubDate:</label><input type="text" name="PubDate" class="formField" dir="ltr" value="<?= date('Y-m-d'); ?>"/></div>
	<div class="row"><label for="permalink" style="font-weight: bold">PermaLink:</label><input type="text" name="PermaLink" class="formField" dir="ltr" /></div>
	
	
	<div class="row"><label for="type" style="font-weight: bold">Article Type:</label>
		<select name="Type" class="formField" dir="ltr">
			<option value="">Please select...</option>
		<? $typeR = array('Radio','TV','Press Release','Event');
			foreach($typeR as $val)
			{
				echo '<option value="'.$val.'"'.$now.'>'.$val.'</option>';
				
			}
			?>
			
		</select>
	</div>
	
	<div class="row">
		<label for="location" style="font-weight: bold">Location:</label>
		<input type="checkbox" name="Location[]" value="C" checked="checked"/>Corporate
		<input type="checkbox" name="Location[]" value="M" />Excerpo Mail
		<input type="checkbox" name="Location[]" value="S"/>Excerpo Store
	</div>
	
	</div>
	
	
	
	<div class="block">
	
	
	<div class="row"><label for="desc" style="font-weight: bold">Description:</label><textarea  name="Description" class="formField" dir="ltr"></textarea></div>
	<div class="row"><label for="h-desc" style="font-weight: bold">H-Description:</label><textarea  name="H-description" class="formField" dir="ltr"></textarea></div>
	
	
	

	
	</div> <!-- block -->
	<div class="clear"></div>
	<div class="buttonBar" align="right"><input type="submit" name="submit" value="Submit Article"></div> <!--buttonBar -->
	
	</form>
	<div class="clear"></div>
  </div> <!--content -->
  <div class="clear"></div>
  <div class="bline">&nbsp;</div>
		<div class="clear"></div>
  <div class="copyright">
  	Copyright &copy; <?= date('Y'); ?>  | RSS Bot Version 1.1 - June 2009<br />
  </div> <!--copyright -->
</div>
</body>
</html>
