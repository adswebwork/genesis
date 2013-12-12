<?php 
$domain = "ABC Innovation";
$website = "ABCInnovation.com";
$formname = $_POST['Form_Name'];
if(!empty($_POST)) {
	// 
	$to = 'user@domain.com';
	//
	$subject = $domain;
	$subject .= $formname. ' Form Submission';
	$message = 'The following information was submitted via the' .$formname. ' Form on '.$website. ' :'."\n\n";
    foreach($_POST as $field => $value) 
		{
			$field = str_replace('_' , ' ' , $field);
            if(!empty($value)) 
			   {
                   $message .= $field.': '.$value."\n";
                }
        }
	$headers .= "From: ".$_POST['Email'].">\r\n";
	mail($to , $subject, $message, $headers);
	$response_message = true;
	header('Location: ../thankyou.html');
}
?>
