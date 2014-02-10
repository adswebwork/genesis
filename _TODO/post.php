<?

$form = '<form method="post" action="post.php" name="post"><textarea name="key" style="width:300px;height:100px;"></textarea><input type="submit" value="post" /></form>';
$post = $_POST['key'];
$results = ((!empty($_POST['key'])? $post : $form));
$results = str_replace('
',', ',$results);
echo $results;
echo '<br />';



?>