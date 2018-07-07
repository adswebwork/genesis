<?
setcookie('name','logout',time()-3600); // resets the cookie to an invalid value
setcookie('logstatus','loggedout'); // sets the logout cookie
?>
<script type="text/javascript">
window.location = "../_genesis/"; // redirects to the root where it will request your password
</script>