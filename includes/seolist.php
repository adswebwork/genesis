<?
echo '<div class="hline"></div>';
if(isset($_GET['newpage']))
{
	$uDir = $_GET['newpage'];
	$uDir = strtolower($uDir);
	$uDir = ucwords($uDir);
	$uDirx = str_replace(' ','%20',$uDir);
}

echo '<a name="seoArea"></a>';
echo '<label>Search Engine Optimization / Registration / Google Analytics - (<span class="bRed"><b>&nbsp;'.$uDir.'&nbsp;</b></span>)</label><br/>';

if(isset($_POST['keywords']))
	{
	$setKeys = '<div class="seo2"><div class="row"><label>Sitewide Keywords:</label><textarea name="Keywords" dir="ltr" class="seoArea"></textarea></div>
				<div class="row" id="formatedRow"><label>Format Keywords: </label><input type="button" value="Format" onmouseup="return formatKeys();" > &lt; &lt; Use this button to format the list of keywords above.</div>
				<div class="row"><label>Sitewide Title:</label><input name="Sitewide-Title" dir="ltr" class="seoField" /></div>
				<div class="row"><label>Sitewide Description:</label><textarea name="Sitewide-Description" dir="ltr" class="seoArea"></textarea></div></div>
	';
	$invisible = '<script type="text/javascript">noGenerate();</script>';
	}

	
if(isset($_POST['google']))
	{
	$setgoogle = '<div class="seo">
				  <div class="row"><label>Google Analytics Code:</label><input type="text" name="Analytics" dir="ltr" class="seoArea"/></div>
				  </div>
	';
	}	
	
	
if(isset($_POST['page']))
{
		$pagelist = $_POST['page'];
		$pg = count($pagelist);	
		echo '<br /><br />';
		echo '<form name="seo" method="post" action="seo.php" id="seo" onSubmit="return verifyForm(\'seo\');">';
		echo '<input type="hidden" name="pageName" value="'.$_GET['newpage'].'"/>';
		echo $setKeys;
		echo $setgoogle;
	
		for($y=0;$y<$pg;$y++)
		{
			$newname = substr($pagelist[$y],0,strpos($pagelist[$y],'.'));
			$newname = ucwords($newname);
			$des = strtolower($newname);
			echo '<div class="seo">';
			echo '<div class="row"><label>'.$newname.' Page Title:</label><input type="text" name="'.$des.'_page_title" class="seoField" dir="ltr" /></div>';
			echo '<div class="row"><label>'.$newname.' Page Description:</label><textarea name="'.$des.'_page_description" class="seoArea" dir="ltr"></textarea></div>';
			echo '</div>';
		}
		echo '<div class="row" id="genRow"><label>&nbsp;</label><input type="submit" value="Generate"/> <input type="reset" value="clear" /></div>';
		echo $invisible;
		echo '</form>';
	
	}
	
	else
	{
		echo '<fieldset id="seoStuff"><legend>Choose the pages to be optimized</legend>';
		echo '<form name="seoOption" id="seoOption" action="'.$_SERVER['PHP_SELF'].'?newpage='.$uDirx.'#seoArea" method="post" onSubmit="return checkReg();">';
		echo '<input type="hidden" name="page" value="?newpage=../localhost" />';
		echo '<div class="pageSet"><div class="row"><input type="checkbox" name="keywords" />Search Engine Registration</div></div>';
		echo '<div class="pageSet"><div class="row"><input type="checkbox" name="google" />Google Analytics</div></div>'.$clear;
		
		$set = 0;
		$maxSet = 4; #determines the columns to be displayed
		
		if(isset($_GET['newpage']))
		{
			$mdir = '../'.$_GET['newpage'];
		}
		
		$open = opendir($mdir);while(($file = readdir($open)) !== false)
			{
				if(strpos($file,'.php') || strpos($file,'.html'))
					{
						echo '<div class="pageSet"> <input type="checkbox" name="page[]" value="'.$file.'">'.$file.'&nbsp;</div>';
						$newrow = ( $set % $maxSet == 0) ? $clear : '';
						if($set == 0){$newrow = '';}
						echo $newrow;
						$set++;
						
					}
			}
		closedir($open);
			
			echo '<div class="clear"></div>';
			$setA = $set;
			echo '<input type="text" value="'.$setA.'" name="checkboxes" id="boxAmount" style="display:none;"/>';
			echo '<input type="submit" value="Generate" /> <input type="button" value="Check All" onClick="checkAll();"/> <input type="reset" value="Clear"/>';
		echo '</form>';
		echo '</fieldset>';
	}
?>
