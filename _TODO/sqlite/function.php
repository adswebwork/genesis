<?
$mode = $_GET['mode'];
$project = $_POST['project'];
$newURL = $_POST['urlR'];
$updateURL = $_POST['urlE'];
$id = $_POST['id'];

if($mode == 'add')
	{	$sql = 'INSERT INTO "main"."liveDomains" ("project","liveurl") VALUES("'.$project.'","'.$newURL.'")';
	} 
	
if($mode == 'edit')
	{ 	$sql = 'update liveDomains set "liveurl" = "'.$updateURL.'" where id = '.$id;
	}

	
$dbfile = "genesis.db";
			try {$db = new PDO('sqlite:'.$dbfile);}
			catch (PDOException $error) {print "error: " . $error->getMessage() . "<br/>";}
			$res = $db->prepare($sql);
			$res->execute();
?>
<h2>Database Updated</h2>
<p>Project: <?= $_POST['project']; ?></p>
<p>Project URL: <? echo $newURL; echo $updateURL; ?></p>
<script type="text/javascript">function closeMe(){window.close('self');}setTimeout("closeMe()", 1000);</script>