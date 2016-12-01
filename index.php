<html>

<style type="text/css">
h1 {
	font-size: 78px;
    margin-bottom: 0px;
}

input[type=text] {
    width: 200px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    /*background-image: url('searchicon.png');*/
    /*background-position: 10px 10px; */
    /*background-repeat: no-repeat;*/
    padding: 12px 20px 12px 40px;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 60%;
}
</style>

<script>
function searchForRestaurant() {
	
}
</script>

<head>
	<title>Final Project</title>
</head>

<body>
 	<center>
 		<h1>Welp</h1>
 		<p>Description of welp</p><br>
 		<input type="text" name="search" placeholder="I want to eat..">
 		<br>
 		<p>Filters:</p>
 		<select>
 			<option value="none">Cuisine</option>
  			<option value="Thai">Thai</option>
  			<option value="Japanese">Japanese</option>
  			<option value="American">American</option>
  			<option value="French">French</option>
  			<option value="Mexican">Mexican</option>
  			<option value="Turkish">Mexican</option>
  			<option value="Tapas">Mexican</option>
  			<option value="Asian">Mexican</option>
  			<option value="Southwest">Southwest</option>
  			<option value="Ethiopian">Ethiopian</option>
		</select>
 		<select>
 			<option value="none">Price</option>
  			<option value="$">$</option>
  			<option value="$$">$$</option>
  			<option value="$$$">$$$</option>  			
		</select>
		<button type="button" onclick="searchForRestaurant()">Submit</button>
	</center>

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

		$sql = "SELECT name FROM restaurant";
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
</body>

</html>
