<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Think Less Eat Better</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	Package managers
	-->

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
	<!--
	<form class="form-signin" action = "loginProcess.php" method="post" onsubmit="return formvalidate(this);">
		
        <div class="container">
            
                <h2 class="form-signin-heading">Please sign in</h2>
        
                <label for="inputEmail" class="sr-only">Email address</label>
        
                <input type="email" id="inputEmail" name = "user" class="form-control" placeholder="Email address" required autofocus>
        
                <label for="inputPassword" class="sr-only">Password</label>
        
                <input type="password" id="inputPassword" name = "password" class="form-control" placeholder="Password" required>
        
        
                <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>
      
            
                
                </div>
                
                
                    
      </form>
	-->

	<?php include 'footer.php'; ?>
</body>
</html>
