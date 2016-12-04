
<iframe="logoutframe" width="0" height="0" border="0" style="display:none;"></iframe>
<?php session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	header('Location: http://35.161.174.85');
 ?>
