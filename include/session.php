<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['logged_id'])){
	die('<script type="text/javascript">
alert("Error, no es posible acceder");
window.location.href = "index.php";
</script>');
}//end isset

