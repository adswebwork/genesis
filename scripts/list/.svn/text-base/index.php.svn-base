<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
   "http://www.w3.org/TR/html4/frameset.dtd">
<HTML><HEAD><TITLE>Automated Image Generation</TITLE>
<style type="text/css">input{border:1px solid #aaa;background:#e9e9e9;color:#000;}p{text-align:center;color:#e9e9e9;}
h1 {color:#999;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:18pt;text-align:center;}
.boxindent {background-color:#FFF;border:1px solid #CCC;
font-family:verdana,arial,helvetica,sans-serif;font-size:10pt;margin:10px auto;padding:3px 5px;color:#666666;width:600px;}

</style></HEAD><body>
<h1>Automated Image List</h1>
<p class="boxindent">This script automatically generates a list of numbered images based on a url entry.</p>

<? if(!empty($_GET)){?><a name="top"></a><a href="#end">End of Page</a><br /><hr />
<? 	$num = $_GET['num'];$url = $_GET['url'];$max = $_GET['amt'];$case = $_GET['case'];
for($i=$num;$i<=$max;$i++){
echo '<img src="'.$url.$i.'.'.$case.'"/>';
if(strlen($i) == 1) 
{$i = '0'.$i;}
echo '<img src="'.$url.$i.'.'.$case.'"/>';}	?>
<br /><hr /><a href="index.php">Back to Index</a> | <a href="#top">Top</a><a name="end"></a><hr /><? } ?>
<form name="newImg" method="get" action="index.php">
URL:<br /> <input type="text" name="url" style="width:400px;" /><br /><br />
Starting Image #<br /><input type="text" name="num" value="1"  style="width:50px;" /><br /><br />
Est Amount of Images:<br /><input type="text" name="amt" value="30"  style="width:50px;" /><br /><br />
Extension case: <input type="radio" name="case" value="JPG"/>JPG | <input checked="checked" type="radio" name="case" value="jpg" />jpg<br /><br />
<button type="submit">Generate</button> <a href="index.php">Reset</a>
</form><hr />
</body></HTML>
