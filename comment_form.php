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
<p id="description">Thanks for submitting a comment!</p>
<input action="action" type="button" value="Back" onclick="history.go(-1);" />

<?php

// Logic for submitting the comments here
// Also: (1) limit comments to 140 chars, (2) force user to choose a star rating


?>

</center>
</body>

</html>
