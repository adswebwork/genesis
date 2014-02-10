<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Custom Container - Scalable boundries with custom corners</title>
<style type="text/css">
#box{width: 400px; background: #537293;}
#box .left{float: left;}
#box .right{float: right;}
#box p{margin:0px;padding:10px;clear:both;color:#fff;}
#box img{}
div.clear{clear:both;height:0px;line-height:0px;}
textarea{clear:both;display:block;margin:10px;border:1px solid #537293;height:200px;width:400px;} 
button{background:#fff;border:1px solid #537293;margin:10px;}
	button:hover{background:#e9e9e9;color:#000;}
h1 {color:#999;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:18pt;text-align:center;}
.boxIndent {background-color:#FFF;border:1px solid #CCC;
font-family:verdana,arial,helvetica,sans-serif;font-size:10pt;margin:10px auto;padding:3px 5px;color:#666666;width:600px;}

</style>

<script type="text/javascript">
function updateT()
	{
	newT = document.getElementById('displayText');
	oldT = document.getElementById('textBox');
	newT.innerHTML = oldT.value;
	oldT.value = '';
	}
	function wide()
		{
			val = 700;
			box = document.getElementById('box');
			box.style.width = val + 'px';	
			
		}
	function narrow()
		{
			val = 300;
			box = document.getElementById('box');
			box.style.width = val + 'px';	
		}
	function standard()
		{
			val = 400;
			box = document.getElementById('box');
			box.style.width = val + 'px';	
		}

</script></head>
<body>
<h1>Color Calculator</h1>
<p class="boxIndent">This script displays uses images to create dynamic round corner call outs. Paste your text in the textarea below can view the availabel option</p>
<textarea name="textBox" id="textBox"></textarea>
<button type="button" onClick="updateT();">Update</button>
<button type="button" onClick="wide();">&lt;-Wide -&gt;</button>
<button type="button" onClick="standard();">Standard</button>
<button type="button" onClick="narrow();">-&gt; Narrow &lt;-</button>


<div id="box">
     <img src="tl.jpg" class="left" alt=""/>
     <img src="tr.jpg" class="right" alt=""/>
     <!-- -->
	<p id="displayText">
	</p>

	 <!-- -->
     <img src="bl.jpg" class="left" alt=""/>
     <img src="br.jpg" class="right" alt=""/>
     <div class="clear"></div>
</div> 
</body>
</html>
