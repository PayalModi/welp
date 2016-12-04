<?php session_start(); ?>
<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">
<center>
<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>

<?php



	$username = $_GET["username"]; // name of user you are looking at
	$userid = $_GET["user_id"];  // id of user you are looking at
	$puserid = $_SESSION["user_id"];	 // your own login id

	$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	echo "<p id=\"filtersHeaders\">".$username."</p>";
	if (isset($_SESSION["user_name"]) && $username != $_SESSION["user_name"]) {
		// If not already following them, show follow button		
		$followsql = "SELECT user.username, user.user_id FROM user, following
					  WHERE following.user_id LIKE '$puserid' AND following.following_id = user.user_id
					  AND following.following_id LIKE '$userid'";
		$result = $conn->query($followsql);
		if($result->num_rows == 0) { // not following them
			echo '<a href="follow.php?username='.urlencode($username).'&user_id='.urlencode($userid).'">
					Follow
				</a>';
		} else {
			echo '<a href="unfollow.php?username='.urlencode($username).'&user_id='.urlencode($userid).'">
                                        Unfollow
				  </a>';
		}
		

		// If already following them, show unfollow button
	}
	echo '<hr width="33%">';

	$allcommsql = "SELECT restaurant.name, comment.rating, comment.comment
				   FROM user, restaurant, comment
				   WHERE comment.user_id = user.user_id AND comment.rest_id = restaurant.ID 
				   AND user.username LIKE '$username'";

	$result = $conn->query($allcommsql);
	
	if ($result->num_rows > 0) {
		echo "<p id=\"filterHeaders\">".$username."'s reviews</p>";
	} else {
		echo "<p>This user has not left any comments.</p>";
	}
	for ($i = 0; $i < $result->num_rows; $i++) {
		$row = mysqli_fetch_row($result);
		echo "<p>$row[0]: ($row[1] stars)  $row[2]</p>";
	}

	$allfollowsql = "SELECT user.username, user.user_id FROM user, following
					 WHERE following.user_id = $userid AND following.following_id = user.user_id";

	$fresult = $conn->query($allfollowsql);
	echo '<hr width="33%">';
	if ($fresult->num_rows == 0) {
		echo "<p>This user is not following anyone yet.</p>";
	} else {
		echo '<p id="filtersHeaders">'.$username.' is following:</p>';
	}
	for ($i = 0; $i < $fresult->num_rows; $i++) {
		$frow = mysqli_fetch_row($fresult);
		echo "<a href=\"userpage.php?username=".urlencode($frow[0])."&user_id=".urlencode($frow[1])."\">$frow[0]</a>";
	}
	$conn->close();
?>
</center>
</body>
</html>
