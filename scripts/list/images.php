<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
   "http://www.w3.org/TR/html4/frameset.dtd">
<HTML>
<HEAD>
<TITLE>Automated Image Generation</TITLE>
</HEAD>
<body>
<a name="top"></a>
<a href="#end">End of Page</a>
<br />
<hr />
<?
	$num = $_GET['num'];
	$url = $_GET['url'];
	$max = $_GET['amt'];
for($i=$num;$i<=$max;$i++)
	{
	#if(strlen($i) == 1) {$i = '0'.$i;}
	echo '<img src="'.$url.$i.'.jpg"/>';
	echo '<br />';
	$num++;
	}
?>
<br />
<hr />
<a href="index.php">Back to Index</a> | <a href="#top">Top</a>
<a name="end"></a>
</body>
</HTML>