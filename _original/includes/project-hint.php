<?php


header("Cache-Control: no-cache, must-revalidate");
 // Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// Fill up array with names
$a[]="admin";
$a[]="aestheticscomplete";
$a[]="ais_johns_and_allyn";
$a[]="amtek";
$a[]="aone";
$a[]="atlantacustomkitchens";
$a[]="atyoursite";
$a[]="betterbox";
$a[]="bpm3";
$a[]="breadcrumbs";
$a[]="calcheck";
$a[]="calendar";
$a[]="carillsKitchen";
$a[]="ccme";
$a[]="Central Valley";
$a[]="Challenge";
$a[]="CityofAtlanta";
$a[]="coliseum";
$a[]="css-changeorder";
$a[]="dw-sites";
$a[]="dynacon";
$a[]="ebsp";
$a[]="fannin";
$a[]="florida";
$a[]="gallery";
$a[]="happy_homes";
$a[]="images";
$a[]="index.php";
$a[]="ipr_aismedia";
$a[]="itraj";
$a[]="JohnHeath";
$a[]="labordaze";
$a[]="Madigan";
$a[]="marino";
$a[]="mazraani";
$a[]="mbconsulting";
$a[]="medicalaesthetics";
$a[]="mms";
$a[]="Morrisville";
$a[]="myLatinoLawyer";
$a[]="new";
$a[]="newsletter";
$a[]="njping";
$a[]="oestrauss";
$a[]="oldPhotoSpecialist";
$a[]="P1 Groupe";
$a[]="parked";
$a[]="parkway";
$a[]="pgworld";
$a[]="pg_world";
$a[]="phpthumb.config.php";
$a[]="prideandjoy";
$a[]="rangercreekgoose";
$a[]="review-pgworldFile";
$a[]="rhoades-legal";
$a[]="RROMI";
$a[]="RSMotorwerks";
$a[]="rssBot";
$a[]="salesforce";
$a[]="sample_project";
$a[]="semAismedia";
$a[]="sentry";
$a[]="seo-copy";
$a[]="seo-population";
$a[]="spacer.gif";
$a[]="studio83";
$a[]="tcrhome";
$a[]="telecompit";
$a[]="Templates";
$a[]="texaspolished";
$a[]="text.html";
$a[]="Thumbs.db";
$a[]="tripleb";
$a[]="Valley Petroleum";
$a[]="vdmsupplies";
$a[]="via-bella";
$a[]="vlu";
$a[]="welfit backup";
$a[]="wellfit";
$a[]="whois";
$a[]="_newsletters";


/*
$fld = '../../';
$no = array('testadmin','Copy of _Framework','Unnamed Site 2','_Framework','_galleries','_gsdata_','_old','_genesis','_Framework.zip','testabsfooter.html','Buildout.zip'
);
$open = opendir($fld);
while(($file = readdir($open)) !== false)
		{if($file != '.' && $file != '..')
			{
				if(!in_array($file,$no))
					{ return $a[]="'.$file.'";
					}
			}
		}closedir($open); // closes the directory for the root files display

		
	*/	

//get the q parameter from URL
$q=$_GET["q"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
{
  $hint="";
  for($i=0; $i<count($a); $i++)
  {
  if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
    {
    if ($hint=="")
      {
      $hint=$a[$i];
      }
    else
      {
      $hint=$hint." , ".$a[$i];
      }
    }
  }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
{
$response="no suggestion";
}
else
{
$response=$hint;
}

//output the response
echo $response;




?>