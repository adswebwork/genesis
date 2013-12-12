<?php

session_start();
	$pgTitle = 'Contact Us';
	include_once('includes/header.php');
?>
<script type="text/javascript" src="java/md5.js"></script>
<script type="text/javascript" src="java/jcap.js"></script>

<p>If you have any questions regarding our services, you can contact us by calling or filling out the following form and we'll get back to you as soon as possible. Thanks!</p>

<? if(empty($_POST))
	{
	?>
<div class="blockSml">
<pre>Johns and Allyn, A.P.C.
1010 B St. Suite 350
San Rafael, CA 94901
PHONE: (415) 459-5223
FAX: (415) 453-2555
</pre>
</div>
	<?
	}
	?>
<div id="cForm">
<?php
	$domain = 'johnsandallyn';
	$website = str_replace(' ', '', $domain). '.com';
	$formName = str_replace('_', ' ', $_POST['Form_Name']);
	$return = "\n";
#	$return = '<br>';

if(!empty($_POST))
	{
	
		
									
				$to = 'aspencer@aismedia.com';
				$to .= ',bcollins@aismedia.com,kmckinney@aismedia.com';
					$to .=',johnsandallyn@'.$website.'';
				$subject = $website. ' ' .$formName.' Form Submission';
				$message = 'The following information was submitted via the ' .$formName. ' Form on '.$website. ':'. $return;
				foreach($_POST as $field => $value)
					{
						if($field != uword)
						{
							$field = str_replace('_', ' ', $field);
							if(!empty($value))
							{
								$message .= $field. ': ' .$value.$return;
							}
						}						
						
					}
				$headers = 'From: ' .$_POST['E-mail'].$return;
				mail($to, $subject, $message, $headers);
				echo '<div style="height:20px;"></div>';
				echo '<p class="bold">Thank you for your interest in us.<br /> We\'ll get back to you as soon as possible.</p>';
		
	} 
	
	else 
	{	
	
	?>
	
	<form action="contacts.php" method="post" enctype="application/x-www-form-urlencoded" id="myForm" onsubmit="return verifyForm('myForm');validate();">
<input type="hidden" name="Form_Name" value="Contact" />
<div class="row"><label>&nbsp;</label><span class="boldLabel">*</span>Indicates required fields</div>

<div class="row"><label><span class="boldLabel">*</span>Name</label><input type="text" name="Name" dir="ltr" class="formField" /></div>
<div class="row"><label>Company</label><input type="text" name="Company" class="formField" /></div>
<div class="row"><label>Phone</label><input type="text" name="Phone" class="formField" /></div>
<div class="row"><label>Email</label><input type="text" name="Email" class="formField" /></div>
<div class="row"><label>Please tell us where you found us</label>
<select name="Found_us" class="formField">
<?
$sel = array('AltaVista', 'AOLFind' ,'Ask_Jeeves' ,'Excite' ,'Google' ,'Go' ,'Hotbot' ,'Infoseek' ,'Lycos' ,'MSN' ,'Yahoo' ,'Banner-Ad' ,'Friend' ,'Magazine Newspaper','Radio' ,'Other');
foreach($sel as $opt){	echo '<option value="'.$opt.'">'.$opt.'</option>';	}?>
</select>

</div>
<div class="clear"></div>

<div class="row"><label>Comments/Questions</label><textarea name="Comments" class="formField" ></textarea></div>
 <!--
<div class="row">
<? $n = rand(1,8); ?>
	<div id="cap" style="background:url(images/bg<? # $n; ?>.png)"><img src="captcha/captcha.php"/></div>
	<label><span class="boldLabel">*</span>Captcha</label>
	<input type="text" name="CAPTCHA" dir="ltr" /> 
</div> row -->
<p>Enter the code as it is shown (required):</p>
		<script type="text/javascript">sjcap("altTextField");</script>
		<noscript><p>[This resource requires a Javascript enabled browser.]</p></noscript>

<? //include ('captcha/visual-captcha.php'); ?>



<div class="row"><label>&nbsp;</label><button type="submit" onclick="return jcap();">Submit</button><button type="reset">Reset</button></div>
</form><!--SHOW FORM -->
	
	  <? } ?>
</div>

<div class="clear"></div>
<?php include_once('includes/footer.php');?>
