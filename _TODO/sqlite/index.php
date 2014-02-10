<?php
$password = 'genesis_1';

if($_POST['access'] == $password && $_POST['user'] == $auth)
	{setcookie('name','auth',time()+360000);}
if($_POST['access'] == $password || $_COOKIE['name'] == 'auth')
{
$pg = $_GET['newpage'];
$version = 'version.txt';
$totalsize = filesize($version);
$open = fopen($version,'r');
$ver = fread($open,$totalsize);

$pageName = 'Genesis V '.$ver;
$pageHelp = ' (<a href="#" onclick="popUpwindow(\'release.php\',\'Release Notes: Version '.$version.'\',\'width=500,height=700\')">View Release Notes</a>)';

// This page allows dropdown ONLY
$ddown = '<link type="text/css" rel="stylesheet" href="css/transmenu.css"/><!--sets the styles for the drop down menu-->';
if(isset($pg)){
$ddown .='<script type="text/javascript" src="java/transmenuC.js"></script><!--allows the drop down fuctionality-->';
$MenuT = '<script type="text/javascript">initTransMenu();</script>';
}
//=================================================================================================================

include('includes/header-genesis.php');
include_once('includes/functions.php');
$today = date("g:i:s A");
if(isset($pg)){$refresh = '?newpage='.$pg;}
echo 	'<div align="right" style="float:right;">	
		<a href="../_genesis'.$refresh.'" title="Refresh Page"><img src="icons/_restart.png" style="margin-right:15px;" /></a>
		<a href="logout.php" title="Logout"><img src="icons/_logout.png" /></a>
		</div>
		';
echo '<label>Last Refreshed: </label>'.$today;
echo '<br /><label> Current Time:&nbsp;&nbsp;&nbsp;&nbsp; <span id="clock"></span></label>';
echo '<div class="clear"></div>';
$mdir = '../'; // creates the directory of the root folder
$open = opendir($mdir); // opens the root folder
echo '<div id="nav">';?>

<fieldset><legend>Quick Links for <?	
	if(isset($pg))
		{
			$links = str_replace('_',' ',$pg);
			$links = ucwords($links); 
			echo $links;
		} else{echo 'Genesis Root';}
	?></legend>
	<?
	
	if(isset($pg)){$relImageList = '?setFolder='.$pg;$sIndex = $pg;}
	else{$relImageList = '';$sIndex = '';}
	// creates project specific link for activation below
	if(isset($pg))
		{ ?>
<a href="imagelist.php<?= $relImageList; ?>" target="_blank" title="Show images from the images folder of this site."><img src="icons/_view.png" /></a> 
<a href="../<?=$sIndex;?>" target="_blank" title="Opens the local index file of this site."><img src="icons/_site.png" /></a> 
<a href="../<?=$sIndex; ?>" target="_blank" title="Opens the live version site."><img src="icons/_livesite.png" /></a> 
<a href="#" onclick="popUpwindow('url.php?mode=add','Add live site infomation','width=500,height=300');" title="Add the url for the live version of this site."><img src="icons/_livenone.png" /></a>
<a href="#" onclick="popUpwindow('url.php?mode=edit','Edit live site information','width=500,height=300');" title="Edit the url for the live version of this site."><img src="icons/_liveedit.png" /></a>
<a href="#seoArea" id="seoAread" title="Takes you to the SEO and SER section of this page"><img src="icons/_seo.png" /></a>
<?	}	?>
	
	
	<a href="#" onclick="popUpwindow('url.php?mode=view','View all saved site infomation','width=500,height=300');" title="View all saved site references."><img src="icons/_project.png" /></a>
	<a href="scripts/" target="_blank" id="scripts" title="Takes you to the standard scripts directory."><img src="icons/_scripts.png" /></a> 
	<a href="phpinfo.php" target="_blank" title="Shows the php info of this server."><img src="icons/_php.png" /></a>
	</fieldset>
	<?
	$rootSite = $get;
	$totlString = strlen($rootSite);
	$slashPart = strpos($rootSite,'/');
	$root = substr($rootSite,0, $slashPart);
	$roota = ucwords($root);
	?>	
	<label>Main Navigation - <a href="/_genesis">Root</a> - <a href="/_genesis?newpage=<?= $root; ?>"><?= $roota; ?></a></label><br/>
	<select name="page" onChange="newpage();" id="newpage">
	<option value="/">Please Select</option>
	<option value="">Root</option>
	<?
		$img = '   <<<';
		$nada = '';
		$act = 'selected = "selected"';
		$show = $_GET['newpage'];
		
	
		while(($file = readdir($open)) !== false)
		{if($file != '.' && $file != '..')
			{
				if(!strpos($file,'.') && $file != '_genesis' && $file != 'scripts')// shows the folders in the site root as options
					{
						$sh = ($file == 'images') ? $img : $nada;
						$is = ($file == $show) ? $act : $nada;
						echo '<option value="'.$file.'"'.$is.'>'.$file.$sh.'</option>';
					}
			}
		}closedir($open); // closes the directory for the root files display
		
		
	?></select>

	
<!--********************SECONDARY NAVIGATION*********************************-->	
	<?

		
		$show = $_GET['newpage'];
		if(isset($show) && strpos($show,'/') == false)
		{
	?>

	<select id="secondaryDdown" onchange="Snewpage();">
	<option value="#">&nbsp;</option>
	<?
		$sDir = '../'.$show.'/';
		$sOpen = opendir($sDir);
		while(($sFolder = readdir($sOpen)) !== false)
		{
			if(!strpos($sFolder,'.') && $sFolder != '.' && $sFolder != '..')
			{
				
				echo '<option value="/'.$sFolder.'">'.$sFolder.'</option>';
			}
		}
	?>
	</select>	
	<?

		}
	?>
	
	
<!--************************************************************************-->
	<div class="clear">&nbsp;</div>
	<?
echo '</div>';//closes nav

echo '<div class="hline">&nbsp;</div>';
$dir = '../'.$_GET['newpage'].'/';
$Q = '<br/>'; // sets a quick break
$f = '.'; // sets a check value for the files as a reference

$set = str_replace('/','/',$dir);
$set = str_replace('..','',$set);
if($set == ''){$set = 'Root';} // check for the select menu change and redirects the browser to the root page
echo '<h3>Active Folder: '.$set.'</h3>';
$folder = 0; // clears the count of the folders
$filet = 0; // clears the count of the files
echo $Q;
$open = opendir($dir); // begins the process by opening the directory
$v = 0; // sets the variable to be incremented to allow for the alternating background color


echo '<div id="listView">';
while(($file = readdir($open)) !== false)
{
	
	if($file != '.' && $file != '..' && $file != '_genesis') // ensures that the common files are not listed
	{	
	
	$nada = ''; //creates a blank value
	$evenRow = '<div class="rowEven">';
	$oddRow = '<div class="rowOdd">';
	$endDiv = '</div>';
	$rowNum = 2;
	
	
	
	
	$subD = '../'.$_GET['newpage'].'/';
	$extra = '( <a href="'.$subD.$file.'" target="_blank">Download Document</a> )'; // sets a link to create the link
	
	
	if(strpos($file,$f)){$type = 'File: ';}else{$file = $file.'/'; $type = 'Folder: ';} // labels the item: File or Folder
	if(strpos($file,'.txt') || strpos($file,'.doc') || strpos($file,'xls')){$read = $extra;}else{$read = $nada;} // checks for txt,doc or xls in the item and if found display read more option
	if(strpos($file,'.jpg') || strpos($file,'.gif') || strpos($file,'.png') || strpos($file,'.JPG'))
		{
			
			$im = $dir.$file;
			$size = getimagesize($im);
			$w = $size[0];
			$h = $size[1];
			$subF = $_GET['newpage'];
			$cPath = (isset($subF)) ? $subF : $nada; // sets a variable equal to the new page if it's set
			
			$picture = "onmouseover=\"Tip('<img src=../".$cPath."/".$file." width=".$w." height=".$h.">')\" onmouseout=\"UnTip()\""; // sets the picture rollover
			$tip = $picture;
			$vw = '<span style="font-size:10px;color:#00688b;">&lt; hover to view image</span>';
			$vr = '<span style="font-size:10px;color:#00688b;">&gt; hover to view image</span>';
			$okView = $vw;
		}
	else
		{
			$tip = $nada;
			$okView = $nada;
		} // checks for jpg,gif or png and shows the tool tip picture rollover
		
	if(strpos($file,'/')){$dir = '/';}else {$dir = '../'.$_GET['newpage'].'/';}// if the item is a directory then sets the hyperlink avoid inorder to avoid invalid path in the dropdown
	$startDiv = ($v % $rowNum == 0) ? $evenRow : $oddRow; // alternates the colored background for easier navigation
			
			
		if($type == 'Folder: ')
			{	
				echo $startDiv;
				echo '<div style="float:left;">'.$type.$file.'</div>';
				echo '<div style="float:right"><a href="explore.php?folder='.$subD.'&open='.$file.'" target="_blank" title="Open Folder"><img src="icons/_folder-grey.png" /></a></div>';
				echo '<div style="clear:both;"></div>';
				echo $endDiv;
				$folder++;
				$v++;
			
			}
	else 
		{
			echo $startDiv;
			echo '<div style="float:left;">'.$type.'<a href="'.$dir.$file.'" target="_blank" '.$tip.'>'.$file.'</a> '.$read.$view.$okView.'</div>';
			
			#check for flash related files
			if(strpos($file,'.swf') || strpos($file,'.fla') || strpos($file,'.flv'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Open flash file"><img src="icons/_flash.png" /></a></div>';}
			#check for image files
			if(strpos($file,'.jpg') || strpos($file,'.gif') || strpos($file,'.png') || strpos($file,'.JPG'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" '.$tip.'><img src="icons/_view.png" /></a></div>';}
			#check for photoshop and illustrator files	
			if(strpos($file,'.psd') || strpos($file,'.PSD') || strpos($file,'.eps') || strpos($file,'.ai') || strpos($file,'.tif') ||  strpos($file,'.TIF'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Open PSD"><img src="icons/_psd.png" /></a></div>';}
			#check for script files
			if(strpos($file,'.css') || strpos($file,'.js'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Open code"><img src="icons/_code.png" /></a></div>';}
			#check for video files
			if(strpos($file,'.mov') || strpos($file,'.avi') || strpos($file,'.mpeg')  || strpos($file,'.wmv')|| strpos($file,'.mpeg4'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="View video"><img src="icons/_video.png" /></a></div>';}
			#check for documents		
			if(strpos($file,'.doc') || strpos($file,'.xls'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Open PSD"><img src="icons/_document2.png" /></a></div>';}
			#check for database files	
			if(strpos($file,'.db') || strpos($file,'.sql'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Open database"><img src="icons/_database-unknown.png" /></a></div>';}
			#check for site files
			if(strpos($file,'.html') || strpos($file,'.php') || strpos($file,'.htm') || strpos($file,'.xhtml') || strpos($file,'.shtml'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Launch webpage"><img src="icons/_page.png" /></a></div>';}
			#check for compressed files	
			if(strpos($file,'.zip') || strpos($file,'.rar') || strpos($file,'.gz'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Dowload rar/zip"><img src="icons/_zip.png" /></a></div>';}
			#______________________________________	
			echo '<div style="clear:both;"></div>';
			echo $endDiv;
			$filet++;
			$v++;
			
		}
				
				
	}
}

closedir($open);
echo '</div>';

echo '<b>Currenlty: '.$folder.' Folders &amp; '.$filet.' Files</b>';// shows the amount of files and folders in the current directory
echo '<p class="totop"><a href="#top" title="Top"><img src="icons/_top.png" /></a></p>';
include_once('includes/seolist.php');  //includes the search engine optomization
echo '<p class="totop"><a href="?newpage='.$_GET['newpage'].'#seoArea" title="To Seo Top"><img src="icons/_top2.png" /></a></p>';
}

else {
	?>
	<? include('includes/header-genesis.php'); ?>
	<? if(isset($_COOKIE['logstatus'])) {echo '<strong>Status: </strong><i>Logged Out</i>';}?> <!-- status of the cookie-->
	<div align="center" style="width:400px;margin:0px auto;">
	<h2>Welcome to ' The Genesis Project '</h2>
	<img src="includes/logo.jpg" />
	<h5>Password required to proceed</h5>
	<form name="login" action="<? $_SERVER['PHP_SELF'] ?>" method="post">
	<input type="hidden" name="userid" value="Authorized User" />
	<input type="password" name="access" id="access" value="genesisproject" onfocus="clearMe('access')"/>
	<input type="submit" value="Access"/>
	</form>
</div>

	 
	<?	}
	


include('includes/footer-genesis.php');

	?>
