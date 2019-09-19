<?php

	include('db_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Search</title>
	</head>

	<body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$table = test_input($_POST["table"]);
	$search = test_input($_POST["search"]);

	if($table == 'fighter'){

		$sql = "SELECT id, name, race, class, squad_id, weapon_id,armor_id FROM fighter WHERE name='".$search."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			echo '<h2>Fighters</h2>
			<table>
				<tr>
					<th>Name</th>
					<th>Race</th>
					<th>Class</th>
					<th>Squad</th>
					<th>Weapon</th>
					<th>Armor</th>
				</tr>';

		    // output data of each row
		    while($row = $result->fetch_assoc()) {
				echo "<tr>

    			<td>".$row["name"]."</td>
    			<td>".$row["race"]."</td>
    			<td>".$row["class"]."</td>
    			<td>".$row["squad_id"]."</td>
    			<td>".$row["weapon_id"]."</td>
    			<td>".$row["armor_id"]."</td>
    			</tr>";
		    			
	    	}
		

	    	echo "</table>";

		} else {
		    echo "No Results Found";
		}

	}else if($table == 'squad'){

		$sql = "SELECT id, name, gold FROM squad WHERE name='".$search."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			echo '<h2>Squads</h2>
			<table>
			
			<tr>
				<th>Name</th>
				<th>Gold</th>
			</tr>';


		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	echo "<tr>
	    			<td>".$row["name"]."</td>
	    			<td>".$row["gold"]."</td>
	    			</tr>";

		    }

		    echo "</table>";

		} else {
		    echo "No Results Found";
		}

	}else if($table == 'weapon'){

		$sql = "SELECT id, name, type, quality, durability, damage FROM weapon WHERE name='".$search."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			echo '<h2>Weapons</h2>
			<table>			
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Quality</th>
				<th>Durability</th>
				<th>Damage</th>
			</tr>';

		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	echo "<tr>

		    			<td>".$row["name"]. "</td>
		    			<td>".$row["type"]. "</td>
		    			<td>".$row["quality"]. "</td>
		    			<td>".$row["durability"]. "</td>
		    			<td>".$row["damage"]. "</td>

		    		</tr>";
		    }

		    echo "</table>";

		} else {
		    echo "No Results Found";
		}


	}else if($table == 'armor'){

		$sql = "SELECT id, name, type, quality, durability, damage_reduction FROM armor WHERE name='".$search."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			echo '<h2>Armor</h2>
			<table>			
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Quality</th>
				<th>Durability</th>
				<th>Damage Reduction</th>
			</tr>';

		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	echo "<tr>

		    			<td>".$row["name"]. "</td>
		    			<td>".$row["type"]. "</td>
		    			<td>".$row["quality"]. "</td>
		    			<td>".$row["durability"]. "</td>
		    			<td>".$row["damage_reduction"]. "</td>

		    		</tr>";
		    }

		    echo "</table>";

		} else {
		    echo "No Results Found";
		}


	}else if($table == 'power_up'){
		$sql = "SELECT id, name, type FROM power_up WHERE name='".$search."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			echo '<h2>Power-Ups</h2>
			<table>
			<tr>
				<th>Name</th>
				<th>Type</th>
			</tr>';

		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	echo "<tr>

		    			<td>".$row["name"]. "</td>
		    			<td>".$row["type"]. "</td>

		    		</tr>";
		    }

		    echo "</table>";

		} else {
		    echo "No Results Found";
		}

	}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$conn->close();
?>

	<br><br>
	<a href="display_tables.php"><h2>Click Here To Go Home</h2></a>
	</body>

</html>