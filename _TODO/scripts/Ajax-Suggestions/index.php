<html>
<head>
<script src="clienthint.js"></script> 
</head>
<body>
<style type="text/css">
h1 {
color:#999999;
font-family:Verdana,Arial,Helvetica,sans-serif;
font-size:18pt;
text-align:center;
}

.boxindent {
background-color:#FFFFFF;
border:1px solid #CCCCCC;
font-family:verdana,arial,helvetica,sans-serif;
font-size:10pt;
margin:10px auto;
padding:3px 5px;
color:#666666;
width:600px;
}

</style>
<h1>Ajax suggestions</h1>
<p class="boxIndent">This ajax application is an example of how a dynamic list can be searched automatically and return results based on user input.</p>
<form> First Name:<input type="text" id="txt1" onkeyup="showHint(this.value)"></form>
<p>Suggestions: <span id="txtHint"></span></p> 
<?
$t = date("d/j/y - g:i:a",filemtime('index.php'));
echo '<hr /><p align="center" style="font:9px verdana;color:#999;">Last modified: '.$t.'</p>';
?>

</body>
</html>