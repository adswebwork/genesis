<html>
<head>
<title>
Form Calendar Pop up
</title>
<script type="text/javascript" src="inc/mootools-1.2-core.js"></script>
<script type="text/javascript" src="inc/vlaCal-v2.1.js"></script>
<link type="text/css" href="styles/vlaCal-2.1.css" rel="stylesheet" media="screen"/>
<script type="text/javascript">
function eMail()
{
	var f = document.getElementById('dateMe');
	var e = f.email;
	if(e.value == "enter email address")
	{
		e.value = '';
	}
	else
	{
		e.value = e.value;
	}
}
new vlaDatePicker('exampleI');
</script>
<style type="text/css">
button{font-size:10px;background:#e9e9e9;border:1px solid #000;margin:10px 3px;}

</style>
</head>
<body>


<?
echo '<h1>Form Calendar</h1>';
?>

<form name="dateMe" method="POST" action="#" id="dateMe">
Your email address:<br /><input type="text" name="email" value="enter email address" onfocus="return eMail();"/><br /><br />
Date available:<br /> <input id="exampleI" type="text" style="width: 80px;" maxlength="10" />
<br />
<button type="submit">Submit</button>
<button type="reset">Reset</button>

</form>

<?
$t = date("d/j/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>
</body>

</html>
