<?php session_start(); ?>

<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">

<?php 


	$username = $_GET["username"];
	
	$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
	$loginsql = "SELECT user.username, user.user_id FROM user WHERE user.username = '$username'";
	$result = $conn->query($loginsql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_row($result);
		$_SESSION['user_id'] = $row[1];
 	   	$_SESSION['user_name'] = $row[0];
		header('Location: http://35.161.174.85');
	} else { // Login failed
		header('Location: http://35.161.174.85/loginpage.php?fail=1');	
	}
?>


</body>
</html>
