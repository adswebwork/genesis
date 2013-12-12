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


