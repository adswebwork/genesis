<?
$status = $_GET['msg'];
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>vCard</title>
<style type="text/css">label{width:200px;display:block;}</style>
</head>
<body>
<p>vCards created for outlook upon form submission</p>
<hr/>
<form action="function.php" method="post" name="vcard">
<label>Name:</label><input type="text" value="" name="Name"/>
<label>Job Title:</label><input type="text" value="" name="Title"/>
<label>Company:</label><input type="text" value="" name="Company"/>
<label>Business Phone:</label><input type="text" value="" name="Business"/>
<label>Mobile Phone:</label><input type="text" value="" name="Mobile"/>
<label>Email Address:</label><input type="text" value="" name="Email"/>
<button type="submit">Send</button>
</form>

<hr />
<strong>Status: <?= $status; ?></strong>

</body>
</html>


