<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" CONTENT="Web design resources - 500+ named colours / colors. Includes rgb and hex values for html and css.">
<meta name="keywords" CONTENT="named colours colors rgb hex hue html css vga x11 web design program cloford.com">
<title>500+ Named Colours with RGB and HEX values</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<script language="javascript" type="text/javascript">

function writeSyntax()
{
	
	var cBlock = document.getElementById('color');
	var fBlock = document.getElementById('family');
	var sBlock = document.getElementById('size');
	var bBlock = document.getElementById('background');	
	var lBlock = document.getElementById('height');	
	var syntax = document.getElementById('cssSyntaxText');
	syntax.innerHTML= "background:"+bBlock.value+"; font-size:"+sBlock.value+"; font-family:\""+fBlock.value+"\"; color:"+cBlock.value+"; line-height:"+lBlock.value+";"; // updates the syntax when values are changed
	

}


var num="aaaaaa"
function colorchange(num) {
	var div = document.getElementById('colorBox');
	div.style.background = "#"+num;
	document.getElementById('background').value = "#"+num;
	writeSyntax();
}

function textChangeto(val)
{
	var paragraph = document.getElementById('textChange');
	paragraph.style.color = "#"+val;
	document.getElementById('color').value = "#"+val;
	writeSyntax();
}


function fontChangeto(val)
{
	var paragraph = document.getElementById('textChange');
	paragraph.style.fontFamily = val;
	document.getElementById('family').value = val;
	writeSyntax();
}

function fontSChangeto(val)
{
	var paragraph = document.getElementById('textChange');
	paragraph.style.fontSize = val;
	document.getElementById('size').value = val+"px";
	writeSyntax();
}


function lineChangeto(val)
{
	var paragraph = document.getElementById('textChange');
	paragraph.style.lineHeight = val;
	document.getElementById('height').value = val;
	writeSyntax();
}

</script>
</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class="leftcol"></td>
<td class="thincol"></td>
<td class="maincol">

<h1>Ultimate Color Coder</h1>

			
<div class="boxindent">
  <p align="center">Utilize this page to dynamically set a standard font color, face and size with<br /> any background color from this list below of over 500.</p>
  <p align="center"><a href="../color-list/"><img src="refresh.jpg" /></a><br/>Refresh</p>
  
</div>
<div id="colorBox">

<p id="textChange">Example text, lorem ipsum sit amet, consectetuer adipiscing elit. Quisque ultrices purus id nunc. Nam sapien massa, vulputate eu, tincidunt nec, dapibus et; purus. Proin condimentum pede vel metus. Cras auctor, leo sed varius mollis, tortor sapien venenatis augue, id faucibus felis enim in diam. Sed ac sapien! Nunc aliquam. Phasellus in est. Nam eros tortor, elementum id, posuere sit amet, posuere sit amet, metus. Sed et urna. In id nibh.</p>

</div>

<div align="center">
<p align="center" class="border1"><a href="#" onclick="textChangeto('000000');">Black Text</a> | <a href="#" onclick="textChangeto('ffffff');">White Text</a> | <a href="#" onclick="textChangeto('ff0000');">Red Text</a> | <a href="#" onclick="textChangeto('00688b');">Blue Text</a> | <a href="#" onclick="textChangeto('a52a2a');">Brown Text</a> | <a href="#" onclick="textChangeto('ffff00');">Yellow Text</a></p>
<p align="center" class="border2"><a href="#" onclick="fontChangeto('Verdana');">Verdana</a> | <a href="#" onclick="fontChangeto('Helvetica');">Helvetica</a> | <a href="#" onclick="fontChangeto('Times New Roman');">Times New Roman</a> | <a href="#" onclick="fontChangeto('Arial');">Arial</a> | <a href="#" onclick="fontChangeto('Tahoma');">Tahoma</a> | <a href="#" onclick="fontChangeto('Sans-Serif');">Sans-Serif</a></p>
<p align="center" class="border1"><a href="#" onclick="fontSChangeto('9');">9</a> | <a href="#" onclick="fontSChangeto('10');">10</a> | <a href="#" onclick="fontSChangeto('11');">11</a> | <a href="#" onclick="fontSChangeto('12');">12</a> | <a href="#" onclick="fontSChangeto('14');">14</a> | <a href="#" onclick="fontSChangeto('16');">16</a></p>

<p align="center" class="border2">
<? 
	$heights = array('1','1.2','1.4','1.6','1.8','2.0','2.2','2.4','2.6');
	foreach ($heights as $height)
	{
		echo '- <a href="#" onclick="lineChangeto(\''.$height.'\');" >'.$height.'</a> -  ';
		    
	}
?>

</p>
<div id="values">
Color: <input type="text" disabled="disabled" id="color"/>
Family: <input type="text" disabled="disabled" id="family"/><br/>
Size: <input type="text" disabled="disabled" id="size"/>
Background: <input type="text" disabled="disabled" id="background"/>
Line Height: <input type="text" disabled="disabled" id="height"/>
</div>

<div id="cssSyntax">
<span id="cssSyntaxText">&nbsp;</span>
</div>

<div style="width:500px;">
    <table class="webcol" border="0" cellpadding="2">
      <tr>
      <td class="grey5" align="center" height="8" width="135"><font color="#000"><b>Colour Name</b></font></td>
      <td class="grey5" align="center" height="8" width="120"><font color="#000"><b>Select a Colour</b></font></td>
      <td class="grey5" align="center" height="8" width="63"><font color="#000"><b>Hex</b></font></td>
      <td class="grey5" align="center" height="8" width="21"><font color="#000"><b>R</b></font></td>
      <td class="grey5" align="center" height="8" width="21"><font color="#000"><b>G</b></font></td>
      <td class="grey5" align="center" height="8" width="21"><font color="#000"><b>B</b></font></td>
      <td class="grey5" align="center" height="8" width="60"><font color="#000"><b>Access</b></font></td>
      </tr>
      </table>
    </div>
    
<div class="listBox">
<? include('color-table.php'); ?>
<div style="clear:both;"></div>
</div>

</div>

</td>

</tr>
</table>

<hr />
<center>
      <script language="JavaScript" type="text/javascript">
      <!-- Begin
      var m = "Last Modified: " + document.lastModified;
      var p = m.length-8;
      document.write(m.substring(p, 0));
      // End -->
	  </script>
</center>
</body>
</html>

