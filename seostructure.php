<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>SEO/SER/Analytics Automation Requirements</title>
<meta name="author" content="Andre D. Spencer"/>
<style type="text/css">
body{background:#fff;}
#page{border:1px solid #e9e9e9;padding:0px 5px;}
#title{background:#aaa;color:#000;font-weight:bold;padding:5px;}
.header{font-weight:bold;text-decoration:underline;}
.uline{text-decoration:underline;}
.special{background:#e9e9e9;}
</style>
</head>
<body>
<div id="page">
<p id="title">This page outlines the necessary file and folder structures for the automatic insertion of Search engine registraion, Search engine optimization and Google Analytics</p>
<p class="uline">All instructions on this page for file and folder names are CaSe SeNsAtIvE</p>

<p class="header">Folder Structure</p>
<ol>
<li>Ensure that within the <u>root</u> directory of your site, you have the folder '<span class="special">includes</span>'.</li>

</ol>



<p class="header">File Structure</p>
<ol>
<li>Ensure that within the '<span class="uline">includes</span>' folder mentioned above, you have the two files ('<span class="special">header.php</span>', and '<span class="special">footer.php</span>')</li>

</ol>

<p class="header">File Syntax Structure</p>
<ol>
<li>header.php: Be sure that you have included the following syntax in your &lt;head&gt; tag: <span class="special">&lt;!-- SER AUTOMATION --&gt;</span> </li>
<li>footer.php: Be sure that you have included the following syntax directly above the closing body tag &lt;/body&gt;: <span class="special">&lt;!-- ANALYTICS --&gt;</span> </li>
<li>Site files: Be sure that all of your site pages are of the '.php' file extension.</li>
<li>Your site files: Be sure that you include the following syntax at the absolute top of you code - LINE 1 -: <span class="special">// SEO</span> and LINE 2 -  <span class="special">include('includes/header.php');</span> </li>

<ul><li>Having this set up will ensure that when the seo is inserted in each page, the header.php will read it properly.</li></ul>
</ol>

<p>To ensure that the proper structure is followed, please build your site from this framework package ( <a href="#">Buildout</a> )</p>

</div>
<?
$t = date("m/d/y - g:i:a",filemtime('seostructure.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.' by Andre D. Spencer</p>';
?>
</body>

</html>