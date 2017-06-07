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
	<?php echo "Welcome"; ?>
	<br>
	<h3>Login</h3>	
	<script type="text/javascript">

		function formvalidate(myform)
		{
			return true;
		}


	</script>

	<form action = "loginProcess.php" method="post" onsubmit="return formvalidate(this);">
		<fieldset>                    
			<legend>Login</legend>					
			<label>Username</label>	
			<input type = "text"  name = "user" id = "username" ><br>	
			<br>						
			<label>Password</label>	
			<input type = "password"  name = "password" id = "userpassword" ><br>

			<br><br>
			<input type="submit">

		</fieldset>
	</form>

	<?php include 'footer.php'; ?>
</body>
</html>