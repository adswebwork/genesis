<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?
$version = 'version.txt';
$totalsize = filesize($version);
$open = fopen($version,'r');
$ver = fread($open,$totalsize);
?>
<title>Genesis V <?= $ver; ?> Release Notes</title>
<style type="text/css">
body{background:#fff;border:1px solid #e9e9e9;margin:5px;padding:5px;font-family:Arial, Helvetica, sans-serif;}
a img{border:0;}
a{color:#436485;}
h3{margin-top:3px;padding-top:3px;background:#fff;padding:3px;color:#436485;}
	h3 img{float:right;}
p{padding:10px;}
#page{height:570px;overflow:auto;border:1px solid #000;background:#fff;padding:5px;}
.title{font-size:18px; color:#000;font-weight:bold;padding-bottom:5px;margin-top:10px;padding-left:5px;}
.credits{font-size:12px; color:#aaa; text-align:center;border-top:1px solid #aaa;}
.h{height:30px;}
.clear{clear:both;}
.accordion_content img{float:left;margin:3px;margin-left:10px;}
.accordion_toggle {
display: block;width: 417px;padding: 8px 20px 10px 10px;font-weight: normal;text-decoration: none;color:#fff;font-size:12px;
outline: none;cursor: pointer;margin: 2px;background:#6da3d9 url(includes/accordion_toggle.jpg) top right no-repeat;
		}
.accordion_toggle_active {color:#fff;background:#436485 url(includes/accordion_toggle_active.jpg) top right no-repeat;}
.accordion_content {background-color: #fff;color: #444;overflow: hidden;}
.accordion_content p {padding: 5px 10px 8px 10px;font-size:12px;line-height:16px;clear:left;}
.accordion_content ul{clear:left;}
.iconSet{border:1px solid #436585;margin-bottom:3px;}
	.iconImg{}
	.iconName{font-weight:bold;margin-left:3px;padding-top:10px;}
	.iconDesc{padding:5px;font-size:11px;}
</style>
<script type="text/javascript" src="java/prototype.js"></script>
<script type="text/javascript" src="java/effects.js"></script>
<script type="text/javascript" src="java/accordion.js"></script>
<script type="text/javascript">
Event.observe(window, 'load', loadAccordions, false);
// General Syntax
function loadAccordions() {
//new accordion('container-selector', options);

// Vertical Accordion
var verticalAccordion = new accordion('vertical_container');
//verticalAccordion.activate($$('#vertical_container .accordion_toggle')[0]); //**********************UNCOMMENT FOR AUTO OPEN
}
</script>
</head>
<body>

<h3><a href="#" onclick="window.close('self');" title="Close"><img src="icons/_shutdown.png"/></a>Genesis V <?= $ver; ?></h3><div class="clear"></div>
<div id="page">
<div id="vertical_container">

   <div class="accordion_toggle"><strong>GENERAL INFORMATION</strong></div>
             <div class="accordion_content"> <img src="icons/_genesis.jpg" alt="Test" />&trade;
				
				<p><strong>About Genesis&trade; </strong><br />
			This application was built on the Linux platform utilizing PHP, CSS, JavaScript and SQLite. It uses these technologies to create a dynamic and light weight yet very powerful application. At less than 12mb, this portable project will greatly ease all of the necessary tasks in regards to site development and design. The core structure was written/compiled by <strong>Andre D. Spencer</strong> in 2008.  This includes 80% of the project. This application was developed for use in website development as a content management system, and requires no customization. It is also packaged with pre-production folders including ‘Buildout’ and ‘Comps’. You can read more about this in each folder.</p>
			
            </div>
	<!--*********************************** -->         
	<!--*********************************** -->         
	<!--*********************************** -->    
			
<div class="title">Previous Features</div>


<div class="accordion_toggle"><strong>Password Protection</strong></div>
            <div class="accordion_content"> <img src="icons/_password.png" alt="Test" />
                <p>This project includes a password protection script. So if you choose to upload it to your web server, your content will be protected for unauthorized use.</p>
            </div>
            
<div class="accordion_toggle"><strong>Dynamic file &amp; folder list</strong></div>
             <div class="accordion_content"> <img src="icons/_list.png" alt="Test" />
                <p>This function creates the ‘dashboard’ section for the Genesis&trade; application. It scans the folder that contains your project files, and lists them automatically. It also gives you the option to open each respective file and indicates what type of file it is.</p>
            </div>
            
<div class="accordion_toggle"><strong>Dynamic Image List with search options</strong></div>
             <div class="accordion_content"> <img src="icons/_imagelist.png" alt="Test" />
                <p>This section of the application is my favorite. Very often developers need to find out detailed information about a specific or even a group of images. This function does just that. It will search the ‘images’ folder of the project and return all the images and everything needed to use it. It will display the image filename, dimensions, size and even generate the code for HTML/PHP or CSS. This function also gives you the opportunity to search by file names or file extensions.</p>
            </div>

            
            <div class="accordion_toggle"><strong>Pre-packages standalone javascript applications</strong></div>
             <div class="accordion_content"> <img src="icons/_package.png" alt="Test" />
                <p>This dynamic arrangement of scripts gets larger with each release of Genesis&trade;. There are currently 10 scripts available. To view details of these scripts, visit the <a href="scripts/" target="_blank">scripts</a> folder located within the Genesis&trade; Project and hover over the links.</p>
            </div>
            
            
            <div class="accordion_toggle"><strong>Integrated 'PHP Info' link</strong></div>
             <div class="accordion_content"> <img src="icons/_phpinfo.png" alt="Test" />
                <p>Very often developers need to find out exactly what version of php they have available.
That option is now 1 click away. With <a href="phpinfo.php" target="_blank">PHP Info</a> you can quickly see what capabilities are at your disposal.
</p>
            </div>
            
            
            <div class="accordion_toggle"><strong>Thumbnail view of images</strong></div>
             <div class="accordion_content"> <img src="icons/_thumbnail.png" alt="Test" />
                <p>This was the latest addition to the previous version of Genesis&trade;. This option allows for a actual size image in a tooltip format. Simply hover over of the image icon for a particular file, and you will see the image at full resolution.</p>
            </div>
            
	<!--*********************************** -->         
	<!--*********************************** -->         
	<!--*********************************** -->         
	<!--*********************************** -->         
	<!--*********************************** -->         
	<!--*********************************** -->         
<div class="title">What&acute;s New in Version <?= $ver; ?>?</div>
     
			                 
   <div class="accordion_toggle"><strong>SEO - SER - Analytics Automation</strong></div>
             <div class="accordion_content"> <img src="icons/_sea.png" alt="Test" />
				<ul>
				<li>Search Engine Optimization</li>
				<li>Search Engine Registration</li>
				<li>Google Analytics</li>
				</ul>
				<p>
				<strong>Automatic Integration</strong><br />This section is the core of the application. When you provide the required information from the order forms, you can now simply click ('write to file') and have your website page automatically updated with the SEO values. Please be sure to read the disclaimer in red. It is very important that you follow the standards listed in the <a href="seostructure.php" target="_blank">buildout</a> documentation. Included in this release is the Buildout project structure. Utilize this pre-made project to ensure maximum compatibility.</p>
            </div>
       
            
                 
<div class="accordion_toggle"><strong>Keyword Formatting for Search Engine Registration</strong></div>
             <div class="accordion_content"> <img src="icons/_formatting.png" alt="Test" />
             <p> <strong>Formatting tool for keywords</strong>  <br />
			  
			 The text area currently receives the copy/paste information directly from the order form. Simply copy each column (6-1) then (12 -7) and paste it into the sitewide keywords text area. Then click the format button, and the content is automatically formatted with the appropriate structure with ',' and no carriage returns.</p>
			
            </div>

            
            <div class="accordion_toggle"><strong>Project Level Links</strong></div>
             <div class="accordion_content"> <img src="icons/_project.png" alt="Test" />
              <p>  <strong>Deeper File Browsing</strong><br />
				When inside of a project folder, if you navigate to a folder within the project ('images, css...') you will now have the option to quickly get back to the previous level.</p>
            </div>
            
            
            <div class="accordion_toggle"><strong>Local Color Calculator</strong></div>
             <div class="accordion_content"> <img src="icons/_calculator.png" alt="Test" />
              <p> <strong>Color Calculator</strong><br />
			   A color calculator is now available within the <a href="scripts/" target="_blank">scripts</a> folder. It automatically generates the Hex, Decimal and HTML value of the chosen color.</p>
            </div>
			 <div class="accordion_toggle"><strong>Icon Based Navigation</strong></div>
             <div class="accordion_content"> <img src="icons/_iconbased.png" alt="Test" />
              <p><strong>Uses of images for association</strong> <br /> 
			  Allows for easy reference with the use of images for the navigation and resource access</p>
		<?
			$dbfile = "sqlite/genesis.db";
			try {$db = new PDO('sqlite:'.$dbfile);}
			catch (PDOException $error) {print "error: " . $error->getMessage() . "<br/>";}
		  ?>
			<p>There are many icons currently being used.<br /> Their image and description are as follows:</p>
			<?
			$sql = 'select * from icons';
			$res = $db->prepare($sql);
			$res->execute();
			while($row = $res->fetch())
			{
				$img = $row['img'];
				$name = $row['name'];
				$desc = $row['desc'];
				$img = '<img src="icons/_'.$img.'.png" />';
				$name = str_replace('_','',$name);
				$name = ucwords($name);
				echo '<div class="iconSet">';
				echo '<div class="iconImg">'.$img.'</div>';
				echo '<div class="iconName">'.$name.'</div>';
				echo '<div class="clear"></div><div class="iconDesc">'.$desc.'</div>';
				echo '<div class="clear"></div></div>'; #icon set
			}
			?>
			</div>
			<div class="accordion_toggle"><strong>Database Storage of Project Information</strong></div>
             <div class="accordion_content"> <img src="icons/_storage.png" alt="Test" />
              <p> <strong>Live site url</strong><br />
			   This most recent addition allows you to add/edit/delete the live &amp; review url links for each project</p>
            </div>
</div> <!-- vertical_container -->
<div style="height:10px;"></div>
</div>
<?
$t = filemtime('release.php');
$t = date('g:i:a \o\n m-d-y',$t);
?>
<p class="credits">Last updated <?= $t; ?> by - Andre D. Spencer</p>
</body>

</html>
