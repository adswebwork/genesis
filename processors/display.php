<?php
include('functions.php');
json();

$ignoreFiles = array(".","..","genesis",".DS_Store",".metadata","index.php","_backups","_pending-delete","_unittest.zip","_unittests","_websiteframework","RemoteSystemsTempFiles");

$dir = $root;
$open = opendir($dir);

$websites = array(); $websiteCount = 0;
$array = '{"websites" : [';
while(( $file = readdir($open)) != false){
    if(!in_array($file,$ignoreFiles)){
        $array .= '"'.$file.'", ';
        $websiteCount++;
    }
}

$array = substr($array,0,-2);
$array .= '], "sitecount" : '.$websiteCount.'}';
print $array;




?>