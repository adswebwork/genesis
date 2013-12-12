<?php
	/* Catch all of the form submissions and respond */
	require_once('fn.php');
	
	if (!empty($_POST['gallery_id'])) {
		$id = saveGallery($_POST['gallery_id'], $_POST['gallery_name'], $_POST['gallery_content'],
							$_FILES['gallery_image']);
		header("Location: index.php?gallery=$id");	//Redirect to safe url
		exit;
		
	} elseif (!empty($_GET['delete_gallery'])) {
		deleteGallery($_GET['delete_gallery']);
		header("Location: index.php");
		exit;
		
	} elseif (!empty($_POST['image_id'])) {
		saveImage($_POST['image_id'],$_POST['image_gallery'],$_POST['image_name'],
					$_POST['image_content'],$_FILES['image_image']);
		header("Location: index.php?gallery={$_POST['image_gallery']}");
		exit;
		
	} elseif (!empty($_GET['delete_image'])) {
		deleteImage($_GET['delete_image']);
		header("Location: index.php?gallery={$_GET['gallery']}");
		exit;
		
	} elseif (is_array($_GET['image_order'])) {
		if (empty($_GET['gallery'])) exit; //nothing to do
		foreach($_GET['image_order'] as $rank => $id) {
			mysql_query("Update images Set rank='$rank' Where id='$id'");
		}
		echo '<response>1</response>';
		exit;
	} elseif (is_array($_GET['album_order'])) {
		foreach($_GET['album_order'] as $rank => $id) {
			mysql_query("Update galleries Set rank='$rank' Where id='$id'");
		}
		echo '<response>1</response>';
		exit;
	}
	
	//nothing to do, so redirect to the main page
	header("Location: index.php");
?>