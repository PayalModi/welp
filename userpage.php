<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">
<h1>Welp</h1>


<?php
	echo "<p id=\"filtersHeaders\">".$_GET["username"]."</p>";


	$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$allcommsql = "SELECT restaurant.name, comment.rating, comment.comment FROM user, restaurant, comment WHERE comment.user_id = user.user_id AND comment.rest_id = restaurant.ID AND user.username LIKE 'rebecca'";

	$result = $conn->query($allcommsql);
	
	if ($result->num_rows > 0) {
		echo "<p id=\"filterHeaders\">".$_GET["username"]."'s reviews</p>";
	} else {
		echo "<p>This user has not left any comments.</p>";
	}
	for ($i = 0; $i < $result->num_rows; $i++) {
		$row = mysqli_fetch_row($result);
		echo "<p>$row[0]: ($row[1] stars)  $row[2]</p>";
	}

	$conn->close();
?>

</body>
</html>
