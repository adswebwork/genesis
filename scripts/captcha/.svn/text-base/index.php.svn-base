<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Captcha</title>
<style type="text/css">
body{font-size:100%;font-family:Verdana, Arial, Helvetica, sans-serif;}
.row       {margin-top:10px;font-size:11px;}
.row label {display:block;float:left;width:150px;font-size:11px;text-align:right;padding-top:10px;padding-right:10px;}
.boldLabel {font-weight:bold;width:100px;color:#f00;margin-right: 5px;}
.formField {width:220px;font-size:1em;margin-top:10px;}
.formField1 {width:120px;font-size:1em;margin-top:10px;}
input      {}
select     {}
button     {margin:0px 2px 0px 0px;}
textarea   {width:320px;height:100px;}
.clear {clear:both;}
</style>
<script type="text/javascript" src="javascript/java.js"></script>
</head><body>

<div id="cForm">

	
	<form action="process.php" method="post" enctype="application/x-www-form-urlencoded" id="myForm" onsubmit="return verifyForm('myForm');">
<input type="hidden" name="Form_Name" value="Contact" />
<div class="row"><label>&nbsp;</label><span class="boldLabel">*</span>Indicates required fields</div>

<div class="row"><label><span class="boldLabel">*</span>Name</label><input type="text" name="Name" dir="ltr" class="formField" /></div>
<div class="row"><label>Company</label><input type="text" name="Company" class="formField" /></div>
<div class="row"><label><span class="boldLabel">*</span>Email</label><input type="text" name="Email" class="formField" /></div>
<div class="row"><label>Comments/Questions</label><textarea name="Comments" class="formField" ></textarea></div>
<div class="clear"></div> 
<div class="row"><label><span class="boldLabel">*</span>Verification Code:</label>
<div style="position:relative;display:inline;margin-right:10px;"><img src="captcha.php" alt="Verification Code" width="90" height="40"></div>
<input type="text" name="Verification" class="formField1" dir="ltr"/>
					  
		</div>
		<div class="clear"></div>
<div class="row"><label>&nbsp;</label><button type="submit">Submit</button><button type="reset">Reset</button></div>
</form>
	
	
</div>
</body></html>
