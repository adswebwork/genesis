<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title>Color Calculator by Mark L. Carson, Copyright 2003</title>
<style>
<!--
td { font-family:Arial; font-size:9pt; text-align:center; background-color:#efefef; }
td.title { color:white; font-weight:bold; background-color:DarkGray; font-size:12pt; }
td.label { background-color:#dfdfdf; }
td.bg { background-color:black; }
h1 {color:#999;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:18pt;text-align:center;}
.boxindent {background-color:#FFF;border:1px solid #CCC;
font-family:verdana,arial,helvetica,sans-serif;font-size:10pt;margin:10px auto;padding:3px 5px;color:#666666;width:600px;}


-->
</style>
</head>

<script>
//-----------------------------------------------------------------------------
var r = new Number(0xdf);
var g = new Number(0xef);
var b = new Number(0xff);
//-----------------------------------------------------------------------------

function display() {
  if (r < 0 || isNaN(r))
    r = 0 ;
  if (r > 255)
    r = 255;
  if (g < 0 || isNaN(g))
    g = 0 ;
  if (g > 255)
    g = 255;
  if (b < 0 || isNaN(b))
    b = 0 ;
  if (b > 255)
    b = 255;

  sHexR = r.toString(16);
  sHexG = g.toString(16);
  sHexB = b.toString(16);
  if (sHexR.length < 2)
    sHexR = "0" + sHexR;
  if (sHexG.length < 2)
    sHexG = "0" + sHexG;
  if (sHexB.length < 2)
    sHexB = "0" + sHexB;
  document.forms[0].hexR.value = sHexR;
  document.forms[0].hexG.value = sHexG;
  document.forms[0].hexB.value = sHexB;

  sDecR = r.toString(10);
  sDecG = g.toString(10);
  sDecB = b.toString(10);
  /*
  if (sHexR.length < 2)
    sDecR = "0" + sDecR;
  if (sDecR.length < 3)
    sDecR = "0" + sDecR;
  if (sDecG.length < 2)
    sHexG = "0" + sDecG;
  if (sDecG.length < 3)
    sDecG = "0" + sDecG;
  if (sDecB.length < 2)
    sDecB = "0" + sDecB;
  if (sHexB.length < 3)
    sDecB = "0" + sDecB;
  */
  document.forms[0].decR.value = sDecR;
  document.forms[0].decG.value = sDecG;
  document.forms[0].decB.value = sDecB;
  
  var htmlValue = "#" + sHexR + sHexG + sHexB;
  document.forms[0].htmlColor.value = htmlValue;
  var colorSample = document.getElementById("colorSample");
  colorSample.style.backgroundColor = htmlValue;
  //var htmlSample = document.getElementById("htmlSample");
  //htmlSample.innerText = htmlValue;
  var colorOptions = document.forms[0].colorName.options;
  var debug = document.getElementById("debug");
  colorOptions[0].selected = true;  
  for (var i = 0; i < colorOptions.length; i++) {
    if (colorOptions[i].value == htmlValue) {
	  colorOptions[i].selected = true;  
	  break;
	}  
  }  
}
//-----------------------------------------------------------------------------
function calcHex() {
  r = parseInt(document.forms[0].hexR.value, 16);
  g = parseInt(document.forms[0].hexG.value, 16);
  b = parseInt(document.forms[0].hexB.value, 16);
  display();
}
//-----------------------------------------------------------------------------
function calcDec() {
  r = parseInt(document.forms[0].decR.value, 10);
  g = parseInt(document.forms[0].decG.value, 10);
  b = parseInt(document.forms[0].decB.value, 10);
  display();
}
//-----------------------------------------------------------------------------
function calcName() {
  if (document.forms[0].colorName.value.length < 7)
    return;
  var strHex = document.forms[0].colorName.value.substring(1);
  r = parseInt(strHex.substring(0,2), 16);
  g = parseInt(strHex.substring(2,4), 16);
  b = parseInt(strHex.substring(4,6), 16);
  /*
  var debug = document.getElementById("debug");
  debug.value = strHex + " r=" + r + ", g=" + ", b=" + b;
  */
  display();
}
//-----------------------------------------------------------------------------
function calcHtmlColor() {
  if (document.forms[0].htmlColor.value.length < 7)
    return;
  var strHex = document.forms[0].htmlColor.value.substring(1);
  r = parseInt(strHex.substring(0,2), 16);
  g = parseInt(strHex.substring(2,4), 16);
  b = parseInt(strHex.substring(4,6), 16);
  display();
}
//-----------------------------------------------------------------------------
function darker() {
  var newR = r - Math.round(r * 0.1);
  var newG = g - Math.round(g * 0.1);
  var newB = b - Math.round(b * 0.1);
  if (newR == r)
    r--;
  else
    r = newR;
  if (newG == g)
    g--;
  else
    g = newG;
  if (newB == b)
    b--;
  else
    b = newB;
  display();
}
//-----------------------------------------------------------------------------
function lighter() {
  var newR = r + Math.round((255 - r) * 0.1);
  var newG = g + Math.round((255 - g) * 0.1);
  var newB = b + Math.round((255 - b) * 0.1);
  if (newR == r)
    r++;
  else
    r = newR;
  if (newG == g)
    g++;
  else
    g = newG;
  if (newB == b)
    b++;
  else
    b = newB;
  display();
}
//-----------------------------------------------------------------------------
function saturate() {
  var strong = r;
  var weak   = r;
  if (g > strong)
    strong = g;
  if (b > strong)
    strong = b;
  if (g < weak)
    weak = g;
  if (b < weak)
    weak = b;

  var range = strong - weak;
  var ratioR = 1;
  var ratioG = 1;
  var ratioB = 1;
  if (range > 0) {
    ratioR = (r - weak) / range;
    ratioG = (g - weak) / range;
    ratioB = (b - weak) / range;
  }	

  strong = strong * 1.1;
  if (strong > 255)
    strong = 255;
  weak = weak * 0.9;
  if (weak < 0)
    weak = 0;
  range = strong - weak;
  if (range > 0) {
    r = Math.round((range * ratioR) + weak);
    g = Math.round((range * ratioG) + weak);
    b = Math.round((range * ratioB) + weak);
  }	
	
  display();
}
//-----------------------------------------------------------------------------
function dilute() {
  var strong = r;
  var weak   = r;
  if (g > strong)
    strong = g;
  if (b > strong)
    strong = b;
  if (g < weak)
    weak = g;
  if (b < weak)
    weak = b;

  var range = strong - weak;
  var ratioR = 1;
  var ratioG = 1;
  var ratioB = 1;
  if (range > 0) {
    ratioR = (r - weak) / range;
    ratioG = (g - weak) / range;
    ratioB = (b - weak) / range;
  }	

  strong = strong * 0.9;
  if (strong < 0)
    strong = 0;
  weak = weak * 1.1;
  if (weak > 255)
    weak = 255;
  range = strong - weak;
  if (range > 0) {
    r = Math.round((range * ratioR) + weak);
    g = Math.round((range * ratioG) + weak);
    b = Math.round((range * ratioB) + weak);
  }	
	
  display();
}
//-----------------------------------------------------------------------------
function clipboard() {
  var value = document.forms[0].htmlColor.value;
  window.clipboardData.setData("Text", value); 
  alert("The HTML color value " + value + " has been copied onto the clipboard.\rYou can now paste it into HTML code which uses color values.");
}
//-----------------------------------------------------------------------------
function init() {
  return;
  if (window.name != "colorCalc") {
    var winColorCalc = window.open("ColorCalc.html","colorCalc","width=258,height=281,toolbar=no,scrollbars=no,resizable=yes")
	window.history.go(-1); 
  }
  else {
    window.focus();
    display();
  }	
}
//-----------------------------------------------------------------------------
</script>

<body onLoad="init();" MARGINWIDTH=0 MARGINHEIGHT=0 LEFTMARGIN=0 TOPMARGIN=0>
<h1>Color Calculator</h1>
<p class="boxIndent">This script generates a color calculator, which allows the user to increase and decrease a colors value.</p>

<form>
<table border=0 cellpadding=0 cellspacing=0>

  <tr>
    <td class=bg>
<table border=0 cellpadding=4 cellspacing=1>
  <tr>
    <td colspan=4 class=title>Color Calculator</td>
  </tr>
  <tr>
    <td class=label>Color Component</td>

    <td style="color:white; background-color:red; font-weight:bold;">Red</td>
	<td style="color:white; background-color:green; font-weight:bold;">Green</td>
	<td style="color:white; background-color:blue; font-weight:bold;">Blue</td>
  </tr>
  <tr>
    <td class=label>Hexadecimal</td>
    <td><input name=hexR size=2 maxlength=2 onChange="calcHex();"></td>

    <td><input name=hexG size=2 maxlength=2 onChange="calcHex();"></td>
    <td><input name=hexB size=2 maxlength=2 onChange="calcHex();"></td>
  </tr>
  <tr>
    <td class=label>Decimal</td>
    <td><input name=decR size=3 maxlength=3 onChange="calcDec();"></td>
    <td><input name=decG size=3 maxlength=3 onChange="calcDec();"></td>
    <td><input name=decB size=3 maxlength=3 onChange="calcDec();"></td>

  </tr>
  <tr>
    <td class=label>Adjust</td>
    <td>
      <a href="javascript: r-=8; display();"><img src="ButtonMinus.gif" border=0 title="Decrease value by 8"></a>
      <a href="javascript: r+=8; display();"><img src="ButtonPlus.gif"  border=0 title="Increase value by 8"></a>
    </td>
    <td>

      <a href="javascript: g-=8; display();"><img src="ButtonMinus.gif" border=0 title="Decrease value by 8"></a>
      <a href="javascript: g+=8; display();"><img src="ButtonPlus.gif"  border=0 title="Increase value by 8"></a>
    </td>
    <td>
      <a href="javascript: b-=8; display();"><img src="ButtonMinus.gif" border=0 title="Decrease value by 8"></a>
      <a href="javascript: b+=8; display();"><img src="ButtonPlus.gif"  border=0 title="Increase value by 8"></a>
    </td>
  </tr>
  <tr>

    <td class=label>HTML Value</td>
    <td colspan=3 style="font-weight:bold;">
      <input name=htmlColor id=htmlColor value="#ffffff" onChange="calcHtmlColor();" size=7 maxlength=7>
      <a href="javascript: clipboard();"><img src="clipboardCopy.gif" border=0 title="Click to copy HTML value onto the clipboard (Internet Explorer only)"></a>
  </tr>
  <tr>
    <td class=label>Color Name</td>
    <td colspan=3>

	  <select name=colorName size=1 onChange="calcName();">
        <option value=""></option>
        <option value="#ff0000">Red</option>
        <option value="#ffff00">Yellow</option>
        <option value="#008000">Green</option>
        <option value="#00ffff">Cyan</option>
        <option value="#0000ff">Blue</option>

        <option value="#ff00ff">Magenta</option>
        <option value="#ffffff">White</option>
        <option value="#e5e5e5">Gray 10%</option>
        <option value="#cccccc">Gray 20%</option>
        <option value="#b2b2b2">Gray 30%</option>
        <option value="#999999">Gray 40%</option>

        <option value="#7f7f7f">Gray 50%</option>
        <option value="#656565">Gray 60%</option>
        <option value="#4c4c4c">Gray 70%</option>
        <option value="#323232">Gray 80%</option>
        <option value="#191919">Gray 90%</option>
        <option value="#000000">Black</option>

        <option value="#f0f8ff">Alice Blue</option>
        <option value="#faebd7">Antique White</option>
        <option value="#00ffff">Aqua</option>
        <option value="#7fffd4">Aquamarine</option>
        <option value="#f0ffff">Azure</option>
        <option value="#f5f5dc">Biege</option>

        <option value="#ffe4c4">Bisque</option>
        <option value="#ffebcd">Blanched Almond</option>
        <option value="#8a2be2">Blue Violet</option>
        <option value="#a52a2a">Brown</option>
        <option value="#deb887">Burly Wood</option>
        <option value="#5f9eea0">Cadet Blue</option>

        <option value="#7fff00">Chartreuse</option>
        <option value="#d2691e">Chocolate</option>
        <option value="#ff7f50">Coral</option>
        <option value="#6495ed">Corn Flower Blue</option>
        <option value="#fff8dc">Cornsilk</option>
        <option value="#dc143c">Crimson</option>

        <option value="#00008b">Dark Blue</option>
        <option value="#008b8b">Dark Cyan</option>
        <option value="#b8860b">Dark Goldenrod</option>
        <option value="#a9a9a9">Dark Gray</option>
        <option value="#006400">Dark Green</option>
        <option value="#bdb76b">Dark Khaki</option>

        <option value="#8b008b">Dark Magenta</option>
        <option value="#556b2f">Dark Olive Green</option>
        <option value="#ff8c00">Dark Orange</option>
        <option value="#8b0000">Dark Red</option>
        <option value="#e9967a">Dark Salmon</option>
        <option value="#8fbc8f">Dark Sea Green</option>

        <option value="#483d8b">Dark Slate Blue</option>
        <option value="#2f4f4f">Dark Slate Gray</option>
        <option value="#00ced1">Dark Turquoise</option>
        <option value="#9400d3">Dark Violet</option>
        <option value="#ff1493">Deep Pink</option>
        <option value="#00bfff">Deep Sky Blue</option>

        <option value="#696969">Dim Gray</option>
        <option value="#1e90ff">Dodger Blue</option>
        <option value="#b22222">Fire Brick</option>
        <option value="#fffaf0">Floral White</option>
        <option value="#228b22">Forest Green</option>
        <option value="#ff00ff">Fuchsia</option>

        <option value="#dcdcdc">Gainsboro</option>
        <option value="#f8f8ff">Ghost White</option>
        <option value="#ffd700">Gold</option>
        <option value="#daa520">Goldenrod</option>
        <option value="#808080">Gray</option>
        <option value="#adff2f">Green Yellow</option>

        <option value="#f0fff0">Honeydew</option>
		
	  </select>
	</td>
  </tr>
  <tr>
    <td class=label>Color Sample</td>
    <td colspan=3 id=colorSample name=colorSample style="background-color:white;">&nbsp;</td>
  </tr>

  <tr>
    <td class=label>Lightness</td>
    <td colspan=3>
	  <table width=100% border=0 cellpadding=0 cellspacing=0>
	    <tr>
		  <td><a href="javascript: darker();"><img src="ButtonMinus.gif" border=0 title="Darken by 10%"></a></td>
		  <td><a href="javascript: lighter();"><img src="ButtonPlus.gif" border=0 title="Lighten by 10%"></a></td>
		</tr>

	  </table>
	</td>
  </tr>
  <tr>
    <td class=label>Saturation</td>
    <td colspan=3>
	  <table width=100% border=0 cellpadding=0 cellspacing=0>
	    <tr>

		  <td><a href="javascript: dilute();"><img src="ButtonMinus.gif" border=0 title="Dilute by 10%"></a></td>
		  <td><a href="javascript: saturate();"><img src="ButtonPlus.gif" border=0 title="Saturate by 10%"></a></td>
		</tr>
	  </table>
	</td>
  </tr>
  <!--
  <tr>
    <td>Debug</td>
    <td colspan=3><input _size=100 name=debug id=debug></td>
  </tr>
  -->
</table>
    </td>

  </tr>
</table>
</form>


</body>
</html>
