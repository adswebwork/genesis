<?
/*
================================================================#
*	Author: Andre D. Spencer 									#
*	Published: Wednesday, June 3, 2009							#
*	Purpose: Automatic rss update from mysql database using php	#
================================================================#
@ Full authority to use this file granted by author ============#
===============================================================*/



/*Starts the session in order to store the information that will be written to the xml file
#=========================================================================================*/
session_start(); 


/*Create the header content for the xml file and stores it in a session variable
#============================================================================*/
$_SESSION['rssStart'] = '<?xml version="1.0" encoding="US-ASCII"?>
				<rss version="2.0"> 
				<channel> 
					<title>AIS Media, Inc.</title> 
					<link>http://www.aismedia.com</link> 
					<description>AIS Media In the Press</description>
					<language>en</language> 
					<pubDate>18 Feb 2008 11:56:48 -0500</pubDate> 
					<lastBuildDate>Mon, 12 Sep 2005 18:37:00 GMT</lastBuildDate>
					<generator>AIS Media RSS Generator</generator> 
					<ttl>60</ttl> 
					';

/* Mysql Connaction 
#==================*/
session_start();
$feed = $_SESSION['feed'];
require_once('conn.php');
/* Database connection and variable allocation
============================================= */
$sql = 'select * from rss where status = 1';
$res = mysql_query($sql);
$rssContent = ''; //Declares the variable rssContent that we will use to store the values
while($article = mysql_fetch_assoc($res))
{
	$id = $article['id'];
	$title = $article['title'];
	$description = $article['description'];
	$pubDate = $article['pubDate'];
	$link = $article['link'];
	$author = $article['author'];
	$permaLink = $article['permaLink'];

	$rssContent .= '
					<item> 
					<title>'.$title.'</title> 
					<description>'.$description.'</description> 
					<pubDate>'.$pubDate.'</pubDate> 
					<link>'.$link.'</link> 
					<author>'.$author.'</author> 
					<guid isPermaLink="false">'.$permaLink.'</guid> 
					</item> 
					';

 }

$_SESSION['rssClose'] = '</channel></rss>';
mysql_close($conn); 

/* Sets the variables for the content of the xml
==============================================*/
$start = $_SESSION['rssStart'];
$body = $rssContent;
$end = $_SESSION['rssClose'];
$content = $start.$body.$end;

/*Here we create/update the rss.xml file for our feed
#====================================================*/
$rssFile = '../../feeds/'.$feed;
$rssHandle = fopen($rssFile,'w') or die('Can not open file "'.$rssFile.'"');
fwrite($rssHandle, $content);
fclose($rssHandle);

/*Shows the viewer the last time the file was updated
#=================================================*/
$t = date("m/j/y -@- g:i:a",filemtime($rssFile));
echo '<hr /><p align="center" style="font:9px verdana;color:#333;">RSS Last Updated: '.$t.' - ';
?>



<script type="text/javascript">
var counter = 0;
function redirectPortfolio() {
if(counter < 5) {
counter++;
document.getElementById('counter').innerHTML = 5 -counter;
setTimeout("redirectPortfolio();", 1000);
} else {
document.location.href = 'rss.php';
}}
window.onload = redirectPortfolio;
</script>
<br>
<h4 align="center">Update Successful</h4>
<h3 align="center">You will be redirected in <span id="counter"></span> seconds</h3>