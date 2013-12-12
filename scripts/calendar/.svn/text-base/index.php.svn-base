<html><head>
<style type="text/css">
h1 {color:#999;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:18pt;text-align:center;}

.boxindent {background-color:#FFF;border:1px solid #CCC;
font-family:verdana,arial,helvetica,sans-serif;font-size:10pt;margin:10px auto;padding:3px 5px;color:#666666;width:600px;}

</style>
</head>
<body>
<h1>Dynamic Calendar</h1>
<p class="boxIndent">This script displays the current calendar, and highlights the current date.</p>

<? include('functions/functions.php'); ?>

<?
$time = time();
$today = date('j',$time);
$days = array($today=>array(NULL,NULL,'<span style="color:red;font-weight:bold;">'.$today.'</span>'));
echo generate_calendar(date('Y', $time), date('n', $time), $days);

?>
</body>
</html>