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
      <li>Administration Panel</li>
    </ul>
  </div> <!--menu -->
  
  
  <div id="content">
    <h2>RSS Bot V 1.1</h2>
   
    <div class="actionBar2" align="right"> 
	<a class="control5" name="control5" href="rss.php#feeds">View Feed Formats</a>	
    <a class="control5" name="control6" href="index.php">Submit an Article</a>
    <a class="control5" name="control7" href="../logout.php">Log Out</a>
	</div> <!--actionBar -->

	<div class="actionBar2"> 
	Last Updated: 
	<? $last_modified = filemtime("../../feeds/".$feed);  print(date("m/d/y @ H:i:s a", $last_modified)); ?> 
	| <a href="rss_update.php">Update feed Now</a>
    
	</div> <!--actionBar -->

	<fieldset>
	<legend>Current Articles</legend>
	
	
	
	
	
	<?

	$sql = 'select * from rss';
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
		<div class="row"><b>Date: </b> <?= $date; ?></div>
		<div class="row"><b>Title: </b> <?= $title; ?></div>
		<div class="row"><b>Author: </b> <?= $author; ?></div>	
		<div class="row"><b>Link: </b> <a href="<?= $link; ?>" target="_blank"><?= $link; ?></a></div>	
		<div class="row"><b>PubDate: </b> <?= $pubDate; ?></div>	
		<div class="row"><b>Permalink: </b ><a href="<?= $permaLink; ?>" target="_blank"><?= $permaLink; ?></a></div>
		<div class="row"><b>Article Type: </b> <?= $type; ?></div>	
		<div class="row"><b>Published Location: </b> <?= $location; ?></div>	
		<div class="row"><b>Description: </b> <?= $desc; ?></div>
		<div class="row"><b>H-Description: </b> <?= $hdesc; ?></div>	
		<br/>
		<p align="right" style="border:1px solid #f4f4f4;">
			<a href="update.php?type=<?= $statusB; ?>&article=<?= $id; ?>"><?= $statusB; ?> this article</a> | 
			<a href="edit.php?article=<?= $id; ?>">Edit this article</a> | 
			<a href="update.php?type=delete&article=<?= $id; ?>" onclick="return confirm('Are you sure you want to delete this article?');">Delete this article</a>
		</p>

	<div class="bline"></div>
	<? } ?>
	

	
	
	
<a name="feeds"	>&nbsp;</a>
<table width="100%">

<tr><td align="center" width="33%">
<a href="http://www.aismedia.com/feeds/<?= $feed; ?>" target="_blank">
	<img src="http://ebusinessnews.info/images/xml.gif" border="0" height="14" width="36" />
</a>
</td>

<td align="center" width="33%">
<a href="http://add.my.yahoo.com/rss?url=http://www.aismedia.com/feeds/<?= $feed; ?>">
	<img src="http://us.i1.yimg.com/us.yimg.com/i/us/my/addtomyyahoo4.gif" width="91" height="17" border="0" />
</a>
</td>

<td align="center" width="33%">
<a href="http://fusion.google.com/add?feedurl=http://www.aismedia.com/feeds/<?= $feed; ?>">
	<img src="http://buttons.googlesyndication.com/fusion/add.gif" width="104" height="17" border="0" />
</a>
</td></tr>

</table>
	<div class="bline">&nbsp;</div>
	<p align="right"><a href="#top">Top</a></p>
	

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
