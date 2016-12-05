<?php session_start(); ?>

<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">
<center>
<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>
<br><br><br>
<?php
	if(isset($_GET["fail"]) && $_GET["fail"] == 1) {
		echo '<p>That user does not exist.</p>';
	}

?>
<form action="login.php">
	<input type="text" name="username" maxlength=20 placeholder="Username"><br>
	<input type="submit" value="Sign In">
</form>

</center>
</body>

</html>
