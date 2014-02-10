<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
   "http://www.w3.org/TR/html4/frameset.dtd">
<HTML><HEAD><TITLE>Automated Image Generation</TITLE>
<style type="text/css">input{border:1px solid #aaa;background:#e9e9e9;color:#000;}p{text-align:center;color:#e9e9e9;}
</style></HEAD><body onload="document.getElementById('url').focus();"><? if(!empty($_GET)){?><a name="top"></a><a href="#end">End of Page</a><br /><hr />

<?


$num = $_GET['num'];
$url = $_GET['url'];
$y = strlen($url);
$go = substr($url,-6,1) ;
$b = ($go == '/') ? 3 : 4;
$y = strlen($y) + $b;


$n = strlen($url);
$v = ($y - $n);
$v = str_replace('-',' ',$v);
$url = substr($url, 0, $v);
$max = $_GET['amt'];
$case = $_GET['case'];

for($i=$num;$i<=$max;$i++){
#       echo '<img src="'.$url.$i.'.'.$case.'"/>';
        if(strlen($i) == 1 && $b == 4) {$i = '0'.$i;}
        echo '<img src="'.$url.$i.'.'.$case.'"/>';

#       if($i < 10): $i = '0'.$i; endif;
#       $path = $url.$i.'.'.$case;
#       print '<br/><a href="'.$path.'">'.$path.'</a>';
        }

        ?>
<br /><hr /><a href="index.php">Back to Index</a> | <a href="#top">Top</a><a name="end"></a><hr /><? } ?>
<form name="newImg" method="get" action="index.php#top">
URL:<br /> <input type="text" name="url" style="width:400px;" id="url" /><br /><br />
Starting Image #<br /><input type="text" name="num" value="1"  style="width:50px;" /><br /><br />
Est Amount of Images:<br /><input type="text" name="amt" value="30"  style="width:50px;" /><br /><br />
Extension case: <input type="radio" name="case" value="JPG"/>JPG | <input checked="checked" type="radio" name="case" value="jpg" />jpg<br /><br />
<button type="submit">Generate</button> <a href="index.php">Reset</a> | <a href="index.php" target="_blank">New</a>
</form><hr />


<?
echo $url;
die;
?>
</body></HTML>
