function initTransMenu() {
	if (!TransMenu.isSupported()) return;	//Menu not supported, so exit
	var ms = new TransMenuSet(TransMenu.direction.down, 0, 5, TransMenu.reference.bottomLeft);
	var menu1 = ms.addMenu(document.getElementById("scripts"));
	
	menu1.addItem("Ajax suggestion box", "standardfeatures.html");
	menu1.addItem("Color List", "floorplans.html");
	menu1.addItem("Color picker", "photogallery.php?gallery=3");
	menu1.addItem("Fade lightbox", "photogallery.php?gallery=3");
	menu1.addItem("Simple lightbox", "photogallery.php?gallery=3");
	TransMenu.renderAll();
	TransMenu.initialize();
	menu1.onactivate = function() { document.getElementById("scripts").className = "hover"; };
	menu1.ondeactivate = function() { document.getElementById("scripts").className = ""; };
	this.className = "hover";
}
