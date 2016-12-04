<?php session_start() ?>
<html>

<link rel="stylesheet" type="text/css" href="welpstyle.css" />

<body background="background.jpg">
<center>
<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>
<?php

// Logic for submitting the comments here
// (1) limit comments to 140 chars, (2) force user to choose a star rating,
// (3) Check and restaurant and username exist
	$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
	
	$username = $_SESSION["user_name"];
	$restaurantcomm = $_GET["restaurantcomm"];
	$comment = $_GET["comment"];
	$rating = $_GET["rating"];

	if (!isset($_SESSION["user_name"])) {
		echo '<p>not logged in</p>';
	} else if (!isset($_GET['rating'])) {
		echo '<p>You must set a rating to leave a comment.</p>';
	} else if (strlen($comment) > 140 || strlen($comment) == 0) {
		echo '<p>Comment must be between 1 and 140 characters long</p>';
	} else {

   		$usercommsql = "SELECT user_id FROM user WHERE username='$username';";
		$usercomm = mysqli_fetch_row($conn->query($usercommsql));
		$restcommsql = "SELECT ID FROM restaurant WHERE name='$restaurantcomm';";
		$restcomm = mysqli_fetch_row($conn->query($restcommsql));
		if ($usercomm > 0 && $restcomm > 0) {
			$addcomm = "INSERT INTO comment (user_id, rest_id, rating, comment) VALUES ('$usercomm[0]', '$restcomm[0]', '$rating', '$comment');";
			if ($conn->query($addcomm) === TRUE) {
			    //echo "<br> $usercomm[0] $restcomm[0] $rating $comment";
				echo '<p id="description">Thanks for submitting a comment!</p>';
			} else {
				echo '<p id="description">Something went wrong... please try again.</p>';
			}
		}
	}
	echo '<input action="action" type="button" value="Back" onclick="history.go(-1);" />';

?>

</center>
</body>

</html>
