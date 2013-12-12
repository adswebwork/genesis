<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simple Image Lightbox</title>
<link rel="stylesheet" href="thumbnailviewer.css" type="text/css" />
<script src="thumbnailviewer.js" type="text/javascript"></script>
<style type="text/css">
h1 {
	color:#999999;
	font-family:Verdana,Arial,Helvetica,sans-serif;
	font-size:18pt;
	text-align:center;
}
.boxIndent {
border:1px solid #CCCCCC;
font-family:verdana,arial,helvetica,sans-serif;
font-size:12px;
margin:10px auto;
padding:3px 5px;
color:#666666;
width:600px;
text-align:center;
}
</style>



</head>
<body>

<h1>Simple lightbox</h1>
<p class="boxIndent">This page displays a simple light box of images, <br />called both from standard html, and dynamic php.</p>

<? 
include_once('resizeImg.php');
#Standards
$r = '<br />';
$l = "\n";
$cl = '<div style="clear:both";></div>';
#__________________________________
?>

<div class="tbBorder">
<fieldset><legend>Individually called links - HTML</legend>
<p><a href="bee.jpg" rel="thumbnail" title="This is beautiful castle for sale!">Bumble Bee</a></p>
<p><a href="cart.jpg" rel="thumbnail" title="This is beautiful castle for sale!">Shopping Cart</a></p>
</fieldset>

<fieldset><legend>Dynamically called links - PHP</legend>
<?
	$noShow = array('.','..'); #creates a list of files that we do not want shown
	$noExt = array('.jpg','.gif','.png');
	$dir = '../simple-lightbox/';
	$open = opendir($dir);
	while(($file = readdir($open)) !== false)
		{
		if(!in_array($file,$noShow)) #check if file is in array, if so, it will not show
			{
				$file = strtolower($file);
				$title = str_replace('.jpg','',$file);
				if(strpos($file,'.jpg') || strpos($file,'.gif'))
				{
				echo '<p><a href="'.$file.'" rel="thumbnail" title="'.$title.'">'.$file.'</a></p>';
				}		
			}	
		}
	closedir($open);
	
	
?>


</fieldset>

<fieldset><legend>Dynamically called image links</legend>

<?
	$noShow = array('.','..'); #creates a list of files that we do not want shown
	$dir = '../simple-lightbox/';
	$open = opendir($dir);
	while(($file = readdir($open)) !== false)
		{
		if(!in_array($file,$noShow)) #check if file is in array, if so, it will not show
			{
				$file = strtolower($file);
				$title = str_replace('.jpg','',$file);
				if(strpos($file,'.jpg') || strpos($file,'.gif') && $file != 'loading.gif')
				{
					
				$myImg = getimagesize($file);
				$w = $myImg[0];
				$h = $myImg[1];	
				$s = 100;
				echo '<p style="float:left; width:160;padding:5px;">
						<a href="'.$file.'" rel="thumbnail" title="'.$title.'">
						<img src="'.$file.'"'.imgRsz($w,$h,$s).'/>
						</a>
						</p>';
				}		
			}	
		}
	closedir($open);
	
	
?>
</fieldset>

</div> <!--tbBorder -->



<?
$t = date("d/j/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>




</body>
</html>
