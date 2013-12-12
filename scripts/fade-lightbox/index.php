<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	
<title>Dynamic Lightbox</title>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<? include('resizeImage.php');?>
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
<style type="text/css">
body{ color: #333; font: 13px 'Lucida Grande', Verdana, sans-serif;}
#display1{display:none;}
#display2{display:none; }
#display3{display:none; }
a img{border:0; }
a{color:#369;}
h2{margin-top:20px;border-top:1px solid #aaa; }
.imgB{margin:3px;}

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
h1 {
color:#999999;
font-family:Verdana,Arial,Helvetica,sans-serif;
font-size:18pt;
text-align:center;
}
h3{display:none;} 
</style>
<script type="text/javascript">
function view(id)
	{
		var div = document.getElementById(id);
		if(div.style.display == 'none')
			{ div.style.display = 'block'; }
		else{ div.style.display = 'none'; }
	}

</script>
</head>
<body>
<h1>Fade Lightbox</h1>
<p class="boxIndent">This impliments the lightbox technology simular to a gallery set up. No database needed. <br />Click on the links below to open a lightbox of the image.</p>


<h2>HTML Single Example</h2>
<a href="images/img1.jpg" rel="lightbox"><img src="images/img1t.jpg"/></a>
<a href="images/img2.jpg" rel="lightbox"><img src="images/img2t.jpg"/></a>
<a href="images/img3.jpg" title="Internet" rev="http://www.google.com" rel="lightbox"><img src="images/img3t.jpg"/></a>

<h2>HTML Grouped Example</h2>

<a href="images/img1.jpg" rel="lightbox[myimages]"><img src="images/img1t.jpg"/></a>
<a href="images/img4.jpg" rel="lightbox[myimages]"><img src="images/img4t.jpg"/></a>
<a href="images/img6.jpg" rel="lightbox[myimages]"><img src="images/img6t.jpg"/></a>
<a href="images/img7.jpg" rel="lightbox[myimages]"><img src="images/img7t.jpg"/></a>



<h2>PHP Dynamic Grouped Example with resized images</h2>


<?
	$dir = 'images/large/';
	
	$open = opendir($dir);
	while(($file = readdir($open)) !== false)
	{
		if($file != '.' && $file != '..' && $file != 'Thumbs.db')
		{
			$imgF = $dir.$file;
			$myImg = getimagesize($imgF);
			$w = $myImg[0];
			$h = $myImg[1];
			$s = 125;// change to any value create the necessary thumbnail view of the image
					// the file SIZE remains the same, so use this script in MODERATION
			echo '<a href="'.$imgF.'" rel="lightbox[group]" class="imgB"><img src="'.$dir.$file.'"'.imgRsz($w,$h,$s).'/></a>';
		}
	}

$t = date("m/d/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>
</body>
</html>
