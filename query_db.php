<html>

<style type="text/css">
h1 {
	font-family: Impact;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	font-size: 78px;
    margin-bottom: 0px;
	color: orange;
}

p#output {
	text-transform: capitalize;
}

body {
	font-family:arial;
}

#description {
	width: 500px;
	font-size: small;
}

</style>

<body background="background.jpg">
<center>
 	<h1>Welp</h1>
 	<p id="description">Enter an ingredient that you are craving, a cuisine, and/or a price range, and we will suggest a random item that meets your needs for you from a restaurant in New Haven! </p>
 	<hr width="33%">
	<p id="output">
	<?php
	        $servername = "localhost";
	        $username = "root";
	        $password = "finalproject";
	        $dbname = "cs437db";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password, $dbname);
	        // Check connection
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        }
		//add comment if exists
		$username = $_GET["username"];
		$restaurantcomm = $_GET["restaurantcomm"];
		$comment = $_GET["comment"];
		$rating = $_GET["rating"];
		
		$usercommsql = "SELECT user_id FROM user WHERE username='$username';";
		$usercomm = $conn->query($usercommsql);
		$restcommsql = "SELECT ID FROM restaurant WHERE name='$restaurantcomm';";
		$restcomm = $conn->query($restcommsql);
		
		if ($usercomm->num_rows > 0 && $restcomm->num_rows > 0) {
		
		$addcomm = "INSERT INTO comments (user_id, rest_id, rating, comment) VALUES ('$usercomm', '$restcomm', '$rating', '$comment');";

		if ($conn->query($addcomm) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		}
		
	        $ingredient = $_GET["ingredient"];
	        $cuisine = $_GET["cuisine"];
	        $price = $_GET["price"];
	        if ($price == "none") {
	        	$price = "%";
	        }
	        $sql = "SELECT * FROM restaurant, menu, item WHERE cuisine LIKE '%$cuisine' AND price LIKE '$price' AND ingredient_List LIKE '%$ingredient%' AND item.item_id = menu.item_id AND menu.rest_id = restaurant.ID;";
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	        	$random = rand(0, $result->num_rows-1);
	        	mysqli_data_seek($result, $random);
	        	$row = mysqli_fetch_row($result);
	        	echo "Eat: $row[8] <br> At: $row[0] ($row[4], $row[5]) <br> Contact info: $row[2] ";
			echo '<a href="'. $row[3]. '"target="_blank">'. $row[3]. '</a>';
			echo '<hr width="33%">Reviews of '. $row[3] .':<br>';
			$commsql = "SELECT * FROM comment, user WHERE comment.rest_id = '$row[1]' AND comment.user_id = user.user_id;";
	        	$comments = $conn->query($commsql);
			while ($crow = mysqli_fetch_row($comments)) {
				echo "$crow[4]: $crow[2] Stars, $crow[3]";
			}
	        } else {
	            echo "0 results";
	        }

	        $conn->close();
	?>
	</p>
	<input action="action" type="button" value="Back" onclick="history.go(-1);" />
</center>

</body>
</html>
