function initXMLHTTP() {
	var xmlhttp;
	/*@cc_on @*/
	/*@if (@_jscript_version >= 5)
  	try {
  		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP")
 	} catch (e) {
  		try {
    			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
  		} catch (E) {
   			xmlhttp=false
  		}
 	}
	@else
 	xmlhttp=false
	@end @*/
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	 	try {
	  		xmlhttp = new XMLHttpRequest();
	 	} catch (e) {
	  		xmlhttp=false;
	 	}
	}	
	return xmlhttp;
}

function showHide(id) {
	var x = document.getElementById(id);
	if (x == null) return false;
	if (x.style.display == 'none') {
		Effect.BlindDown(id, {duration: .25});
	} else {
		Effect.BlindUp(id, {duration: .25});
	}
	return false;
}

function editGallery(id, name, content) {
	document.getElementById('edit_gallery').style.display = 'none';
	document.getElementById('gallery_id').value = id;
	document.getElementById('gallery_name').value = name;
	document.getElementById('gallery_content').value = content;
	showHide('edit_gallery');
	return false;
}
function checkGalleryForm() {
	var x = document.getElementById('gallery_name');
	if (x.value == '') {
		alert('Please enter a name for this gallery.');
		x.focus();
		return false;
	}
	return true;
}

function editImage(id, name, content) {
	document.getElementById('edit_image').style.display = 'none';
	document.getElementById('image_id').value = id;
	document.getElementById('image_name').value = name;
	document.getElementById('image_content').value = content;
	showHide('edit_image');
	return false;
}
function checkImageForm() {
	var x = document.getElementById('image_name');
	if (x.value == '') {
		alert('Please enter a name for this image.');
		x.focus();
		return false;
	}
	return true;
}
function updateImageOrder(gallery_id) {
	var poststring = Sortable.serialize('image_list',{name:'image_order'});
	var url = 'catcher.php?gallery=' + gallery_id + '&' + poststring;
	var xhr = initXMLHTTP();
	xhr.open('GET',url);
	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			//New order saved
			//Nothing to do
		}
	}
	xhr.send(null);
}

var useAlbumLink = true;
function updateAlbumOrder() {
	useAlbumLink = false;
	var poststring = Sortable.serialize('album_list',{name:'album_order'});
	var url = 'catcher.php?' + poststring;
	var xhr = initXMLHTTP();
	xhr.open('GET',url);
	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			//New order saved
			//Nothing to do
		}
	}
	xhr.send(null);
	//useAlbumLink = true;
}