<?php session_start(); ?>

<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">
<center>
<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>
<br><br><br>
<form action="register.php">
	<?php
		if (isset($_GET["fail"]) && $_GET["fail"] == 1) {
			echo '<p>That username is already taken.  Please try another name. </p>';
		} else if (isset($_GET["fail"]) && $_GET["fail"] == 2) {
			echo '<p>Something went wrong, please try again.</p>';
		}
	?>
        <input type="text" name="username" maxlength=20 placeholder="Username"><br>
        <input type="submit" value="Sign Up">
</form>
</center>
</body>

</html>
~          
