<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Think Less Eat Better</title>
	<!--<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</head>
<body>
	<?php include 'header.php'; ?>
	<?php include 'navigation.php';	?>
	<br>	
	<br>
	<h3>Sign-up</h3>	
	<script type="text/javascript">
		
		//return false if form does not contain legitimate inputs. Otherwise return true.
		//checks if fields are empty, checks that passwords match, ensures that email address is in correct format.
		function formvalidate(myform)
		{
			if(myform.firstname.value == "") 
			{
				alert("Firstname can't be blank!");
				myform.firstname.focus();
				return false;
			}
			if(myform.lastname.value == "") 
			{
				alert("Last name can't be blank!");
				myform.lastname.focus();
				return false;
			}
			if(myform.email.value == "") 
			{
				alert("email can't be blank!");
				myform.email.focus();
				return false;
			}	
			if(myform.username.value == "") 
			{
				alert("Username can't be blank!");
				myform.username.focus();
				return false;
			}
			if(myform.userpassword.value == "") 
			{
				alert("password can't be blank!");
				myform.userpassword.focus();
				return false;
			}
			if(myform.passwordconfirm.value == "") 
			{
				alert("password can't be blank!");
				myform.userpassword.focus();
				return false;
			}
			if(myform.userpassword.value != myform.passwordconfirm.value) 
			{
				alert("Passwords do not match!");
				myform.userpassword.focus();
				return false;
			}
			
			// adapted from http://www.w3resource.com/javascript/form/email-validation.php
			//regex: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.
			
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myform.email.value)==false)  
			{  
				alert("Please enter a valid email address");
				return false
			}  
 

			//all checks pass return true 
			return true;
		}


	</script>


	<form action = "accountProcess.php" method="post" onsubmit="return formvalidate(this);">
		<fieldset>


			<form action = "accountProcess.php" method="post" onsubmit="return formvalidate(this);">

				<fieldset>

					<div class="container">      

						<div class="row">

							<div class="col-6 text-center">

								<div class="form-group col-10">

									<label for="firstName">First Name</label>

									<input type="text" id="firstname" name = "first" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="First Name">

								</div>

								<div class="form-group col-10">

									<label for="lastName">Last Name</label>

									<input type="text" id="lastname" name = "last" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Last Name">

								</div>

								<div class="form-group col-10">

									<label for="username">Username</label>

									<input type="text" id="username" name = "user" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="User Name">

								</div>

							</div>  

							<div class="col-6 text-center">

								<div class="form-group col-10">

									<label for="weight">Weight (lbs)</label>

									<input type="text" id="weight" name = "weight" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Weight (lbs)">

								</div>

								<div class="form-group col-10">

									<label for="Height">Height (inches)</label>

									<input type="text" id="height" name = "height" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Height">

								</div>

								<div class="form-group col-10">

									<label for="age">Age</label>

									<input type="text" id="age" name = "age" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Age">

								</div>

							</div>

							<div class="container">

								<div class="form-group col-10">

									<label for="email">Email</label>

									<input type="email" id="email" name = "email" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Enter email">

								</div>

								<div class="form-group col-10">

									<label for="password">Password</label>

									<input type="password" id="userpassword" name = "password" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Password">

								</div>

								<div class="form-group col-10">

									<label>Password Confirm</label>

									<input type="password" id="userpasswordconfirm" name = "passwordconfirm" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Confirm Password">

								</div>

							</div>

						</div>

						<button type="submit" class="btn btn-primary">Submit</button>

					</fieldset>

				</form>

</form>

<?php include 'footer.php'; ?>		
</body>
</html>
