<?
$folder = $_GET['folder'];
$file = $_GET['file'];
$fp = '../'.$folder.'/'.$file;
$seo = $_GET['seo'];
$b = '<br />';
echo 'Folder: '.$folder.$b;
echo 'File: '.$file.$b;
echo 'Filepath: '.$fp.$b;
echo 'Seo: '.$seo.$b;

?>