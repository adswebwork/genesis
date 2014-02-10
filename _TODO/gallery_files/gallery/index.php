<?
	require_once('fn.php');
	
	$rs_galleries = mysql_query("Select * From galleries Order By rank, id");
	
	//Get this gallery's info
	$rs_current = mysql_query("Select * From galleries Where id='".addslashes($_GET['gallery'])."'");
	if (mysql_num_rows($rs_current) > 0) {
		$this_gallery = mysql_fetch_assoc($rs_current);
	} else {
		$this_gallery = null;
	}
?>
<html>
<head>
	<title>Image Gallery Administration</title>
	<script type="text/javascript" src="/js/prototype.js"></script>
	<script type="text/javascript" src="/js/scriptaculous.js?load=effects,dragdrop"></script>
	<script type="text/javascript" src="/js/lightbox.js"></script>
	<script type="text/javascript" src="gallery.js"></script>
	<link rel="stylesheet" href="/css/lightbox.css" type="text/css" />
	<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="frame">
	<h1>Image Gallery Administration</h1>

	<fieldset id="galleries"><legend>Galleries</legend>
		<div id="edit_gallery" style="display:none;">
		<form action="catcher.php" method="post" enctype="multipart/form-data" onsubmit="return checkGalleryForm()">
			<input type="hidden" name="gallery_id" id="gallery_id" value="" />
			<div class="row">
				<label for="gallery_name">Name:</label>
				<input type="text" id="gallery_name" name="gallery_name" value="" size="25" />
			</div>
			<div class="row">
				<label for="gallery_content">Description:</label>
				<textarea name="gallery_content" id="gallery_content" rows="3" cols="30"></textarea>
			</div>
			<div class="row">
				<label for="gallery_image">Main Image:</label>
				<input type="file" name="gallery_image" id="gallery_image" size="25" />
			</div>
			<div class="row">
				<label>&nbsp;</label>
				<input type="submit" value="Save Changes" />
				<a href="" onclick="return showHide('edit_gallery');">Cancel</a>
			</div>
			
		</form>
		</div>
		
		<ul id="new_album">
			<li><a href="" onclick="return editGallery('new','New Gallery','');">Create a New Gallery</a></li>
		</ul>
		<ul id="album_list">
		<? for($i=0; $i < mysql_num_rows($rs_galleries); $i++): ?>
			<? $row = mysql_fetch_assoc($rs_galleries); ?>
			<li id="album_<?= $row['id']; ?>">
				<? if($row['id'] == $_GET['gallery']): ?>
					<strong><?= $row['name']; ?></strong>
				<? else: ?>
					<a href="index.php?gallery=<?= $row['id']; ?>" onmousedown="useAlbumLink=true;" onclick="return useAlbumLink"><?= $row['name']; ?></a>
				<? endif; ?>
				(	<a href="" onclick="return editGallery('<?= $row['id']; ?>','<?= $row['name']; ?>','<?=$row['content']?>');">Edit</a> | 
					<a href="catcher.php?delete_gallery=<?= $row['id']; ?>" 
					onclick="return confirm('Are you sure you want to delete this gallery?')">Delete</a>
				)
			</li>
		<? endfor; ?>
		</ul>
	</fieldset>
	
	<? if(!empty($this_gallery)): ?>
		<? $rs_images = mysql_query("Select * From images " .
							"Where gallery_id='{$this_gallery['id']}' Order By rank");
		?>
	<fieldset id="images"><legend>Images in <?= $this_gallery['name']; ?></legend>
		<div id="edit_image" style="display:none;">
		<form action="catcher.php" method="post" enctype="multipart/form-data" onsubmit="return checkImageForm()">
			<input type="hidden" name="image_id" id="image_id" value="" />
			<input type="hidden" name="image_gallery" id="image_gallery" value="<?=$this_gallery['id'];?>" />
			<div class="row">
				<label for="image_name">Name:</label>
				<input type="text" id="image_name" name="image_name" value="" size="25" />
			</div>
			<div class="row">
				<label for="image_content">Description:</label>
				<textarea name="image_content" id="image_content" rows="3" cols="30"></textarea>
			</div>
			<div class="row">
				<label for="image_image">Image:</label>
				<input type="file" name="image_image" id="image_image" size="25" />
			</div>
			<div class="row">
				<label>&nbsp;</label>
				<input type="submit" value="Save Changes" />
				<a href="" onclick="return showHide('edit_image')">Cancel</a>
			</div>
		</form>
		</div>
	
		<p><a href="" onclick="return editImage('new','New Image','')">Add New Image</a></p>
		<p>To move an image, click and drag it.</p>
		<ul id="image_list">
		<? while($image = mysql_fetch_assoc($rs_images)): ?>
			<li id="image_<?= $image['id']; ?>"><strong><?= $image['name']; ?></strong><br />
				<img src="/phpThumb/phpThumb.php?src=<?=$image_path.$image['image'];?>&w=150&h=100" 
					alt="<?= $image['name']; ?>" />
				<a href="" onclick="return editImage('<?=$image['id'];?>','<?=addslashes($image['name']);?>','<?=addslashes($image['content']);?>')">Edit</a> | 
				<a href="<?=$image_path.$image['image'];?>" rel="lightbox[gallery]">Preview</a> |
				<a href="catcher.php?gallery=<?=$this_gallery['id'];?>&delete_image=<?=$image['id'];?>"
					onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
			</li>
		<? endwhile; ?>
		</ul>
		<div class="clear"></div>
	</fieldset>
	<? endif; ?>
</div>
<script type="text/javascript">
Sortable.create('image_list', {constraint:false, onUpdate:function(){updateImageOrder('<?= $this_gallery['id']; ?>');}});
Sortable.create('album_list', {onUpdate:updateAlbumOrder});
</script>
</body>
</html>