<?php session_start(); ?>
<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<body background="background.jpg">
<center>
 	<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>
 	<p id="description">Enter an ingredient that you are craving, a cuisine, and/or a price range, and we will suggest a random item that meets your needs for you from a restaurant in New Haven! </p>
 	<hr width="33%">
	<p id="output">
	<?php
	        $servername = "localhost";
	        $username = "browser";
	        $password = "cs437";
	        $dbname = "cs437db";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password, $dbname);
	        // Check connection
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
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
				echo "<a href=\"userpage.php?username=".urlencode($crow[4])."&user_id=".urlencode($crow[5])."\">$crow[4]</a>: $crow[2] Stars, $crow[3]<br>";
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
