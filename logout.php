<?php
session_start();
session_unset();


?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Think Less Eat Better</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	
</head>
<body>
	<?php include 'header.php'; ?>

	<?php include 'navigation.php';	?>

	<br>
	<h5>You are now logged out</h5>
	<br>
	
	<?php include 'footer.php'; ?>		
</body>
</html>