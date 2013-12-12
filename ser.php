<?
$site = $_GET['site'];
$folder = $_GET['folder'];
$file = $_GET['file'];
$ti = $_GET['ti'];
$de = $_GET['de'];
$keywords = $_GET['ke'];


#Special Characters
$ti = str_replace('Qamp','&amp;',$ti);
$de = str_replace('Qamp','&amp;',$de);
$keywords = str_replace('Qamp','&amp;',$keywords);
#____________
$ke = substr($keywords,0,-1);



$ti = '<title><? if(isset($pageTitle)){echo $pageTitle;}else {echo "'.$ti.'" ;} ?></title>';
$de = '<meta name="description" content="<? if(isset($pageDes)){echo $pageDes;}else {echo "'.$de.'";} ?>"/>';
$ke = '<meta name="keywords" content=" '.$ke.'" />';


$writeTo = '../'.$site.'/'.$folder.'/'.$file;#sets the the file that will be edited
$all = filesize($writeTo); #get the file size
$find = '<!-- SER AUTOMATION -->'; #looks for this string which if coded correctly will be at the beginning of the source file.
$replace = $ti.$de.$ke;#sets what the string 'find' should be replaces with.
$open = fopen($writeTo,'r');
$current = fread($open,$all);
fclose($open); #opens content of file and stores the text in the variable 'current'
$edit = fopen($writeTo,'w');$current = str_replace($find,$replace,$current);fwrite($edit,$current);fclose($edit); #opens in write mode, replace content and closes the file
?>
<script type="text/javascript">
alert("SER Updated Successfully");// informs users of success
window.close('self'); //closes window
</script>
