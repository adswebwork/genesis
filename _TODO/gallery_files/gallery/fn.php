<?
require_once('conf.php');

function saveGallery($id, $name, $content, $file) {
	global $image_path;
	$id = addslashes($id);
	$name = addslashes($name);
	$content = addslashes($content);
	if ($id == 'new') {
		//create new gallery
		mysql_query("Insert Into galleries Values()");
		$id = mysql_insert_id();
	}
	$file_info = '';
	if (is_uploaded_file($file['tmp_name'])) {
		if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$image_path.$file['name'])) {
			$file_info = ", image='{$file['name']}'";
		}
	}
	$query = "Update galleries Set name='$name', content='$content' $file_info Where id='$id'";
	mysql_query($query);
	return $id;
}
function deleteGallery($id) {
	$id = addslashes($id);
	$rs_images = mysql_query("Select id From images Where gallery_id='$id'");
	for($i=0; $i < mysql_num_rows($rs_images); $i++) {
		list($img_id) = mysql_fetch_row($rs_images);
		deleteImage($img_id);
	}
	mysql_query("Delete From galleries Where id='$id'");
}

function saveImage($id, $gallery, $name, $content, $file) {
	global $image_path;
	$id = addslashes($id);
	$gallery = addslashes($gallery);
	$name = addslashes($name);
	$content = addslashes($content);
	if ($id == 'new') {
		//create new image
		$rs = mysql_query("Select coalesce(max(rank),0)+1 From images Where gallery_id='$gallery'");
		list($rank) = mysql_fetch_row($rs);
		mysql_query("Insert Into images(rank) Values('$rank')");
		$id = mysql_insert_id();
	}
	$file_info = '';
	if (is_uploaded_file($file['tmp_name'])) {
		if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$image_path.$file['name'])) {
			$file_info = ", image='{$file['name']}'";
		}
	}
	$query = "Update images Set gallery_id='$gallery', name='$name', content='$content' $file_info ".
				"Where id='$id'";
	mysql_query($query);
}
function deleteImage($id) {
	global $image_path;
	$id = addslashes($id);
	$rs_images = mysql_query("Select * From images Where id='$id'");
	$image = mysql_fetch_assoc($rs_images);
	unlink($image_path . $image['image']);
	mysql_query("Delete From images Where id='{$image['id']}'");
}

?>