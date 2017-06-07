<?php
session_start();

include 'config.php';

function passwordHash($pass) {
	return md5($pass);
}

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//check username and password
//sanitize inputs
$usernameEntry = mysqli_real_escape_string($conn, $_POST["user"]);
$passwordEntry = mysqli_real_escape_string($conn, $_POST["password"]);

//hash password
$passwordEntry = passwordHash($passwordEntry);

//select username + password from table
$sql = "SELECT email FROM Users WHERE username='$usernameEntry' and password='$passwordEntry'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

mysqli_close($conn);

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


	<?php
	if($rows==1)
	{
		echo "<br>";
		echo "You are now logged in";
		echo "<br>";
		$_SESSION["username"] = $usernameEntry;
		echo "<br>";
	}
	else {
		echo "<br>";
		echo "Invalid username or password";
		echo "<br>";
	}

	?>
	<br>
	<?php include 'footer.php'; ?>
</body>
</html>