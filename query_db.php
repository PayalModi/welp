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
	        $sql = "SELECT * FROM restaurant WHERE cuisine LIKE '%$cuisine' AND price LIKE '%$price'";
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	        	$random = rand(0, $result->num_rows-1);
	        	$row = mysqli_data_seek($result, $random);
			echo $row["name"];
	        } else {
	            echo "0 results";
	        }
	        $conn->close();
	?>
</center>

</body>
</html>
