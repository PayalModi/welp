<html>
<body>

<center>
 	<h1>Welp</h1>
 	<p>Welp is a tool to help you find blah.</p><br>
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
	        	echo $row[0] ."\t". $row[2] ."\t". $row[3] ."\t".$row[4] ."\t". $row[5] ."\t". $row[8];
	        } else {
	            echo "0 results";
	        }
	        $conn->close();
	?>
</center>

</body>
</html>
