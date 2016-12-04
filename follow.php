<?php session_start(); ?>

<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">
<center>
<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>

<?php
	$username = $_GET["username"];
	$userid = $_GET["user_id"];
	$puserid = $_SESSION["user_id"];
	$conn = new mysqli("localhost", "browser", "cs437", "cs437db");

	$followsql = "SELECT user.username, user.user_id FROM user, following
                  WHERE following.user_id LIKE '$puserid' AND following.following_id = user.user_id
                  AND following.following_id LIKE '$userid'";
        $result = $conn->query($followsql);
        if($result->num_rows == 0 && $userid != $puserid) {
			$sql = "INSERT INTO following (user_id, following_id) VALUES ('$puserid', '$userid');";
        	$res = $conn->query($sql);
			header('Location: http://35.161.174.85/userpage.php?username='.urlencode($username).'&user_id='.urlencode($userid));
		}


?>
</center>
</body>
</html>

