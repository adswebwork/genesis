<?
include('includes/header-genesis.php');

$today = date("g:i:s A");
echo '<label>Last Refreshed: </label>'.$today;
echo '<br /><label> Current Time:&nbsp;&nbsp;&nbsp;&nbsp; <span id="clock"></span></label>';
echo '<div class="clear"></div>';

echo '<h1>Header Information</h1>';
echo '<div class="border">';
echo '<p>The information displayed on this page is a result of the posts from the previous form.<br /> To enable these variables, simply copy and paste the meta information into your source files.</p>';
echo '</div>';
echo '<h1>HTML Version</h1>';
		
		$keywords = $_POST['Keywords']; // sets the post values as varaibles
	
		$title = $_POST['Sitewide-Title'];
		$description = $_POST['Sitewide-Description'];
		
		$keywords = str_replace('&','Qamp',$keywords);
		$title = str_replace('&','Qamp',$title);
		$description = str_replace('&','Qamp',$description);
		
	if($keywords != '') // if keywords are present, show them formatted
	{
			echo '<div class="border1">';
			echo '<b>Sitewide-Keywords:</b><br/>&lt;meta name="keywords" content=" '.$keywords.'" /&gt;<br/><br />';
			echo '<b>Sitewide-Title:</b><br/>&lt;title&gt;'.$title.'&lt;/title&gt;<br/><br />';
			echo '<b>Sitewide-Description:</b><br/>&lt;meta name="description" content="'.$description.'"/&gt;<br/><br/>';
			echo '</div>';
	}
			foreach($_POST as $field => $value)
			{
			if(strpos($field,'title'))	
				{
				echo '<div class="border1">';
				$field = str_replace('_page_title',' ',$field);
				$field = ucwords($field);
				echo '<b>'.$field.'</b><br />';
				echo '&lt;title&gt;';
				echo $value;
				echo '&lt;/title&gt;';
				echo '<br />';
				}
				
				if(strpos($field,'description'))	
				{
				$field = str_replace('_',' ',$field);
				echo '&lt;meta name="description" content="';
				echo $value;
				echo '"/ &gt;';
				echo '<br /><br />';
				echo '</div>';
				
				}
			}
	
$path = $_POST['pageName'];
echo '<hr/>';
echo '<h1>PHP Version</h1>';
echo '<div class="border3"><b>Special Note:</b><br/> BEFORE you click the links to automatically "write to file", PLEASE ENSURE that you have conformed to the proper file and folder structure outline in the <a href="seostructure.php" target="_blank">buildout</a> documentation. <br/>Failure to do so could result in the unreversable deletion of the entire pages\' content.  In essence "F.U.B.A.R."!<br/>If you are uncertain/unclear if the structure has been followed, DO NOT CLICK any of the "write to file" links.  </div>';
echo '<fieldset style="border:1px solid #f00;">';
echo '<legend style="font-weight:bold;">';
echo 'In your header file you should include the following 3 lines of code';
echo '</legend>';
	#_______________________________________________________________________________________________________________________________
	$ti = '&lt;title&gt;&lt;? if(isset($pageTitle)){echo $pageTitle;}else {echo "'.$title.'" ;} ?&gt;&lt;/title&gt;';
	$de = '&lt;meta name="description" content="&lt;? if(isset($pageDes)){echo $pageDes;}else {echo "'.$description.'";} ?&gt;"/>';
	$ke = '&lt;meta name="keywords" content=" '.$keywords.'" /&gt;';
	#________________________________________________________________________________________________________________________________
echo '<b>Title:</b><br/>'.$ti.$nl;
echo '<b>Description:</b><br/>'.$de.$nl;
echo '<b>Sitewide-Keywords:</b><br/>'.$ke;
echo '<br/>';
$t1 = $title; $k1 = addslashes($keywords); $d1 = $description;

//___________________

			echo '-<a href="#" onclick="popUpwindow(\'ser.php?site='.$path.'&folder=includes&file=header.php&ti='.$t1.'&de='.$d1.'&ke='.$k1.'\',\'SER Population\',\'width=300, height=200\');">write to file</a>';
			

echo '</fieldset>';




echo $nl.$nl;
$php = 0;
	foreach($_POST as $field => $value)
		{
			
			
			$value = str_replace('&','Qamp',$value); // sets the & symbol to a value that can be passed relatively easy in the header
			if(strpos($field,'title'))
				{
				echo '<div class="border2">';
				$field = str_replace('_page_title',' ',$field);
				
					$seoF = $field;
					$seoF = str_replace(' ','',$seoF);
				
				$field = ucwords($field);
				echo '<b>'.$field.'</b> <br />';
				$title = '$pageTitle = \''.$value.'\';';
				$t2 = addslashes($title);
				echo $title;
				echo '<a name="seo'.$php.'">&nbsp;</a>';
				echo '<br />';
				}
				
			if(strpos($field,'description'))
				{
				$field = str_replace('_',' ',$field);
				$des = '$pageDes = \''.$value.'\';';
				$d2 = addslashes($des);
				echo $des;
				echo '<br />';
				echo '- <a href="#seo'.$php.'" onclick="popUpwindow(\'populate.php?folder='.$path.'&file='.$seoF.'.php&seo='.$t2.$d2.'\',\'SEO Population\',\'width=1, height=1\');">write to file</a>';
				echo '</div>';
				}
				
				
				$php++;
				
			
		}

?>
<script type="text/javascript">
// Prompts that data will be lost upon going back to genesis dashboard
function lostData()
	{
	var backTo = confirm("You current data will be lost.");
	if(backTo)
		{location.href="../_genesis/";
			return true;
		}
		
	else
		{ return false;}
	}
</script>

<? if(isset($_POST['Analytics']))
{
 echo '<h1>Google Analytics</h1><div class="border2">';
 	echo '<a name="analytics"></a>';
	$google = $_POST['Analytics']; 
	$analytics = '&lt;script type="text/javascript"&gt;var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));&lt;/script&gt;&lt;script type="text/javascript">var pageTracker = _gat._getTracker("'.$google.'");pageTracker._trackPageview();&lt;/script&gt;';
	echo $analytics;
	echo '<br />';
	echo '- <a href="#" onclick="popUpwindow(\'analytics.php?folder='.$path.'&file=footer.php&code='.$google.'\',\'Google Analytics Population\',\'width=200, height=100\');">write to file</a>';
	echo '</div>';
}
echo '<a href="#" onclick="return lostData();">&lt;&lt;Back to Genesis</a>';
include('includes/footer-genesis.php');?>
