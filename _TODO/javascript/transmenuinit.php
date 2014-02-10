<?


?>
<script type="text/javascript">
function initTransMenu() {
	if (!TransMenu.isSupported()) return;	//Menu not supported, so exit
	var ms = new TransMenuSet(TransMenu.direction.down, 0, 5, TransMenu.reference.bottomLeft);
	var menu1 = ms.addMenu(document.getElementById("scripts"));
	
	<?
	$dir = 'scripts/'; 
	$open = opendir($dir);
	$noFile = array('index.php','.','..','new project','wz_tooltip.js');#add files to list that should not be shown
	$noScript = array('.php,','.zip','.html');

	while(($file = readdir($open)) !== false)
	{
		if(!in_array($file,$noFile))#check that the files in the array are not shown
			{
				if(!strpos($file,$noScript[$nm]) && !strpos($file,'1')) // check each script that should not be included	
				{
				$link = strtolower($file);
				$file = ucwords($file);
				echo 'menu1.addItem("'.$file.'","'.$dir.$link.'" );';
				}
				
			}
	}
	closedir($open);
?>
	var menu2 = ms.addMenu(document.getElementById("seoAread"));
		menu2.addItem("SEO Structure","seostructure.php");
		


	TransMenu.renderAll();
	TransMenu.initialize();
	menu1.onactivate = function() { document.getElementById("scripts").className = "hover"; };
	menu1.ondeactivate = function() { document.getElementById("scripts").className = ""; };
	menu2.onactivate = function() { document.getElementById("seoAread").className = "hover"; };
	menu2.ondeactivate = function() { document.getElementById("seoAread").className = ""; };

	this.className = "hover";
}
</script>

<? ?>