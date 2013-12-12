<?
session_start();
unset($_SESSION['user']);
unset($_SESSION['attempts']);
header('Location:index.php?status=1');
?>
