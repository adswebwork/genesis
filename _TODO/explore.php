<?php
$folder = $_GET['folder'];
$folder = str_replace('..','',$folder);
$sFolder = $_GET['open'];
$currentdir = $_SERVER["DOCUMENT_ROOT"].$folder.$sFolder;
$currentdir = str_replace ("/", "\\", $currentdir);


try {
   $oWSH = new COM("WScript.Shell");
   $oWSH->Run('explorer "'.$currentdir.'"');
}
catch (Exception $e) {
    //print "error: " . $error->getMessage() . "<br/>";
    exec('explorer "'.$currentdir.'"');
}

?>
<script type="text/javascript">window.close('self');</script>
