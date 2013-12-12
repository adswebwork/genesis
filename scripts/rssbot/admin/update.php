<?
session_start();
require('conn.php');
$mode = $_GET['type'];
$id = $_GET['article'];

switch($mode)
	{
	case 'Activate':
			$sql = "update rss set status = 1 where id = $id";
			break;
			
	case 'Deactivate':
			$sql = "update rss set status = 0 where id = $id";
			break;

	case 'edit':
			$loc = $_POST['Location'];
			$loc = implode(',',$loc);	
		
		$date = $_POST['Date'];
		$title = $_POST['Title'];
		$author = $_POST['Author'];
		$link = $_POST['Link'];
		$pubDate = $_POST['PubDate'];
		$permaLink = $_POST['PermaLink'];
		$type = $_POST['Type'];
		$location = $loc;
		$desc = $_POST['Description'];
		$hdesc = $_POST['H-description'];
		$status = $_POST['Status'];
		
			$sql = "UPDATE rss SET title = '$title',description = '$desc',pubDate = '$pubDate',link = '$link',author = '$author',permaLink = '$permaLink',
							date = '$date',type = '$type',location = '$loc',status = '$status' WHERE id = $id";
			break;


	
		case 'submit':
			$loc = $_POST['Location'];
			$loc = implode('-',$loc);	
		
		$date = $_POST['Date'];
		$title = $_POST['Title'];
		$author = $_POST['Author'];
		$link = $_POST['Link'];
		$pubDate = $_POST['PubDate'];
		$permaLink = $_POST['PermaLink'];
		$type = $_POST['Type'];
		$location = $loc;
		$desc = addslashes($_POST['Description']);
		$hdesc = addslashes($_POST['H-description']);
		$status = $_POST['Status'];

	
$sql = "INSERT INTO rss (id,title,description,pubDate,link,author,permaLink,date,type,hdescription,location,status)
VALUES (NULL,'".$title."','".$desc."','".$pubDate."','".$link."','".$author."','".$permaLink."','".$date."','".$type."','".$hdesc."','".$loc."','0')";
			break;
			
			
	case 'delete':
			$sql = "delete from rss where id = $id";
			break;
	default:
			echo 'Unavailable Resources';
			break;
			
	}


$res = mysql_query($sql);
if($res){echo '<div style="background:#3c0;color:#fff;font-weight:bold;font-size:1.3em;padding:3px;"><b>Success</b></div>'; }
 else {'<div style="background:#f00;color:#fff;font-weight:bold;font-size:1.3em;padding:3px;"><b>Invalid</b></div>';}

?>

<script type="text/javascript">
var counter = 0;
function redirectPortfolio() {
if(counter < 3) {
counter++;
document.getElementById('counter').innerHTML = 3 -counter;
setTimeout("redirectPortfolio();", 1000);
} else {
document.location.href = 'rss.php';
}}
window.onload = redirectPortfolio;
</script>
<br>
<h3 align="center">You will be redirected in <span id="counter"></span> seconds</h3>