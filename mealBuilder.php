<?php
session_start();

include 'config.php';
$dbhost = DBHOST;
$dbname = DBNAME;
$dbuser = DBUSER;
$dbpass = DBPASS;

//Create connection
$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


	

//0 when no save happend
//-1 when an error occurred
//1 when an error occurred
$saveStatus = 0;

//check connection
if(!$mysqli || $msqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
//add to ingredients
else if($_POST['cmd'] == "add")
{
	//update or insert ingredient
	if(!($stmt = $mysqli->prepare("INSERT INTO ingredients(nbdno, name, ru, energy) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE name=?, ru=?, energy=?"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("issdssd",$_POST['ndbno'],$_POST['name'],$_POST['ru'],$_POST['energy'],$_POST['name'],$_POST['ru'],$_POST['energy']))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} else {
		//add to session if sql insert works
		$_SESSION["mealPlan"][$_POST['ndbno']] = array ('name' => $_POST['name'], 'amount' => $_POST['amount'], 'ru' => $_POST['ru'],'energy' => $_POST['energy']);
	}
}
else if($_POST['cmd'] == "delete")
{
	unset($_SESSION["mealPlan"][$_POST['ndbno']]);
}
else if($_POST['cmd'] == "save")
{
	$saveStatus = -1;
	
	
	//don't add an empty string
	if ($_POST['name'] != "")
	{
		//add meal name to database
		if(!($stmt = $mysqli->prepare("INSERT INTO meal(name) VALUES (?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("s",$_POST['name']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			//meal name added successfully now add the ingredients to meal
			foreach($_SESSION["mealPlan"] as $ndbno => $ingre){
				if(!($stmt = $mysqli->prepare("INSERT INTO meal_ingredients(ingreId, mealId, amount) VALUES (?,(SELECT id FROM `meal` WHERE name=?),?)"))){
					echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!($stmt->bind_param("isi",$ndbno, $_POST['name'], $ingre['amount']))){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				} else {
					unset($_SESSION["mealPlan"]);
					$saveStatus = 1;
				}
			}
		}
	}
}
//reset if no post command received
else
{
	unset($_SESSION["mealPlan"]);
}

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
	<h1>Meal Builder</h1>
	<h2>Meal</h2>
	<?php 
		//let user know save failed but display information anyway
		if($saveStatus == -1)
		{
			echo "<h3>Save Failed!</h3>";
		}
		
		if($saveStatus == 1)
		{
			echo "<h3>Save Successfull!</h3>";
		}
		else if(count($_SESSION["mealPlan"]))
		{
			//total calories of the meal
			$totalCals = 0;
			//allow user to delete from food item from session
			foreach($_SESSION["mealPlan"] as $ndbno => $ingre)
			{
					$totalCals = $totalCals + ($ingre['amount'] * $ingre['energy']);
					
					echo "<form action = \"mealBuilder.php\" method=\"post\" onsubmit=\"return formvalidate(this);\">";
					echo "<fieldset>";
					echo "<legend>" . $ingre['name'] ."</legend>";
					echo "<input type=\"hidden\" name=\"ndbno\" value=\"" . $ndbno . "\" readonly=\"readonly\"/>";				
					echo "<input type=\"hidden\" name=\"name\" value=\"" . $ingre['name'] ."\" readonly=\"readonly\"/>";
					echo "<label>Amount of Food (readonly)</label>	";
					echo "<input type=\"number\" name=\"amount\" value=\"" . $ingre['amount'] . "\" min=\"0\" readonly=\"readonly\"/>";
					echo "<label>Units of Amount (readonly)</label>";
					echo "<input type=\"text\" name=\"ru\" value=\"" . $ingre['ru'] . "\" readonly=\"readonly\"/>";
					echo "<label>Calories Per Unit (readonly)</label>";
					echo "<input type=\"number\" name=\"energy\" value=\"" . $ingre['energy'] ."\" readonly=\"readonly\"/>	";
					echo "<input type=\"hidden\" name=\"cmd\" value=\"delete\" />	";
					echo "<input type=\"submit\" class=\"delete\" value=\"delete\" />";
					echo "</fieldset>";
					echo "</form>";


			}
			echo "<form><fieldset>Total Calories in Meal: " . $totalCals . "</fieldset></form>";
			//allow user to save to the database
			echo "<form action = \"mealBuilder.php\" method=\"post\" onsubmit=\"return formvalidate(this);\">";
			echo "<fieldset>";
			echo "<input type=\"text\" name=\"name\" value=\"\" />	";			
			echo "<input type=\"hidden\" name=\"cmd\" value=\"save\" />	";
			echo "<input type=\"submit\" class=\"save\" value=\"save\" />";
			echo "</fieldset>";
			echo "</form>";

		}
		else 
		{
			echo "<h3>Search for food and then added it to the meal plan!</h3>";
		}
	?>

	<h2>Add Food to Meal</h2>
	<form>
		<fieldset id="foodSearch">                    
			<legend>Search for Food</legend>					
				<input id="foodSearchTxt" type="text" class="name" value="" />									
				<input id="foodSearchBtn" type="submit" value="search">
		</fieldset>
	</form>
	<section id="searchResults">

	</section>
	
	
	


	<?php include 'footer.php'; ?>
	<script src="http://web.engr.oregonstate.edu/~konecnyj/CS_361/js/mealBuilder.js"></script>
</body>
</html>