<?php 
if(!$_COOKIE['name'] == 'auth') //authorized user check
	{header("location:index.php");}
	else {

if(isset($_GET['setFolder'])):
	$fld = $_GET['setFolder'];
	$for = (isset($fld)) ? ' of ('.$fld.')' : '';		
	$pageName = 'Image List'.$for;	
endif;
include_once('includes/header-genesis.php'); 

?>

<a name="top"></a>
<form name="imagesearch" id="imagesearch" method="post" action="<?php $_SERVER['PHP_SELF']?>">
<script type="text/javascript">
function setXt()
	{
	myf = document.getElementById('imagesearch');
	myf.searchme.value = myf.xtn.value; // updates the actual value for the search
	}
function uDate()
	{
	myf = document.getElementById('imagesearch');
	myf.searchme.value = myf.searchx.value; // updates the actual value for the search
	}
</script>
<?php
$today = date("g:i:s A");
echo '<label>Last Refreshed: </label>'.$today;
echo '<br /><label> Current Time:&nbsp;&nbsp;&nbsp;&nbsp; <span id="clock"></span></label>';
echo '<div class="clear"></div>';
?>
<div class="row2"><label>Search Extension:</label> <select name="xtn" id="xtn" style="width:122px;" onChange="setXt();">
<option value=".">All File Types</option>
<option value=".jpg">jpg</option>
<option value=".jpeg">jpeg</option>
<option value=".png">png</option>
<option value=".gif">gif</option>
<option value=".psd">psd</option>
<option value=".ai">ai</option>
<option value=".tif">tiff</option>
</select>
</div>

 <?php 
 
 	$specialFolder = $_GET['setFolder']; 
 	if(isset($specialFolder))
 		{$refresh = 'imagelist.php?setFolder='.$specialFolder;}else{$refresh = 'imagelist.php';} // updates the link for the refresh button
 
 
 ?> 
 <div class="row2"><label>Search filename:</label>
 <input type="text" name="searchx" onKeyUp="uDate();" /> 
</div>
<div class="row2"><label>&nbsp;</label>
<input type="submit" value="Search" class="btn"/>&nbsp;<input type="reset" value="Reset" class="btn" onClick="location.href='<?= $refresh; ?>'">
<input type="hidden" id="searchme" name="searchme" value="."/>
</div>
</form>

<?php
$b = '<br />';


if(isset($specialFolder)) // checks to see if the page should show the images of a specific site
{$dir = '../'.$specialFolder.'/www/images/';}else {$dir = '../www/images/';} // if it should, it does, if it shouldn't then it shows the content of the images folder in the root directory

if(!isset($_POST['searchme']))
	{
		$string = '.'; // default value
	}
	else
		{
			$string = $_POST['searchme'];
		}
echo '<br>';
echo 'Results for "'.$string.'"<br>';
$num = 0;

if(is_dir($dir))
{
	$open = opendir($dir);
	while(($file = readdir($open)) !== false)
		{
			if($file != '.' && $file != '..' && $file != 'Thumbs.db' && $file != '.svn')
				{
					$nFile = '_'.$file; //pads the search variable with 1 character to allow us to search from the 1st position
					$found = strpos($nFile,$string);
					if($found == true)
						{
						$img = $dir.$file;
						$filet = substr($file,0,-4);
						
						list($w, $h) = getimagesize($img);
						echo '<div class="image">';
						echo '<div class="lineItem2">File name: '.$file.'</div>';
						echo '<div class="lineItem">Full Dimensions: '.$w.'px * '.$h.'px </div>';
						$size = filesize($img);
						echo '<div class="lineItem2">File size: '.format_size($size,2).'</div>';
						echo '<img src="'.$dir.$file.'"/>'.$b;
						$dira = str_replace('../','',$dir);
						echo '<b>HTML</b><br />';
						echo '&lt;img src="images/'.$file.'" alt="'.$filet.'" /&gt;'.$nl;
						echo '<b>CSS</b><br />';
						echo 'background:url(../images/'.$file.');';
						echo $b.'</div>';
						echo '<div align="right"><a href="#top">^Top</a></div>';
						$num++;
					
						}
				}
		}
		closedir($open);
		


echo '<b>'.$num.'</b> image/s in folder matching the: <span class="highlight">'.$string.'</span> search.';
echo '<p style="margin:10px;"><a href="#top">^Top^</a></p>';
}		
else{ echo '<h1>No folder name "images" in this site</h1>';}


	
	}

include_once('includes/footer-genesis.php'); ?>
