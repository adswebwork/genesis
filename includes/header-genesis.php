<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- DISABLE CACHE 
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
-->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php $current = $_SERVER['PHP_SELF']; 
	$current = str_replace('_', '',$current);
	$current = str_replace('/',' - ',$current);
	$page = ucwords($current);
	$nl = '<br />';
	$clear = '<div class="clear"></div>';
	include('includes/functions.php');
?>
<title><?php echo $page; ?></title>
<link href="css/style-genesis.css" rel="stylesheet" type="text/css" />   <!--set the master style for the genesis application-->
<link href="includes/favicon.png" rel="icon" />  
<link rel="icon" href="includes/favicon.gif" type="image/gif"> 
<link rel="shortcut icon" href="includes/favicon.gif" type="image/gif"> <!--set up the favicon-->
<script type="text/javascript" src="java/java.js"></script>              <!--simple javascripts - seperate from verifyform-->            
<?php include('java/transmenuinit.php');
if(isset($ddown)) {echo $ddown;}
 ?><!--allows for dynamic population of the menu items for the dropdowns-->
<!--[if IE 7]>
<style type="text/css">.transMenu .background{filter:alpha(opacity=80);} .transmenu .shadowRight{filter:alpha(opacity=40);} .transmenu .shadowBottom{filter:alpha(opacity=40); }</style>
<![endif]-->
<!--pulls the IE specific classes to the php file so firefox will not evaluate a warning-->
<style type="text/css">
a:active{color:#009;}
/* test */



<?php print $styles; ?>
</style>

</head>
<body>


<script type="text/javascript" src="java/wz_tooltip.js"></script>  <!--sets the tool tips hover effect - (Somewhat like the title tag for hyperlinks-->
<a name="top"></a>
<p class="topSection"><span id="pageName"><?php print isset($pageName); ?></span><span class="pageHelp"><?= isset($pageHelp); ?></span></p>
<div class="borders"><img src="images/_top.png" /></div>
<img src="images/blue.jpg" class="bg"/>

<div id="content">
