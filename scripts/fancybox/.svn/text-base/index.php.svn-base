<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title>FancyBox - Next generation lightboxes</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="fancy.css" media="screen" />
	<script type="text/javascript" src="jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="jquery.metadata.js"></script>
	<script type="text/javascript" src="jquery.pngFix.pack.js"></script>
	<script type="text/javascript" src="jquery.fancybox-1.0.0.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			//Activate FancyBox
			$("p#test1 a").fancybox({
				'hideOnContentClick': true
			});
			
			$("p#test2 a").fancybox({
				'zoomSpeedIn':	0, 
				'zoomSpeedOut':	0, 
				'overlayShow':	true
			});
			
			$("a#custom_1").fancybox({
				'itemLoadCallback': getGroupItems
			});
			
			$("a#custom_2, a#custom_3").fancybox({
				'zoomSpeedIn':	0, 
				'zoomSpeedOut':	0
			});
		
		});

		//List can contain mixed media too
		//Parameter "o" ir optional and used to override settings, example: {url: "http://www.google.com", title: false,  o: {'frameWidth': 200} }
		
		//This list is for the group below
		var imageList = [
			{url: "img/img1.jpg", title: "Image A"},
			{url: "img/img2.gif", title: "Image B"},
			{url: "img/img3.jpg", title: "Image C"}
		];
		
		function getGroupItems(opts) {
			jQuery.each(imageList, function(i, val) {
		        opts.itemArray.push(val);
		    });
		}
		
	</script>
</head>
<body>
<h1>Gen 2 Lightbox</h1>
<p class="boxIndent">This application generates an upgraded lightbox that allows for dynamic content.</p>
  <div id="contentSet" align="center">
				<p id="test1">
					<b>Fancy single images</b>
					
					<br />
					
					<a href="img/img2.gif"><img alt="" src="img/img2.gif" /></a>

					<a title="Launch your ecommerce site today!" href="img/img1.jpg"><img alt="" src="img/img1B.jpg" /></a>
					
					<a title="Sneeky Sheep" href="img/img3.jpg"><img alt="" src="img/img3B.jpg" /></a>
				</p>

				<p id="test2">
					<b>Grouped images (no zooming animation, adds overlay)</b>
					
					<br />
					
					<a rel="group1" href="img/img2.gif"><img alt="" src="img/img2.gif" /></a>

					<a rel="group1" title="eCommerce is the way to go." href="img/img1.jpg"><img alt="" src="img/img1B.jpg" /></a>
					
					<a rel="group1" title="Wool sheep." href="img/img3.jpg"><img alt="" src="img/img3B.jpg" /></a>
				</p>
				
				<p id="test4">
					<b>Dynamic Examples</b>
				</p>
									
				<table border="0" cellpadding="0" cellspacing="0">
			
				<tr>
					<!--Reads from the group list of images-->
					<td><a id="custom_1" href="javascript:;"><img alt="" src="img/img2.gif" /></a></td>
					<td><a id="custom_2" href="#testube" class="{frameWidth: 425, frameHeight: 355}"><img alt="" src="img/youtube.jpg" /></a></td>
					<td><a id="custom_3" href="http://www.google.com/"><img alt="" src="img/google.jpg" /></a></td>
				</tr>
				</table>

				<div style="display:none" id="testube">
				<? $video = 'http://www.youtube.com/v/r05qf5fV9Vs&hl=en&fs=1='; # allows for easy video updates?> 
					<object width="425" height="344"><param name="movie" value="<?= $video; ?>"></param><param name="wmode" value="transparent"></param><embed src="<?= $video; ?>" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed></object>
				</div>
				
	</div>  			
	
<?
$t = date("d/j/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>
</body>
</html>