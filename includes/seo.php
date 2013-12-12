<?
echo '<div class="hline"></div>';
echo '<label>Search Engine Optimization</label><br/>';

if(isset($_POST['keywords']))
	{
	$setKeys = '<div class="seo"><div class="row"><label>Sitewide Keywords:</label><textarea name="sitewide-k" dir="ltr" class="seoArea"></textarea></div>
				<div class="row"><label>Sitewide Title:</label><input name="sitewide-t" dir="ltr" class="seoField" /></div>
				<div class="row"><label>Sitewide Description:</label><textarea name="sitewide-d" dir="ltr" class="seoArea"></textarea></div></div>
	';
	}
	
if(isset($_POST['pages']))
{
		$pagelist = $_POST['pages'];
		$pg = count($pagelist);	
		echo '<br /><br />';
		echo '<form name="seo" method="post" action="seo.php" id="seo" onSubmit="return verifyForm(\'seo\');">';
	
		echo $setKeys;
	
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
		echo '<input type="submit" value="Generate" /> <input type="reset" value="clear" />';
		echo '</form>';
	
	}
	
	else
	{
		echo '<fieldset><legend>Choose the pages to be optimized</legend>';
		echo '<form name="seo" action="'.$_SERVER['PHP_SELF'].'?newpage='.$_GET['newpage'].'" method="post">';
		echo '<input type="hidden" name="page" value="?newpage=../localhost" />';
		echo '<div class="row"><input type="checkbox" name="keywords" />Include Keywords</div>';
		$open = opendir($mdir);while(($file = readdir($open)) !== false)
		{if(strpos($file,'.php') || strpos($file,'.html')){echo '   <input type="checkbox" name="pages[]" value="'.$file.'">'.$file.'&nbsp;';}}
		closedir($open);
			echo '<div class="clear"></div>';
			echo '<input type="submit" value="Generate"/> <input type="reset" value="Clear"/>';
		echo '</form>';
		echo '</fieldset>';
	}
?>