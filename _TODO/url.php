<? 
include('sqlite/conn.php');
$mode = $_GET['mode'];
$curID = $_GET['id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Site Reference</title>
<style type="text/css">
.row {margin-top:8px;font-size:12px;}
.row label {display: block;float: left;width: 150px;font-size: 12px;text-align: right;padding-right: 10px;font-weight:normal;}
.formField{width:200px;}	
.btn{background:#fff;border:1px solid #aaa;}.btn:hover{background:#aaa;border:1px solid #369;}
.clear{clear:both;}
#urlList{height:180px;overflow:auto;border:1px solid #aaa;border-bottom:0;padding-bottom:3px;}
.hLine{width:100%;border-top:1px solid #aaa;font-size:1px;}
</style>
<script type="text/javascript">
function checkadd(){if(document.getElementById('urlR').value.length <= 5 || document.getElementById('urlR').value.indexOf('.') == -1 ){alert('Invalid URL entry');return false;}}
function checkedit(){if(document.getElementById('urlE').value.length <= 5 || document.getElementById('urlE').value.indexOf('.') == -1 ){alert('Invalid URL entry');return false;}}
</script>
<?
$project = strtoupper($_GET['project']);
$dbproject = strtolower($project);
$id = 2;
?>
</head>
<body>
<? if($mode == 'add'){ ?>
	<h2>Add Mode:</h2>
	<form name="addURL" id="addURL" method="post" action="sqlite/function.php?mode=add" onSubmit="return checkadd();">
	<input type="hidden" name="project" value="<?= $dbproject; ?>" />
	<div class="row"><label>Current Site</label>"<?= $project; ?>"</div>
	<div class="row"><label>URL Reference:</label>HTTP://<input type="text" name="urlR" id="urlR" dir="ltr" class="formField"/></div>
	<div class="row"><label>&nbsp;</label><button type="submit" class="btn">Add</button> <button type="submit" class="btn" onClick="window.close('self');">Cancel</button></div>
	</form>
	<? } ?>

<? if($mode == 'edit'){ ?>
	<h2>Edit Mode:</h2>
	<?
			$dbfile = "sqlite/genesis.db";
			try {$db = new PDO('sqlite:'.$dbfile);}
			catch (PDOException $error) {print "error: " . $error->getMessage() . "<br/>";}
			$sql = 'select * from liveDomains where id = '.$curID;
			$res = $db->prepare($sql);
			$res->execute();
			while($row = $res->fetch())
			{
				$id = $row['id'];
				$name = $row['project'];
				$url = $row['liveurl'];
			}
			?>
	<form name="editURL" id="editURL" method="post" action="sqlite/function.php?mode=edit" onSubmit="return checkedit();">
	<div class="row"><label>Current Site</label><?= $dbproject; ?></div>
	
	<input type="hidden" name="project" value="<?= $dbproject; ?>" />
	<input type="hidden" name="id" value="<?= $curID; ?>" />
	
	<div class="row"><label>Current URL</label>http://<?= $url; ?></div>
	<div class="row"><label>URL Reference:</label>HTTP://<input type="text" name="urlE" id="urlE" dir="ltr" class="formField"/></div>
	<div class="row"><label>&nbsp;</label><button type="submit" class="btn">Update</button> <button type="button" class="btn" onClick="window.close('self');">Cancel</button></div>
	</form>
	<? } ?>
<? if($mode == 'view'){ ?>
	<h2>View Mode:</h2>
		<div id="urlList">
			<div class="row" style="font-weight:bold"><label style="font-weight:bold">Project Name</label>Project URL</div>
			<?
			$dbfile = "sqlite/genesis.db";
			try {$db = new PDO('sqlite:'.$dbfile);}
			catch (PDOException $error) {print "error: " . $error->getMessage() . "<br/>";}
			$sql = 'select * from liveDomains order by project';
			$res = $db->prepare($sql);
			$res->execute();
			while($row = $res->fetch())
			{
				$id = $row['id'];
				$name = $row['project'];
				$url = $row['liveurl'];
				echo '<div class="row"><label>'.$name.':</label>http://'.$url.'</div>';
			}
			?>
			
			
			
		</div>
		<div class="hLine"></div>
		<div class="row"><label>&nbsp;</label><button type="button" class="btn" onClick="window.close('self');" style="float:right;margin-right:10px;">Close</button></div>
		<div class="clear"></div>
	<? } ?>

</body>
</html>
