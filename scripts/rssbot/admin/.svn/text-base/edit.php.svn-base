<?
session_start();
#NAME OF FEED
$feedname = 'rss.xml';
$_SESSION['feed'] = $feedname;
/* feed can be called anything - creating this variable allow dynamic population should one desire to change it */
$feed = $_SESSION['feed'];
$ok = $_SESSION['user'];
if(!isset($ok))
{
	header('Location:../index.php');
}
require('conn.php');
$idx = $_GET['article'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/css.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="../javascript/js.js"></script>
<title>RSS BOT - Automatic (PHP > XML) Integration - Brought to you by - The Genesis Project&trade;</title>
</head>
<body>
<a name="top" id="top">&nbsp;</a>
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
      <li>Article View Panel</li>
    </ul>
  </div> <!--menu -->
  
  
  <div id="content">
    <h2>RSS Bot V 1.1</h2>
   
    <div class="actionBar2" align="right"> 
	<a class="control5" name="control6" href="index.php">Submit an Article</a>
    <a class="control5" name="control7" href="../logout.php">Log Out</a>
	</div> <!--actionBar -->

	<fieldset>
	<legend>Current Article</legend>
	
	
	
	<?

	$sql = "select * from rss where id = $idx";
	$res = mysql_query($sql);
	while($article = mysql_fetch_assoc($res))
	{
		$id = $article['id'];
		$date = $article['date'];
		$title = $article['title'];
		$author = $article['author'];
		$link = $article['link'];
		$pubDate = $article['pubDate'];
		$permaLink = $article['permaLink'];
		$type = $article['type'];
		$location = $article['location'];
		if(strpos($location,'C',0)){$c = 'checked="checked"';}
		if(strpos($location,'M',0)){$m = 'checked="checked"';}
		if(strpos($location,'S',0)){$s = 'checked="checked"';}
		
		$desc = $article['description'];
		$hdesc = $article['hdescription'];
		$status = $article['status'];
		
		switch($status) { 	case 1: $status = 'Active'; 
									$statusB = 'Deactivate';
									$statusR = 'active';
							break; 
							
							case 0: $status = 'Inctive'; 
									$statusB = 'Activate';
									$statusR = 'inactive';
							break;
							default: $status = 'Inctive'; 
									$statusR = 'inactive';
									$statusB = 'Activate';
							break; 
		} 
		
		
		

	?>
	

		<div class="row, <?= $statusR; ?>"><b>Status:</b> <?= $status; ?></div>
	

		<form id="rssBot" action="update.php?type=edit&article=<?= $id; ?>" method="post" onsubmit="return verifyForm('rssBot');">
	
	<div class="block" style="width:380px;">
<div class="row"><label for="status" style="font-weight: bold">Status:</label>
	
	<? if($status == 'Active'){?>
	<input type="radio" name="Status" value="1" style="margin-top:15px;" checked="checked"/>Active
	<input type="radio" name="Status" value="0"/>Inactive
	
	<? } else { ?>
	
	<input type="radio" name="Status" value="1" style="margin-top:15px;"/>Active
	<input type="radio" name="Status" value="0" checked="checked"/>Inactive
	<? } ?>
	
</div>	
<div class="clear"></div>
	<div class="row"><label for="date" style="font-weight: bold">Date:</label><input type="text" name="Date" class="formField" dir="ltr" value="<?= $date;?>" /></div>
	<div class="row"><label for="title" style="font-weight: bold">Title:</label><input type="text" name="Title" class="formField" dir="ltr" value="<?= $title;?>"/></div>
	<div class="row"><label for="author" style="font-weight: bold">Author:</label><input type="text" name="Author" class="formField"  dir="ltr"value="<?= $author;?>"/></div>
	<div class="row"><label for="link" style="font-weight: bold">Link:</label><input type="text" name="Link" class="formField" dir="ltr" value="<?= $link;?>"/></div>
	<div class="row"><label for="pubDate" style="font-weight: bold">PubDate:</label><input type="text" name="PubDate" class="formField" dir="ltr" value="<?= $pubDate;?>"/></div>
	<div class="row"><label for="permalink" style="font-weight: bold">Permalink:</label><input type="text" name="PermaLink" class="formField" dir="ltr" value="<?= $permaLink;?>"/></div>
	
	
	<div class="row"><label for="type" style="font-weight: bold">Article Type:</label>
		<select name="Type" class="formField" dir="ltr">
			<? 
				$typeR = array('Radio','TV','Press Release','Event');
				foreach($typeR as $val)
				{
				if($type == $val){$b = 'selected="selected"';}
				
					echo '<option value="'.$val.'"'.$b.'>'.$val.'</option>';
					$b = '';
				}
			
			?>
			
			</select>
	</div>
	
	<div class="row">
		<label for="location" style="font-weight: bold">Location:</label>
		<input type="checkbox" name="Location[]" value="C" <?= $c; ?>/>Corporate
		<input type="checkbox" name="Location[]" value="M" <?= $m; ?>/>Excerpo Mail
		<input type="checkbox" name="Location[]" value="S" <?= $s; ?>/>Excerpo Store
	</div>
	
	</div>
	
	<div class="block">
	<div class="row"><label for="desc" style="font-weight: bold">Description:</label><textarea  name="Description" class="formField" dir="ltr"><?= $desc;?></textarea></div>
	<div class="row"><label for="h-desc" style="font-weight: bold">H-Description:</label><textarea  name="H-description" class="formField" dir="ltr"><?= $hdesc;?></textarea></div>
	</div> <!-- block -->
	<div class="clear"></div>
	<div class="buttonBar" align="right"><input type="submit" name="submit" value="Submit Article"><input type="reset" name="cancel" value="Cancel Update" onclick="location.href=('rss.php');"></div> <!--buttonBar -->
	
	
	</form>
	

	<div class="clear"></div>
	<? } ?>
	

	
	
	
	<div class="bline">&nbsp;</div>
	
	</fieldset>
	

	<div class="clear"></div>
	
	
	  


	
  </div> <!--content -->
  <div class="clear"></div>
  
  <div class="actionBar2"> 
	Last Updated: 
	<? $last_modified = filemtime("../../feeds/".$feed);  print(date("m/d/y @ H:i:s a", $last_modified)); ?> 
	| <a href="rss_update.php">Update feed Now</a>
    
	</div> <!--actionBar -->
	<div class="bline">&nbsp;</div>
	
<div class="clear"></div>
  <div class="copyright">
  	Copyright &copy; <?= date('Y'); ?>  | RSS Bot Version 1.1 - June 2009<br />
  </div> <!--copyright -->
</div>
</body>
</html>
