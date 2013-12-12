function initTransMenu() {
	if (!TransMenu.isSupported()) return;	//Menu not supported, so exit
	
	//==================================================================================================
	// create a set of dropdowns
	//==================================================================================================
	// the first param should always be down, as it is here
	//
	// The second and third param are the top and left offset positions of the menus from their actuators
	// respectively. To make a menu appear a little to the left and bottom of an actuator, you could use
	// something like -5, 5
	//
	// The last parameter can be .topLeft, .bottomLeft, .topRight, or .bottomRight to inidicate the corner
	// of the actuator from which to measure the offset positions above. Here we are saying we want the 
	// menu to appear directly below the bottom left corner of the actuator
	//==================================================================================================
	var ms = new TransMenuSet(TransMenu.direction.down, 0, 5, TransMenu.reference.bottomLeft);
	
	//==================================================================================================
	// create a dropdown menu
	//==================================================================================================
	// the first parameter should be the HTML element which will act actuator for the menu
	//==================================================================================================
	var menu1 = ms.addMenu(document.getElementById("spaces"));
	menu1.addItem("Standard Features", "standardfeatures.html");
	menu1.addItem("Floor Plans", "floorplans.html");
	menu1.addItem("Floor Plans", "photogallery.php?gallery=3");
	
		var submenu1 = menu1.addMenu(menu1.items[1]);
		submenu1.addItem("Canyon", "canyon.html");
		submenu1.addItem("Belmore", "belmore.html");
		submenu1.addItem("Windsor", "windsor.html");
		submenu1.addItem("Sable", "sable.html");
		submenu1.addItem("Upton 1", "upton1.html");
		submenu1.addItem("Upton 2", "upton2.html");
		submenu1.addItem("Glendale", "glendale.html");
		submenu1.addItem("Arden", "arden.html");
	
	//==================================================================================================
	
	var menu2 = ms.addMenu(document.getElementById("amenities"));
	menu2.addItem("Site Map", "sitemap.html");
	menu2.addItem("Gallery", "photogallery.php?gallery=1");
		
	//==================================================================================================
	
	var menu3 = ms.addMenu(document.getElementById("neighborhood"));
	menu3.addItem("Directory", "directory.html");
	menu3.addItem("Gallery", "photogallery.php?gallery=2");
	
	//==================================================================================================
	
	var menu4 = ms.addMenu(document.getElementById("galleries"));
	menu4.addItem("Living Spaces Photo Gallery", "photogallery.php?gallery=3");
	menu4.addItem("Amenities Photo Gallery", "photogallery.php?gallery=1");
	menu4.addItem("Neighborhood Photo Gallery", "photogallery.php?gallery=2");
	
	//==================================================================================================
	// write drop downs into page
	//==================================================================================================
	// this method writes all the HTML for the menus into the page with document.write(). It must be
	// called within the body of the HTML page.
	//==================================================================================================
	TransMenu.renderAll();
	
	TransMenu.initialize();
	
	// hook all the highlight swapping of the main toolbar to menu activation/deactivation
	// instead of simple rollover to get the effect where the button stays hightlit until
	// the menu is closed.
	menu1.onactivate = function() { document.getElementById("spaces").className = "hover"; };
	menu1.ondeactivate = function() { document.getElementById("spaces").className = ""; };
	
	menu2.onactivate = function() { document.getElementById("amenities").className = "hover"; };
	menu2.ondeactivate = function() { document.getElementById("amenities").className = ""; };
	
	menu3.onactivate = function() { document.getElementById("neighborhood").className = "hover"; };
	menu3.ondeactivate = function() { document.getElementById("neighborhood").className = ""; };
	
	this.className = "hover";
}

/**
* Form Validation function
*/
function verifyForm(form_id) {
        var myForm = document.getElementById(form_id);
        var errorMessage = '';
        var logMessage = "";
        var inputs = myForm.getElementsByTagName('input');
        var selects = myForm.getElementsByTagName('select');
        var idx = 0;
        logMessage += "Found " + inputs.length + " inputs\n";
        logMessage += "Found " + selects.length + " selects\n";
        for(idx=0; idx<inputs.length ; idx++) {
                if(inputs[idx].getAttribute('required') == 'required') {
                        logMessage += "found a required field: " + idx + " with value = " + inputs[idx].value  + "\n";
                        if(inputs[idx].value.length == 0) {
                                var myName = inputs[idx]['name'];
                                myName = myName.replace(/_/g, ' ');
                                errorMessage += "The field '" + myName + "' must not be empty.\n";
                        }
                }
                if(inputs[idx].getAttribute('required') == 'requiredemail') {
                        logMessage += "found a required field: " + idx + " with value = " + inputs[idx].value  + "\n";
                        if(inputs[idx].value.length == 0 || inputs[idx].value.indexOf('@') == -1) {
                                var myName = inputs[idx]['name'];
                                myName = myName.replace(/_/g, ' ');
                                errorMessage += "The field '" + myName + "' must not be empty or must contain a valid email address.\n";
                        }
                }
        }



        for(idx=0; idx<selects.length ; idx++) {
                if(selects[idx].getAttribute('required') == 'required') {
                        logMessage += "found a required field: " + idx + " with value = " + selects[idx].selectedIndex + "\n";
                        if(selects[idx].selectedIndex == 0) {
                                var myName = selects[idx]['name'];
                                myName = myName.replace(/_/g, ' ');
                                errorMessage += "You must choose an option from the '" + myName + "' drop-down menu.\n";
                        }
                }
        }

        if(errorMessage !='') {
                alert("The following errors were found:\n" + errorMessage);
                return false;
        } else {
                //alert(logMessage + "\n\nErrormessage: " + errorMessage);
                return true;
        }
}