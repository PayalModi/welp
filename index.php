<html>

<style type="text/css">
h1 {
	font-family: Impact;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	font-size: 78px;
    margin-bottom: 0px;
}

body {
	font-family:arial;
}

#description {
	width: 500px;
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
	 		<p>Filters:</p>
	 		<select name="cuisine">
	 			<option value="">Cuisine</option>
	  			<option value="Japanese">Japanese</option>
	  			<option value="American">American</option>
	  			<option value="French">French</option>
	  			<option value="Mexican">Mexican</option>
	  			<option value="Turkish">Turkish</option>
	  			<option value="Tapas">Tapas</option>
	  			<option value="Asian">Asian</option>
	  			<option value="Southwest">Southwest</option>
	  			<option value="Ethiopian">Ethiopian</option>
			</select>
	 		<select name="price">
	 			<option value="none">Price</option>
	  			<option value="$">$</option>
	  			<option value="$$">$$</option>
	  			<option value="$$$">$$$</option>  			
			</select>
			<input type="submit" value="Submit">
		</form>
		<p id="test"></p>
	</center>
</body>

</html>
