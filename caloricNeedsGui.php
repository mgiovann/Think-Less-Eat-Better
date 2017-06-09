<?php
session_start();

if($_SESSION["username"] == "") {
	$username = "Not logged in";
} 
else {
	$username = $_SESSION["username"];
}?>


<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="madstyleyo.css" charset="utf-8">

	<script type="text/javascript">
		var number = 123;
	</script>

	<title>&#9900 Caloric Needs Calculator &#9900</title>

</head>


<body>
	<?php include 'header.php'; ?>
	<?php include 'navigation.php';	?>
	<?php include 'config.php';?>

	<?php
	
	if ($_SESSION["username"] == null) {
		echo "Log in to see calculate caloric goals";
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
		$sql = "SELECT username, firstName, lastName, email, weight, height, age, activity, sex, breastfeeding FROM Users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		
		while($row = mysqli_fetch_assoc($result)) {
			// echo "<br>";
			// echo "Username: ".$row["username"];
			// echo "<br><br>";
			// echo "First name: ".$row["firstName"];
			// echo "<br><br>";
			// echo "Last name: ".$row["lastName"];
			// echo "<br><br>";
			// echo "Email address: ".$row["email"];
			// echo "<br><br>";
			// echo "Weight: ".$row["weight"];
			// echo "<br><br>";
			// echo "height: ".$row["height"];
			// echo "<br><br>";
			// echo "age: ".$row["age"];
			// echo "<br><br>";
			// echo "activity level: ".$row["activity"];
			// echo "<br><br>";
			// echo "sex: ".$row["sex"];
			// echo "<br><br>";
			// echo "breastfeeding: ".$row["breastfeeding"];

			$weight = $row["weight"];
			$height = $row["height"];
			$age = $row["age"];
			$activity = $row["activity"];
			$sex = $row["sex"];
			$breastfeeding = $row["breastfeeding"];
			// echo "<br>";
			// echo $weight."  ";
			// echo $height;
		}

		mysqli_close($conn);

	}
	echo "<br><br><br><br><br><br>";
	?>

	<script type="text/javascript" src="caloricNeedsAlgo.js" charset="utf-8"></script>

	<div id="bg">

		<div id="header">
			Think Less, Eat Better
		</div>
		
		<div id="subHeading"> Get a daily calorie recommendation to meet your goals. </div>
		
		<div id="thumbnailText">
			
			<div id = "formDiv">
				<form>
					
					<table align="center">
						<tr>
							<td>
								User name: <br><input type="text" name="user_name" placeholder="Username" size="20" id="user_input">
								<p>
									
									Index of objects under test <br>(1 and 0 supported. Add  more objects to array manually):<br>
									User ID#: <br><input type="text" name="user_index" placeholder="Stats" size="20" id="usr_index"><p>
									
									<p>
									</td>
									
									<td id="space">
									</td>
									
									<td valign="top">
										
										<!-- ************************************** -->
										<!-- DISPLAY USERNAME - given as text input -->
										<!-- ************************************** -->
										<label id="name">Recommendations for: <?php echo "$username"; ?> </label>
										<span id='display'></span><br>
										<!-- <label id="ID">User ID: </label> -->
										<span id='userIndex'></span>
										<p>
											
											
											<!-- ******************************************** -->
											<!-- DISPLAY CALCULATIONS - computed by algorithm -->
											<!-- ******************************************** -->
											<div id="results">
												<table width="100%">
													
													<tr>
														<td>Calories per day: </td>
														<td id="calories"></td>
													</tr>
													
													<tr>
														<td>Goal weight: </td>
														<td id="goalWeight"></td>
													</tr>
													
													<tr>
														<td>Goal date: </td>
														<td id="goalDate"></td>
													</tr>
													
													<tr>

														
													</table>
												</div>
												

												<script>
													
													function showInput() {
														USERID = document.getElementsByName("user_index")[0].value;
														
														document.getElementById('display').innerHTML = 
														document.getElementById("user_input").value;
														
														document.getElementById('userIndex').innerHTML = 
														document.getElementById("usr_index").value;
														
					//Run algorithm to get plan object
					var functionPlan = caloricNeedsAlgorithm(StatsArray[0], GoalsArray[1]);
					
					//Pull results values from plan object
					var numberOfCalories = functionPlan.dailyAllowedCalories;
					var goalWeight = functionPlan.goalWeight;
					var goalDate = functionPlan.goalDate;
					
					var CALORIES = numberOfCalories;
					document.getElementById("calories").innerHTML = CALORIES;
					
					var GWEIGHT = goalWeight;
					document.getElementById("goalWeight").innerHTML = GWEIGHT;
					
					var GDATE = goalDate;
					GDATE = goalDate.toISOString().slice(0, 10);
					document.getElementById("goalDate").innerHTML = GDATE;
				}
				
			//**************************
			//Build testable classes
			//**************************
			// var Stats = new UserStats(	300,
			// 				61,
			// 				40,
			// 				0,
			// 				'F',
			// 				false);
			

			var databaseWeight = <?php echo $weight;?>;
			var databaseHeight = <?php echo $height;?>;
			var databaseAge = <?php echo $age;?>;

			var Stats = new UserStats(	databaseWeight,
				databaseHeight,
				databaseAge,
				0,
				'F',
				false);
			
			var Stats1 = new UserStats(	240,
				50,
				22,
				0,
				'M',
				false);

			var Goals = new UserGoals(  120,
				4);
			
			var Goals1 = new UserGoals(  200,
				3);
			
			
			//**************************
			//Put test classes into array
			//**************************
			var StatsArray = [Stats, Stats1];
			var GoalsArray = [Goals, Goals1];
			
			//Populate form fields
			var USERID = 0;

		</script>
		
		
	</table>
	
</form> 
<input type="submit" onclick="showInput();"><br/>

</div>

</div>
</div>



<?php include 'footer.php'; ?>	
</body>

</html>