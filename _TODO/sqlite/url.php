<? 
include('sqlite/conn.php');
$mode = $_GET['mode'];
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
</head>
<body>
<? if($mode == 'add'){ ?>
	<h2>Add Mode:</h2>
	<form name="addURL" id="addURL" method="post" action="sqlite/function.php" onSubmit="return check('addURL');">
	<div class="row"><label>Current Site</label> Test Name</div>
	<div class="row"><label>URL Reference:</label><input type="text" name="urlR" dir="ltr" class="formField"/></div>
	<div class="row"><label>&nbsp;</label><button type="submit" class="btn">Add</button> <button type="submit" class="btn" onClick="window.close('self');">Cancel</button></div>
	</form>
	<? } ?>

<? if($mode == 'edit'){ ?>
	<h2>Edit Mode:</h2>
	<form name="editURL" id="editURL" method="post" action="sqlite/function.php" onSubmit="return check('editURL');">
	<div class="row"><label>Current Site</label> Test Name</div>
	<div class="row"><label>Current URL</label>http://www.testurl.com</div>
	<div class="row"><label>URL Reference:</label><input type="text" name="urlR" dir="ltr" class="formField"/></div>
	<div class="row"><label>&nbsp;</label><button type="submit" class="btn">Add</button> <button type="button" class="btn" onClick="window.close('self');">Cancel</button></div>
	</form>
	<? } ?>
<? if($mode == 'view'){ ?>
	<h2>View Mode:</h2>
		<div id="urlList">
			<div class="row"><label>Site Name</label>http://www.testurl.com</div>
			
		</div>
		<div class="hLine"></div>
		<div class="row"><label>&nbsp;</label><button type="button" class="btn" onClick="window.close('self');" style="float:right;margin-right:10px;">Close</button></div>
		<div class="clear"></div>
	<? } ?>

</body>
</html>
