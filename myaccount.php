<?php
session_start();
include 'config.php';

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
	<h4>Account Information</h4>
	<?php
	
	if ($_SESSION["username"] == null) {
		echo "Please login to see account information";
		echo "<br><br>";
	}
	else {
		
		// Create connection
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$username = $_SESSION["username"];
		$sql = "SELECT username, firstName, lastName, email FROM Users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		
		while($row = mysqli_fetch_assoc($result)) {
			echo "<br>";
			echo "Username: ".$row["username"];
			echo "<br><br>";
			echo "First name: ".$row["firstName"];
			echo "<br><br>";
			echo "Last name: ".$row["lastName"];
			echo "<br><br>";
			echo "Email address: ".$row["email"];
		}

		mysqli_close($conn);

	}
	echo "<br><br><br><br><br><br>";
	?>
	<?php include 'footer.php'; ?>		
</body>
</html>