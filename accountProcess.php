<?php
session_start();

function passwordHash($pass) {
	return md5($pass);
}

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
	<h3>Account Information</h3>
	<?php
	include 'config.php';

	
	// Create connection
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	// Check connection	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$usernameEntry = $_POST["user"];	
	$usernameEntry = mysqli_real_escape_string($conn, $_POST["user"]);


	

	$sql = "SELECT email FROM Users WHERE username='$usernameEntry'";
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($result);
	if($rows < 1)
	{		
		$passwordEntry = $_POST["password"];
		$firstNameEntry = $_POST["first"];
		$lastNameEntry = $_POST["last"];
		$emailEntry = $_POST["email"];

		$weightEntry = $_POST["weight"];
		$heightEntry = $_POST["height"];
		$ageEntry = $_POST["age"];
		// $activityEntry = $_POST["activity"];
		// $sexEntry = $_POST["sex"];
		// $breastfeedingEntry = $_POST["breastfeeding"];

		$passwordEntry = mysqli_real_escape_string($conn, $passwordEntry);
		$firstNameEntry = mysqli_real_escape_string($conn, $firstNameEntry);
		$lastNameEntry = mysqli_real_escape_string($conn, $lastNameEntry);
		$emailEntry = mysqli_real_escape_string($conn, $emailEntry);

		$weightEntry = mysqli_real_escape_string($conn, $weightEntry);
		$heightEntry = mysqli_real_escape_string($conn, $heightEntry);
		$ageEntry = mysqli_real_escape_string($conn, $ageEntry);
		// $activityEntry = mysqli_real_escape_string($conn, $activityEntry);
		// $sexEntry = mysqli_real_escape_string($conn, $sexEntry);
		// $breastfeedingEntry = mysqli_real_escape_string($conn, $breastfeedingEntry);

		$_SESSION["username"] = $usernameEntry;

		//hash password
		$passwordEntry = passwordHash($passwordEntry);
		
		//insert
		$sql = "INSERT INTO Users (username, password, firstName, lastName, email, weight, height, age) VALUES ('$usernameEntry', '$passwordEntry', '$firstNameEntry', '$lastNameEntry', '$emailEntry', '$weightEntry', '$heightEntry', '$ageEntry')";

		if (mysqli_query($conn, $sql)) {
			echo "Info saved";
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}		
		
	}
	else {
		echo "Please choose a unique username";
	}

	mysqli_close($conn);
	?>


	<?php include 'footer.php'; ?>
</body>
</html>