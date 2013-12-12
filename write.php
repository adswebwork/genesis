<?
$folder = $_GET['folder'];
$file = $_GET['file'];
$writeTo = $folder.'/'.$file;
$all = filesize($$writeTo); #get the file size
$find = '<!-- SEO -->'; #looks for this string which if coded correctly will be at the beginning of the source file.
$replace = $_GET['seo']; #sets what the string 'find' should be replaces with.
$open = fopen($writeTo,'r');$current = fread($open,$all);fclose($open); #opens content of file and stores the text in the variable 'current'
$edit = fopen($writeTo,'w');$current = str_replace($find,$replace,$current);fwrite($edit,$current);fclose($edit); #opens in write mode, replace content and closes the file
?>