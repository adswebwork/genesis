<?
$folder = $_GET['folder'];
$file = $_GET['file'];
$code = $_GET['code'];
$writeTo = '../'.$folder.'/includes/'.$file;
$all = filesize($writeTo); #get the file size
$find = '<!-- ANALYTICS -->'; #looks for this string which if coded correctly will be at the beginning of the source file.
$analytics = '<script type="text/javascript">var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));</script><script type="text/javascript">var pageTracker = _gat._getTracker("'.$code.'");pageTracker._trackPageview();</script>';
$replace = $analytics;#sets what the string 'find' should be replaces with.
$open = fopen($writeTo,'r');
$current = fread($open,$all);
fclose($open); #opens content of file and stores the text in the variable 'current'
$edit = fopen($writeTo,'w');$current = str_replace($find,$replace,$current);fwrite($edit,$current);fclose($edit); #opens in write mode, replace content and closes the file
?>
<script type="text/javascript">
alert("Google Analytics Updated Successfully");
window.close('self');
</script>