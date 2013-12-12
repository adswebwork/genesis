<?php
//////////////////////////////////////////////////////////////
///   Genesis() by Andre D. Spencer <ads@adsgrfx.com>      ///
//        available at http://www.adsgrfx.com/downloads    ///
//////////////////////////////////////////////////////////////
//                                                         ///
// See: genesis.changelog.txt for recent changes           ///
// See: genesis.readme.txt for usage instructions          ///
//                                                         ///
//////////////////////////////////////////////////////////////
$password = '_1';


if(isset($_POST['access']) == $password && isset($_POST['user']) == $auth)
	{setcookie('name','auth',time()+360000);}

if(isset($_POST['access']) == $password || isset($_COOKIE['name']) == 'auth')
{
	$refresh = $get = $roota = '';
	if(isset($_GET['newpage'])):
	 	$pg = $show = $get = $_GET['newpage'];
		$nPage = $pg;
		$nPage = explode('/',$nPage);
		$nPage = $nPage[0];
		setcookie('lastProject',$nPage,time()+1800000); 
		$pgx = str_replace(' ','%20',$pg);
		$refresh = '?newpage='.$pg;
		$refresh = str_replace(' ','%20',$refresh);
	endif;
	$version = 'version.txt';
	$totalsize = filesize($version);
	$open = fopen($version,'r');
	$ver = fread($open,$totalsize);

	$pageName = '<img src="includes/logox.png"/> V '.$ver;
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
<fieldset><legend>Quick Links for <?php	
	if(isset($pg))
		{
			$links = str_replace('_',' ',$pg);
			$links = ucwords($links); 
			echo $links;
		} else{echo 'Genesis Root';}
	?></legend>
	<?php
	if(isset($pg)){$relImageList = '?setFolder='.$pg;$sIndex = $pg;}
	else{$relImageList = '';$sIndex = '';}
	// creates project specific link for activation below
	if(isset($pg))
		{  if(!strpos($pg,'/')){ $relImageLista = str_replace(' ','%20',$relImageList)?>		
<a href="imagelist.php<?= $relImageLista; ?>" target="_blank" title="Show images from the images folder of this site."><img src="icons/_view.png" /></a> 
<?php $sIndexV = str_replace(' ','%20',$sIndex); ?>
<a href="../<?=$sIndexV;?>" target="_blank" title="Opens the local index file of this site."><img src="icons/_site.png" /></a> 
<?php } 
$lIndex = strtolower($sIndex);
$dbfile = "sqlite/genesis.db";try {$db = new PDO('sqlite:'.$dbfile);}catch (PDOException $error) {print "error: " . $error->getMessage() . "<br/>";}
	$sql = 'select * from liveDomains where project = "'.$lIndex.'"';
	$res = $db->prepare($sql);$res->execute();
	while($row = $res->fetch())
	{
		$urlID = $row['id'];
		$name = $row['project'];
		$liveURL = $row['liveurl'];
	}
 if(!isset($urlID) && !strpos($lIndex,'/')) { # check the database to verify no url is set and this is not a subfolder ?>
<a href="#" onclick="popUpwindow('url.php?project=<?= $sIndex; ?>&amp;mode=add','Add live site infomation','width=500,height=300');" title="Add the url for the live version of this site."><img src="icons/_livenone.png" /></a>
<?php } ?>
<?php if(isset($urlID)) { // check the database to verify that a url is set?>
<a href="http://<?=$liveURL; ?>" target="_blank" title="Opens the live version site."><img src="icons/_livesite.png" /></a> 
<a href="#" onclick="popUpwindow('url.php?project=<?= $lIndex; ?>&amp;id=<?= $urlID; ?>&amp;mode=edit','Edit live site information','width=500,height=300');" title="Edit the url for the live version of this site."><img src="icons/_liveedit.png" /></a>
<?php } ?>
<a href="#seoArea" id="seoAread" title="Takes you to the SEO and SER section of this page"><img src="icons/_seo.png" /></a>
<?php	}	?>
	<a href="#" onclick="popUpwindow('url.php?mode=view','View all saved site infomation','width=500,height=300');" title="View all saved site references."><img src="icons/_project.png" /></a>
	<a href="scripts/" target="_blank" id="scripts" title="Takes you to the standard scripts directory."><img src="icons/_scripts.png" /></a> 
	<a href="phpinfo.php" target="_blank" title="Shows the php info of this server."><img src="icons/_php.png" /></a>
	</fieldset>
	<?php
	$root = '';
	if($get != ''):
		$rootSite = $get;
		$totlString = strlen($rootSite);
		$slashPart = strpos($rootSite,'/');
		$root = substr($rootSite,0, $slashPart);
		$roota = ucwords($root);
	endif;
	?>	
	<label>Main Navigation - <a href="/_genesis">Root</a> - <a href="/_genesis?newpage=<?php print $root; ?>"><?= $roota; ?></a></label><br/>
	<?php
if(isset($_COOKIE['lastProject'])): print '<label>Last Project: <a href="?newpage='.$_COOKIE['lastProject'].'">'.ucwords($_COOKIE['lastProject']).'</a></label><br/>';endif;
	?>
	<form action="?newpage=document.getElementById('txt1').value">
	<input type="text" id="txt1" onkeyup="showHint(this.value)">
	<span id="txtHint"></span></form>
	<select name="page" onChange="newpage();" id="newpage">
	<option value="/">Please Select</option>
	<option value="">Root</option>
	<?php
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
						echo '<option class="'.$b.'" value="'.$file.'"'.$is.'>'.$file.$sh.'</option>';
					}
			}
		}closedir($open); // closes the directory for the root files display
?></select>
<!--=======SECONDARY NAVIGATION=======###################################################################################################################-->	
	<?php
	
		if(isset($show) && strpos($show,'/') == false)
		{
	?>
	<select id="secondaryDdown" onchange="Snewpage();">
	<option value="#">&nbsp;</option>
	<?php
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
	<?php
		}
	
		?>
	
<!--=======CLOSES SECONDARY NAVIGATION=======-->
	<div class="clear">&nbsp;</div>
	<?php
echo '</div>';//closes nav
echo '<div class="hline">&nbsp;</div>';
$dir = '../'.isset($_GET['newpage']).'/';
$Q = '<br/>'; // sets a quick break
$f = '.'; // sets a check value for the files as a reference versus folder reference
$path = explode('/',$dir); // breaks the current path by the forward slashes
if(isset($path[3])){$lnk = '<a href="?newpage='.$path[1].'">';$clslnk = '</a>';}else{$lnk = '';$clslnk = '';} // check for a subfolder and activates the return link
if($set == ''){$set = 'Root';} // check for the select menu change and redirects the browser to the root page
echo '<h3>Active Folder: '.$lnk.$path[1].$clslnk.'/'.$path[2].'</h3>';
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
	$subD = '../'.isset($_GET['newpage']).'/';
	$filexba = str_replace(' ','%20',$file);
	$subDx = str_replace(' ','%20',$subD);
	$extra = '( <a href="'.$subDx.$filexba.'" target="_blank">Download Document</a> )'; // sets a link to create the link
	
	
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
		
	if(strpos($file,'/')){$dir = '/';}else {$dir = '../'.isset($_GET['newpage']).'/';}// if the item is a directory then sets the hyperlink avoid inorder to avoid invalid path in the dropdown
	$startDiv = ($v % $rowNum == 0) ? $evenRow : $oddRow; // alternates the colored background for easier navigation
			
			
	if($type == 'Folder: ')
		{	
			echo $startDiv;
			echo '<div style="float:left;">'.$type.$file.'</div>';
			$file = str_replace(' ','%20',$file);
			
			echo '<div style="float:right"><a href="explore.php?folder='.$subDx.'&amp;open='.$file.'" target="_blank" title="Open Folder"><img src="icons/_folder-grey.png" /></a></div>';
			echo '<div style="clear:both;"></div>';
			echo $endDiv;
			$folder++;
			$v++;
		
		}
	else 
		{
			echo $startDiv; $filexaq = str_replace(' ','%20',$file); $dir = str_replace(' ','%20',$dir);
			echo '<div style="float:left;">'.$type.'<a href="'.$dir.$filexaq.'" target="_blank" '.$tip.'>'.$file.'</a> '.$read.$view.$okView.'</div>';
			
			#check for flash related files
			if(strpos($file,'.swf') || strpos($file,'.fla') || strpos($file,'.flv'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="Open flash file"><img src="icons/_flash.png" /></a></div>';}
			
			#check for image files
			if(strpos($file,'.jpg') || strpos($file,'.gif') || strpos($file,'.png') || strpos($file,'.JPG'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" '.$tip.'><img src="icons/_view.png" /></a></div>';}
			
			#check for photoshop and illustrator files	
			if(strpos($file,'.psd') || strpos($file,'.PSD') || strpos($file,'.eps') || strpos($file,'.ai') || strpos($file,'.tif') ||  strpos($file,'.TIF'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="Open PSD"><img src="icons/_psd.png" /></a></div>';}
			
			#check for script files
			if(strpos($file,'.css') || strpos($file,'.js'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="Open code"><img src="icons/_code.png" /></a></div>';}
			
			#check for video files
			if(strpos($file,'.mov') || strpos($file,'.avi') || strpos($file,'.mpeg')  || strpos($file,'.wmv')|| strpos($file,'.mpeg4'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="View video"><img src="icons/_video.png" /></a></div>';}
			
			#check for documents		
			if(strpos($file,'.doc') || strpos($file,'.xls'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="Open File"><img src="icons/_document2.png" /></a></div>';}
			
			#check for database files	
			if(strpos($file,'.db') || strpos($file,'.sql'))
				{echo '<div style="float:right"><a href="'.$dir.$file.'" target="_blank" title="Open database"><img src="icons/_database-unknown.png" /></a></div>';}
			
			#check for site files
			if(strpos($file,'.html') || strpos($file,'.php') || strpos($file,'.htm') || strpos($file,'.xhtml') || strpos($file,'.shtml'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="Launch webpage"><img src="icons/_page.png" /></a></div>';}
			
			#check for compressed files	
			if(strpos($file,'.zip') || strpos($file,'.rar') || strpos($file,'.gz'))
				{echo '<div style="float:right"><a href="'.$dir.$filexaq.'" target="_blank" title="Dowload rar/zip"><img src="icons/_zip.png" /></a></div>';}
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
echo '<p class="totop"><a href="?newpage='.$pgx.'#seoArea" title="To Seo Top"><img src="icons/_top2.png" /></a></p>';
}

else {
	?>
	<?php include('includes/header-genesis.php'); ?>
	<?php if(isset($_COOKIE['logstatus'])) {echo '<strong>Status: </strong><i>Logged Out</i>';}?> <!-- status of the cookie-->
	<div align="center" style="width:400px;margin:0px auto;">
	<h2>Welcome to ' The Genesis Project '</h2>
	<img src="includes/logo.jpg" />
	<h5>Password required to proceed</h5>
	<form name="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<input type="hidden" name="userid" value="Authorized User" />
	<input type="password" name="access" id="access" value="genesisproject" onfocus="clearMe('access')"/>
	<input type="submit" value="Access"/>
	</form>
</div>
	<?php	}
	#print_r($_COOKIE);
include('includes/footer-genesis.php');
	?>
