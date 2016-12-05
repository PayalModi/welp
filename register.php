<?php session_start(); ?>

<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">

<?php
	echo '<h2>ok</h2>';

        $username = $_GET["username"];

        $conn = new mysqli("localhost", "browser", "cs437", "cs437db");
        $loginsql = "SELECT user.username, user.user_id FROM user WHERE user.username = '$username';";
	$numusersql = "SELECT MAX(user_id) AS user_id FROM user;";
	$maxID = mysqli_fetch_row($conn->query($numusersql))[0];
	$newID = $maxID + 1;
	echo '<p>'.$newID.' a  '.$username.'</p>';
        $result = $conn->query($loginsql);
        if ($result->num_rows == 0) {
		echo '<p>'.$newID.'  '.$username.'</p>';
                $createusersql = "INSERT INTO user (username, user_id) VALUES ('$username', $newID);";
                $res = $conn->query($createusersql);
		if ($res === TRUE) {
			$_SESSION['user_id'] = $newID;
                	$_SESSION['user_name'] = $username;
                	header('Location: http://35.161.174.85');
		} else {
			header('Location: http://35.161.174.85/registerpage.php?fail=2');
		}
        } else { // Username already exists
		header('Location: http://35.161.174.85/registerpage.php?fail=1');
        }
?>


</body>
</html>
