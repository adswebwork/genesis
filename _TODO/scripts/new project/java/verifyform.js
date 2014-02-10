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
		if(inputs[idx].getAttribute('required') == 'required') 
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
		if(inputs[idx].getAttribute('required') == 'requiredemail') 
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
		if(selects[idx].getAttribute('required') == 'required') 
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
		if(textareas[idx].getAttribute('required') == 'required') 
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
	
//____________________________________________
function fName()
	{
	 //action for the function to carry out
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