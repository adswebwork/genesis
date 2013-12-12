// JavaScript Document

//Function to call a pop up window
function popUpwindow(theURL, winName, features)	{	window.open(theURL, winName, features);	}

//Function to quickly check elements in form


//Function to show and hide elements
function toggleHidden(x)
{
	if (document.getElementById(x).style.display == 'none')	
		{document.getElementById(x).style.display = 'block';}
	else 
		{document.getElementById(x).style.display = 'none';}
}


function JavaMessage(x){alert(x);}
	
function clearMe(ele)
		{
			var un = document.getElementById(ele);
			un.value = '';
		
		}

function setMenu()
{
	var nav_links = document.getElementById('nav').getElementsByTagName('a');

		for (var i=0; i < nav_links.length; i++)
			{
				if(document.URL.indexOf(nav_links[i].href) > -1)
					{
						nav_links[i].setAttribute('class', 'selected');
						nav_links[i].setAttribute('className', 'selected');
					}
				
			}
}

function newpage()
	{
		var mypage = document.location.pathname;
		var orig = mypage;
		var page = document.getElementById('newpage').value;	
		parent.window.location.href = orig + "?newpage=" + page;

	}

function Snewpage()
	{
		var mypage = document.location.pathname;
		var fld = document.getElementById('newpage').value;
		var orig = mypage;
		var spage = document.getElementById('secondaryDdown').value;	
		parent.window.location.href = orig + "?newpage=" + fld  + spage;

	}	
	

function Anewpage()
	{
		var mypage = document.location.pathname;
		var orig = mypage;
		var page = document.getElementById('txt1').value;	
		parent.window.location.href = orig + "?newpage=" + page;

	}
	
	
	
function checkAll()
{
	var myForm = document.getElementById('seoOption');
	var boxesN = document.getElementById('boxAmount').value;
	var checks = document.getElementsByName('page[]');
	var boxLength = checks.length;
	var checkAll = confirm('Provide SEO for all '+boxesN+' pages?');
	if (checkAll)
	{
		for(i=0; i < boxLength; i++)
			{
				checks[i].checked = true;
			}
	}
}

function checkReg()
{
	myF = document.getElementById('seoOption');
	var ms = 'Options Confirmed!';
	
	if(!myF.keywords.checked)
		{ms = 'You DO NOT want to include search engine registration.';}
	if(!myF.google.checked)
		{ms += "\n"+'You DO NOT want to include google analytics.';}
		
		
	if(ms.value == ' '){return true;}
	else{if(confirm(ms)){return true;}
	else{return false;}}}

function formatKeys()
{
	var boxParent = document.getElementById('seo');
	var boxFormat = boxParent.Keywords;
	var nowValue = boxFormat.value;
	var checkFor = "\n";
	var newCheck = new RegExp(checkFor, 'g');
	var replaceWith = ", ";
	var newValue = nowValue.replace(newCheck,replaceWith);
	alert("Please check that you have replaced all apostrophes with the appropriate '  mark.\n Microsoft Word uses a different format for apostrophes.");
	boxFormat.value = newValue;

	alert('Content Formated\n You may now generate the SEO syntax');
	
	var Row = document.getElementById('formatedRow');
	Row.style.display = "none";
	var btn = document.getElementById('genRow');
	btn.style.display="block";
	
}
function noGenerate()
{
	var btn = document.getElementById('genRow');
	btn.style.display="none";
	
}
function updateClock ( )
{
  var currentTime = new Date ( );
  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
  document.getElementById("clock").innerHTML = currentTimeString;
}


function verifyForm(form_id) {
		var myForm = document.getElementById(form_id);
		var errorMessage = '';
		var logMessage = "";
		var inputs = myForm.getElementsByTagName('input');
		var selects = myForm.getElementsByTagName('select');
		var textareas = myForm.getElementsByTagName('textarea');
		var idx = 0;
		logMessage += "Found " + inputs.length + " inputs\n";
		logMessage += "Found " + selects.length + " selects\n";
		logMessage += "Found " + textareas.length + " textareas\n";
		
//CHECK THE INPUT FIELDS
for(idx=0; idx<inputs.length ; idx++) 
	{
		if(inputs[idx].getAttribute('dir') == 'ltr') 
			{
				logMessage += "Found a required field: " + idx + " with value = " + inputs[idx].value  + "\n";
				if(inputs[idx].value.length == 0) 
					{
						var myName = inputs[idx]['name'];
						myName = myName.replace(/_/g, ' ');
						errorMessage += "The field '" + myName + "' must not be empty.\n";
					}
			}
		
		//CHECKS REQUIRED EMAIL INPUTS
		if(inputs[idx].getAttribute('name') == 'Email') 
			{
				logMessage += "Found a required field: " + idx + " with value = " + inputs[idx].value  + "\n";
				if(inputs[idx].value.length == 0 || inputs[idx].value.indexOf('@') == -1) 
					{
						var myName = inputs[idx]['name'];
						myName = myName.replace(/_/g, ' ');
						errorMessage += "The field '" + myName + "' must not be empty or must contain a valid email address.\n";
					}
			}
	}
		
		
		
//____________________________________________		
//CHECK THE SELECT DROPDOWNS	
for(idx=0; idx<selects.length ; idx++) 
	{
		if(selects[idx].getAttribute('dir') == 'ltr') 
			{
				logMessage += "Found a required field: " + idx + " with value = " + selects[idx].selectedIndex + "\n";
				if(selects[idx].selectedIndex == 0) 
					{
						var myName = selects[idx]['name'];
						myName = myName.replace(/_/g, ' ');
						errorMessage += "You must choose an option from the '" + myName + "' drop-down menu.\n";
					}
			}
		}
		
		
//____________________________________________		
//CHECK THE SELECT TEXTAREAS
for(idx=0; idx<textareas.length ; idx++) 
	{
		if(textareas[idx].getAttribute('dir') == 'ltr') 
			{
				logMessage += "Found a required field: " + idx + " with value = " + textareas[idx].value  + "\n";
				if(textareas[idx].value.length == 0) 
					{
						var myName = textareas[idx]['name'];
						myName = myName.replace(/_/g, ' ');
						errorMessage += "The Text-area '" + myName + "' must not be empty.\n";
					}
			}
	}
	

if(errorMessage !='') {alert("Upon validation of this form, the following errors were found:\n" + errorMessage);
return false;} else {return true;}}


//CLIENT HINT
var xmlHttp

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
var url="includes/project-hint.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
} 

function stateChanged() 
{ 
if (xmlHttp.readyState==4)
{ 
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}