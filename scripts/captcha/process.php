<?php
session_start(); 
//Encrypt the posted code field and then compare with the stored key 

if(md5($_POST['Verification']) != $_SESSION['key']) 
{ 
  echo "<span style='color:#dc0000;font-weight:bold;'>Error: You must enter the code correctly.</span>"; 
  echo '<br />Please return to the form and correct: (<a href="javascript:history.go(-1)">Back</a>)';
}else{ 
  echo 'Congratulations! You entered the code correctly'; 
}
?>