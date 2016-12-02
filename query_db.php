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
	        	echo "Eat: $row[8] <br> At: $row[0] ($row[4], $row[5]) <br> Contact info: $row[2] $row[3]";
			echo "<a href="http://www.w3schools.com/html/">Visit our HTML tutorial</a>";
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
