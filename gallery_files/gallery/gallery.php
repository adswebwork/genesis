<style type="text/css">
#gallery {
	display:block;
	clear:left;
	margin-bottom:1em;
}
#gallery h2, #gallery p{
	margin:0px;
	padding:0px;
}
#gallery img {
	float:left;
	border:0px;
	margin:0px 10px;
}
.gallery_image {
	float:left;
	margin: 3px;
	padding: 5px;
	width:160px;
	border:1px solid #efefef;
	text-align:center;
	height:130px;
}
.gallery_image img {
	border:0px;
}
</style>
<?
/**
 * Include this script to display the gallery on a page
 */
require_once('conf.php');

$rs = mysql_query("Select * From galleries Where id='".addslashes($_GET['gallery'])."'");
if (mysql_num_rows($rs) == 0):
	//No gallery selected
	$rs = mysql_query("Select * From galleries Order By rank, id");
	for($i=0; $i < mysql_num_rows($rs); $i++):
		$gallery = mysql_fetch_assoc($rs);
		$url = $_SERVER['SCRIPT_NAME'].'?gallery='.$gallery['id'];
?>
		<div id="gallery">
			<? if(!empty($gallery['image'])): ?>
				<a href="<?= $url; ?>"><img src="/phpThumb/phpThumb.php?src=<?=$image_path . $gallery['image'];?>&w=150&h=100" alt="<?=$gallery['name'];?>" /></a>
			<? endif; ?>
			<h2><a href="<?=$url;?>"><?=$gallery['name'];?></a></h2>
			<p><?=$gallery['content'];?></p>
			<div style="clear:left;"></div>
		</div>
		
	<? endfor; ?>
<? else: //Gallery selected ?>
	<? $gallery = mysql_fetch_assoc($rs); ?>
	<p><a href="<?=$_SERVER['SCRIPT_NAME'];?>">&lt;&lt; Back to All Galleries</a></p>
	<h2><?= $gallery['name']; ?></h2>
	<p><?= $gallery['content']; ?></p>
	<?
		$rs = mysql_query("Select * From images Where gallery_id='{$gallery['id']}' Order By rank");
		for($i=0; $i < mysql_num_rows($rs); $i++):
			$image = mysql_fetch_assoc($rs);
	?>
	<a class="gallery_image" href="<?=$image_path.$image['image'];?>" rel="lightbox[gallery]" 
		title="<strong><?=$image['name'];?></strong><br/><?=$image['content'];?>">
			<img src="/phpThumb/phpThumb.php?src=<?=$image_path.$image['image'];?>&w=150&h=100" 
				alt="<?=$image['name'];?>" /><br />
			<?= $image['name']; ?>
	</a>
	<? endfor; ?>
<? endif; ?>