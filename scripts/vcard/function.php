<?

$fname = $_POST['Name'];
	$FULL = explode(' ',$fname);
	list($first,$last) = $FULL;
	$name = $last.';'.$first;
$company = $_POST['Company'];
$title = $_POST['Title'];
$office = $_POST['Business'];
$mobile = $_POST['Mobile'];	
$email = $_POST['Email'];	
$now = date('Ymd').'t153049z';

$vcard = 'BEGIN:VCARD
VERSION:2.1
N:'.$name.'
FN:'.$fname.'
ORG:'.$company.'
TITLE:'.$title.'
TEL;WORK;VOICE:'.$office.'
TEL;CELL;VOICE:'.$mobile.'
EMAIL;PREF;INTERNET:'.$email.'
REV:'.$now.'
END:VCARD';


	$file = 'cards/'.$_POST['Name'].'.vcf';
	$handle = fopen($file,'w') or die('Can not open file "'.$file.'"');
	fwrite($handle, $vcard);
	fclose($handle);


echo $vcard;

?>
<script type="text/javascript">location.href="index.php?msg=Success"</script>