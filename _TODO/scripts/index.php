<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Scripts</title>
<script type="text/javascript" src="index.js"></script>
<link href="../css/style-genesis.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
body{padding:20px;background:#fff;font-size:12px;}
.tbBorder{border-top:1px solid #aaa;border-bottom:1px solid #aaa;}
#scriptsBg{background:#ededed;border:1px solid #999;padding:20px;margin:30px;font-size:1.3em;}
.dk{background:#555;}
</style>
</head>

<body><script type="text/javascript" src="wz_tooltip.js"></script>
<div>
<? $date = date("l, F j, Y");$ck = date("F j,");echo '<h1>Script Library as of '.$date.'</h1>';$current = 'Today';?>
<p>Hover over each link to view the description.</p>
</div>

<div id="scriptsBg">
<? 
#Standards
$r = '<br />';
$l = "\n";
$cl = '<div style="clear:both;">&nbsp;</div>';
$nm = 0;

$dir = '../scripts/';
$open = opendir($dir);
$noFile = array('index.php','.','..','new project','wz_tooltip.js'); //add files to list that should not be shown
$noScript = array('.php,','.zip','.html'); // add file extensions to the 'no display' category

while(($file = readdir($open)) !== false)
	{
		
		if(!in_array($file,$noFile))//check that the files in the array are not shown
			{
				if(!strpos($file,$noScript[$nm]) && !strpos($file,'1') || strpos($file,'.')) // check each script that should not be included	
				{
					//sets up the tool tip reads the _readMe text file to generate the tool tip content_____________
					$text = $file.'/_readMe.txt';
				#	print $file;
					$openx = fopen($text,'r');
					$content = fread($openx,filesize($text));
					fclose($openx);
					$show = "onmouseover=\"Tip('$content')\" onmouseout=\"UnTip()"; // sets the text content rollover
					//______________________________________________________________________________________________					
					$file = strtolower($file);
					$file = ucwords($file);
					echo '<a href="'.$file.'"target="_blank" '.$show.'">'.$file.'</a>'.$r;
					$nm++;#adds the count of the files
				}
				
			}
	}
closedir($open);
echo '<p class="tbBorder" style="font-weight:bold;">Currently: '.$nm.' scripts are available locally.</p>'.$r;
?>
</div>
<? 
#Standards
$r = '<br />';
$l = "\n";
$cl = '<div style="clear:both;">&nbsp;</div>';
$na = 0;

$dir = '../scripts/';
$open = opendir($dir);
while(($file = readdir($open)) !== false)
	{
		
			if(strpos($file,'-1')) // check each folders that have the number 1 (added to the project under development) in their name
				{
					$file = str_replace('-1','',$file);
					$file = strtolower($file);
					$file = ucwords($file);

					print '<a href="'.$file.' "target="_blank" onmouseover="Tip(\'In development\')" onmouseout="UnTip()">'.$file.'</a>'.$r;
					$na++;#adds the count of the files
				}
				
	}
	
closedir($open);
?>

<?php 
# echo $cl.'<p class="tbBorder" style="font-weight:bold;">Currently: '.$na.' scripts are in development.</p>'.$r;
echo '<p align="right"><a href="../">&lt;&lt;Back to Local Host</a></p>';
?>










<!--//_______________________________________________________________________________________________________________-->
<?
$t = date("m/j/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>
</body>
</html>
