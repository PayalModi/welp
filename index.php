<?php session_start(); ?>
<html>
<link rel="stylesheet" type="text/css" href="welpstyle.css" />
<head>
	<title>Final Project</title>
</head>

<body background="background.jpg">
 	<center>
 		<h1><a style="color:orange; text-decoration:none" href="http://35.161.174.85">Welp</a></h1>
		<?php  
			if(isset($_SESSION['user_id'])) {
				echo '<form action="logout.php"> <input type="submit" value="Logout"/> </form>';	
			} else {
				echo '<form action="loginpage.php"> <input type="submit" value="Login"/> </form>';
				echo '<form action=""> <input type="submit" value="Register"/> </form>';
			}
		?>
 		<p id="description">Enter an ingredient that you are craving, a cuisine, and/or a price range, and we will suggest a random item that meets your needs for you from a restaurant in New Haven! </p><br>
 		<form action="query_db.php">
	 		<input type="text" name="ingredient" maxlength=100 placeholder="What item are you craving?">
	 		<br>
	 		<p id="filtersHeaders">Filters:</p>
	 		<select name="cuisine">
	 			<option value="">Cuisine</option>
	  		    <?php 
				// should change this so the login info isn't right here lol i'll work on this later
					$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
    			    $cuisinesql = "SELECT DISTINCT cuisine FROM restaurant ORDER BY cuisine ASC";
  					$cuisinecomm = $conn->query($cuisinesql);
					$cuisinearr = array();
					while ($cuisrow = mysqli_fetch_row($cuisinecomm)) {
						echo "<option value=\"$cuisrow[0]\">$cuisrow[0]</option>";
						$cuisinearr[] = $cuisrow;
					}
					$conn->close();
			      ?>

			</select>
	 		<select name="price">
	 			<option value="none">Price</option>
				<?php
	 				$conn = new mysqli("localhost", "browser", "cs437", "cs437db");
                    $pricesql = "SELECT DISTINCT price FROM restaurant ORDER BY price ASC";
                    $pricecomm = $conn->query($pricesql);
                    $pricearr = array();
                    while ($pricerow = mysqli_fetch_row($pricecomm)) {
                        echo "<option value=\"$pricerow[0]\">$pricerow[0]</option>";
                        $pricearr[] = $pricerow;
                    }
					$conn->close();
				?> 				  			
				</select>
			<input type="submit" value="Submit">
			
		</form>
		<?php  
			if ($_SESSION["user_id"]) {
               echo '<form action="comment_form.php">';
			} else {
				echo '<form action="" style="display:none;">';
			}
		?>
		<hr width="33%">
			<p id="filtersHeaders">Add a comment to a restaurant:</p>
			<input type="text" name="restaurantcomm" maxlength=20 placeholder="Restaurant"><br>
			<input type="text" name="comment" maxlength=140 placeholder="Comment"><br>
			<select name="rating">
	 			<option value="">Rating</option>
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
