<html>

<link rel="stylesheet" type="text/css" href="welpstyle.css" />

<body background="background.jpg">
<center>
<h1>Welp</h1>
<p id="description">Thanks for submitting a comment!</p>
<input action="action" type="button" value="Back" onclick="history.go(-1);" />

<?php

// Logic for submitting the comments here
// (1) limit comments to 140 chars, (2) force user to choose a star rating,
// (3) Check and restaurant and username exist
	$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
	
	$username = $_GET["username"];
	$restaurantcomm = $_GET["restaurantcomm"];
	$comment = $_GET["comment"];
	$rating = $_GET["rating"];

	if (!isset($_GET['rating'])) {
		echo '<p>no rating</p>';
	} else if (strlen($comment) > 140 || strlen($comment) == 0) {
		echo '<p>comment too long or nonexistent</p>';
	} else {

   		$usercommsql = "SELECT user_id FROM user WHERE username='$username';";
		$usercomm = mysqli_fetch_row($conn->query($usercommsql));
		$restcommsql = "SELECT ID FROM restaurant WHERE name='$restaurantcomm';";
		$restcomm = mysqli_fetch_row($conn->query($restcommsql));
		if ($usercomm > 0 && $restcomm > 0) {
			$addcomm = "INSERT INTO comment (user_id, rest_id, rating, comment) VALUES ('$usercomm[0]', '$restcomm[0]', '$rating', '$comment');";
			if ($conn->query($addcomm) === TRUE) {
			    echo "<br> $usercomm[0] $restcomm[0] $rating $comment";
			}
		}
	}

?>

</center>
</body>

</html>
