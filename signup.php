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
	<br>
	<h3>Sign-up</h3>	
	<script type="text/javascript">

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
	return true;
}


</script>

<form action = "accountProcess.php" method="post" onsubmit="return formvalidate(this);">
	<fieldset>                    
		<legend>Info</legend>
		<label>First name</label>
		<input type = "text"  name = "first" id = "firstname" ><br>	
		<br>	
		<label>Last name</label>
		<input type = "text"  name = "last" id = "lastname" ><br>
		<br>	
		<label>Email</label>	
		<input type = "text"  name = "email" id = "email" ><br><br>	
		<label>Username</label>	
		<input type = "text"  name = "user" id = "username" ><br>	
		<br>						
		<label>Password</label>	
		<input type = "password"  name = "password" id = "userpassword" ><br>
		<br>	
		<label>Password Confirm</label>
		<input type = "password"  name = "passwordconfirm" id = "userpasswordconfirm" >
		
		<br><br>
		<input type="submit">

	</fieldset>
</form>

<?php include 'footer.php'; ?>		
</body>
</html>