<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Color Picker</title>
<meta name="description" content="Ajaxload - Ajax loading gif generator" />
<link href="styles.css" rel="stylesheet" media="screen" type="text/css" />
<!--[if IE]><link href="css/styles_ie.css" rel="stylesheet" media="screen" /><![endif]-->
<script type="text/javascript" src="domel.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="color-picker.js"></script>
</head>
<body>
<h1>Color Slider</h1>
<p class="boxIndent">This application generates a color slider simular to photoshop, and updates the hex value in the input fileds.</p>
	<div id="pickerContainer">
	<form action="#preview" id="generator" method="post">
		<fieldset>
		<h2>Color Picker</h2>
	
		<div id="color-picker"></div>
	
		<!--<img id="indicator" src="indicator.gif" alt="Loading..." /> -->
		
		<div id="type"></div>

		
		<div style="clear:both;height:50px;"></div>
			<p>
			<label class="sort" for="color1">Color 1 :</label>
			<span>#</span>
			<input type="text" id="color1" name="color1" class="color" value="FFFFFF" />
			</p>
		 
			<p>
			<label class="sort" for="color2">Color 2 :</label>
			<span>#</span><input type="text" id="color2" name="color2" class="color" value="000000" />
			</p>
		</fieldset>
	  </form>
	  <div style="clear:both;"></div>
	</div>
<?
$t = date("d/j/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>
</body>
</html>
