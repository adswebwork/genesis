<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" CONTENT="Web design resources - 500+ named colours / colors. Includes rgb and hex values for html and css.">
<meta name="keywords" CONTENT="named colours colors rgb hex hue html css vga x11 web design program cloford.com">
<title>Theme Builder</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<script type="text/javascript" src="jscolor/jscolor.js"></script>
<? include ('classes/selectoptions.php'); ?>
</head>
<body>


<h1>Theme Builder</h1>
		
<div class="boxindent">
  <p align="center">Theme Builder for Easy Reference Compsosite and Build</p>
  <p align="center"><a href="../Theme-builder"><img src="refresh.jpg" /></a><br/>Refresh</p>
 </div>
 
 <div id="controls">

<div id="values">
<h3>Optional Components</h3>

<!--______________ELEMENT______________________________________________________________ -->
<div class="row"><label>Element:</label> <input type="text" disabled="disabled" id="element"/>
<select name="Celement" id="Celement" onChange="elementChangeto(this.value);">
<? $elNum = count($elementArray);for($el = 0; $el < $elNum; $el++){ ?>
<option value="<?= $elementArray[$el]; ?>"><?= $elementArray[$el]; ?></option>
<? } ?></select></div>
<!--______________TEXT COLOR___________________________________________________________ -->
<div class="row"><label>Font Color:</label> <input type="text" disabled="disabled" id="color"/>
<select name="Ccolor" onchange="colorChangeto(this.value);">
<? $coNum = count($colorArray);for($co = 0; $co < $coNum; $co++){ ?>
<option value="<?= $colorArray[$co][0]; ?>"><?= $colorArray[$co][1]; ?></option>
<? } ?></select></div>

<!--______________FONT FAMILY___________________________________________________________ -->
<div class="row"><label>Font Family:</label> <input type="text" disabled="disabled" id="family"/>
<select name="Cfont" onchange="familyChangeto(this.value);">
<? $famNum = count($familyArray);for($fam = 0; $fam < $famNum; $fam++){ ?>
<option value="<?= $familyArray[$fam]; ?>"><?= $familyArray[$fam]; ?></option>
<? } ?></select></div>


<!--______________FONT SIZE______________________________________________________________ -->
<div class="row"><label>Font Size:</label> <input type="text" disabled="disabled" id="size"/>
<select name="Csize" onchange="sizeChangeto(this.value);">
<? for($fs = 8; $fs < 20; $fs++){ ?>
<option value="<?= $fs; ?>"><?= $fs.'px'; ?></option>
<? } ?></select></div>

<!--______________LINE HEIGHT______________________________________________________________ -->
<div class="row"><label>Line Height:</label> <input type="text" disabled="disabled" id="height"/>
<select name="Csize" onchange="lineChangeto(this.value);">
<? foreach($heightArray as $height){ ?>
<option value="<?= $height; ?>"><?= $height.'em'; ?></option>
<? } ?></select></div>


<!--______________BACKGROUND COLOR______________________________________________________________ -->
<div class="row">
			<label>Background:</label> <input type="text" disabled="disabled" id="background"/>
			<input type="text"  name="color" class="color" value="#FFFFFF" onBlur="backgroundChangeto(this.value);"/>
		</div>


</div>  <!--values -->

<div class="clear"></div>

<div id="cssSyntax">
<span id="cssSyntaxText">&nbsp;</span>
</div>

<div style="clear:both;"></div>
<!--</div> -->

</div>
<!--controls -->
 
<div id="colorBox">
<div id="page">
<div id="Header">
<div id="Logo">LOGO</div>
<div id="Navigation">Home | About Us | Services | Gallery | Contact Us</div>
</div>
<div id="image"></div>
<div id="Content">
<h2>Test Page</h2>Example text, lorem ipsum sit amet, consectetuer adipiscing elit. Quisque ultrices purus id nunc. Nam sapien massa, vulputate eu, tincidunt nec, dapibus et; purus. Proin condimentum pede vel metus.s, tortor sapien venenatis augue, id faucibus felis enim in diam. Sed ac sapien! Nunc aliquam. Phasellus in est. Nam eros tortor, elementum id, posuere sit amet, posuere sit amet, metus. Sed et urna. In id nibh.
<br /><br />Lorem ipsum dolor si Nunc a sapien. Proin accumsan cursus ipsum. Etiam elementum. Class aptent taciti sociosqu ad litoraelit iaculis tincidunt. Cras euismod augue vitae tellus. Ut mauris? Phasellus ante massa, eleifend non, dapibus et, semper eget; libero! Maecenas cursus placerat eros.
<br /><br />Nulla erat quam, malesuada sit amet, condimentum ac, iaculis sed, nisi. In consequat! Donec sed neque ac purus euismod vestibulum. Proin dictum justo viverra lorem. Curabitur metus tortor vulputate mi, in pulvinar risus libero t, pretium quis, rius, pede erat dictum neque, ut tincidunt nunc est posuere tortor. Vestibulum porta justo ut diam.
<br /><br /><h3>Sub Heading</h3>Proin ultricies ligula vel urna feugiat ultricies! Maecenas congue facilisis tincidunt. Suspendisse potenti. Mauris massa magna, consectetur nec, scelerisque sed, tristique in, purus? Phasellus nec mauris. Etiam vel est ut sapien consectetur venenatis. In tellus! Phasellus vel dolor. Vestibulum non risus.<br /><br />
</div>
<div class="clear"></div>
<div id="Footer">Copyright &copy; 2009 | All Right Reserved | Credits</div>
</div> <!--page -->
</div> <!--colorbox -->


<div class="clear"></div>
<hr />
<?
echo 'Session ID:' .session_id();
c();
print_r($_SESSION);

?>



<hr/>
<center>
<? include ('javascript/scripts.php'); ?>


<?
$t = date("m/j/y - g:i:a",filemtime('index.php'));
echo '<p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>
</center>
</body>
</html>

