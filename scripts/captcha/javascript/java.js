//POP up credits
function popUpwindow(theURL, winName, features)	{	window.open(theURL, winName, features);	}

//Toggle Visibility
function toggleHidden(x)
{	
if (document.getElementById(x).style.display == 'none'){document.getElementById(x).style.display = 'block';}
	else {document.getElementById(x).style.display = 'none';}
}


//Simple Allert
function JavaMessage(x){alert(x);}
// Form validation
function verifyForm(form_id) {
		var myForm = document.getElementById(form_id);
		var errorMessage = '';
		var logMessage = "";
		var inputs = myForm.getElementsByTagName('input');
		var idx = 0;
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
//WRITES THE ERROR MESSAGE OR SUBMITS THE FORM
if(errorMessage !='') {
alert("Upon validation of this form, the following errors were found:\n" + errorMessage);
return false;
} else {
//alert(logMessage + "\n\nErrormessage: " + errorMessage);
return true;
}
}
