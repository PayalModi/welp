<html>
<body>

Cuisine is <?php echo $_GET["cuisine"]; ?><br>
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
	$cuisine = $_GET["cuisine"];
	$sql = "SELECT name FROM restaurant WHERE cuisine = $cuisine";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["name"];
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
?>

</html>
