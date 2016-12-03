<?php session_start(); ?>
<html>

<style type="text/css">
h1 {
	font-family: Impact;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	font-size: 78px;
	color: orange;
    margin-bottom: 0px;
}

body {
	font-family:arial;
}

#description {
	width: 500px;
}

#filtersHeaders {
	font-size: 20px;
}

select {
	width: 140px;
}

input[type=text] {
    width: 300px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    padding: 12px 13px 12px 13px;
}

input[type=text]:focus {
    width: 60%;
}
</style>

<head>
	<title>Final Project</title>
</head>

<body background="background.jpg">
 	<center>
 		<h1>Welp</h1>
 		<p id="description">Enter an ingredient that you are craving, a cuisine, and/or a price range, and we will suggest a random item that meets your needs for you from a restaurant in New Haven! </p><br>
 		<form action="query_db.php">
	 		<input type="text" name="ingredient" placeholder="What item are you craving?">
	 		<br>
	 		<p id="filtersHeaders">Filters:</p>
	 		<select name="cuisine">
	 			<option value="">Cuisine</option>
	  		    <?php 
				// should change this so the login info isn't right here lol i'll work on this later
					$conn = new mysqli("localhost", "root", "finalproject", "cs437db");
    			    $cuisinesql = "SELECT DISTINCT cuisine FROM restaurant ORDER BY cuisine ASC";
  					$cuisinecomm = $conn->query($cuisinesql);
					$cuisinearr = array();
					while ($cuisrow = mysqli_fetch_row($cuisinecomm)) {
						echo "<option value=\"$cuisrow[0]\">$cuisrow[0]</option>";
						$cuisinearr[] = $cuisrow;
					}
			      ?>

			</select>
	 		<select name="price">
	 			<option value="none">Price</option>
				<?php
	 				$conn = new mysqli("localhost", "root", "finalproject", "cs437db");
                    $pricesql = "SELECT DISTINCT price FROM restaurant ORDER BY price ASC";
                    $pricecomm = $conn->query($pricesql);
                    $pricearr = array();
                    while ($pricerow = mysqli_fetch_row($pricecomm)) {
                        echo "<option value=\"$pricerow[0]\">$pricerow[0]</option>";
                        $pricearr[] = $pricerow;
                    }
				?> 				  			
				</select>
			<input type="submit" value="Submit">
			
		</form>
		<form action="comment_form.php">
		<hr width="33%">
			<p id="filtersHeaders">Add a comment to a restaurant:</p>
			<input type="text" name="username" placeholder="Username"><br>
			<input type="text" name="restaurantcomm" placeholder="Restaurant"><br>
			<input type="text" name="comment" placeholder="Comment"><br>
			<select name="rating">
	 			<option value="none">Rating</option>
	  			<option value="1">&#9733</option>
	  			<option value="2">&#9733&#9733</option>
	  			<option value="3">&#9733&#9733&#9733</option>  
				<option value="4">&#9733&#9733&#9733&#9733</option> 
				<option value="5">&#9733&#9733&#9733&#9733&#9733</option> 
			</select><br>
			<input type="submit" value="Submit">
		</form>
	</center>
</body>

</html>
