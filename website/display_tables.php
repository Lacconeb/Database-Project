<?php

	include('db_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Tables</title>
	</head>

	<body>


<!-- ****************************************************** -->
<!-- ********************Fighters************************** -->
<!-- ****************************************************** -->

		<h2>Fighters</h2>

		<form method="post" action="fighter_add.php">
			Name: <input type="text" name="name"><br>
			Race: <select name="race">
						<option value="human">Human</option>
						<option value="elf">Elf</option>
						<option value="dwarf">Dwarf</option>
						<option value="undead">Undead</option>
					</select><br>
			Class: <select name="class">
						<option value="warrior">Warrior</option>
						<option value="mage">Mage</option>
						<option value="archer">Archer</option>
						<option value="rogue">Rogue</option>
					</select><br>
			Squad: <select name="squad">
						<option value="">None</option>
<?php
$sql = "SELECT id, name FROM squad";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$idNUM = $row["id"];
    	$idName = $row["name"];

    	echo '<option value="'.$idNUM.'">'.$idName.'</option>';
    }

}

?>					

					</select><br>
			Weapon: <select name="weapon">
						<option value="">None</option>

<?php

$sql = "SELECT w.id, w.name 
FROM weapon w
WHERE w.id NOT
IN (
    SELECT f.weapon_id
    FROM fighter f 
    WHERE f.weapon_id IS NOT NULL
)";


$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$idNUM = $row["id"];
    	$idName = $row["name"];

    	echo '<option value="'.$idNUM.'">'.$idName.'</option>';
    }

}
			
?>					
					</select><br>
			Armor: <select name="armor">
						<option value="">None</option>

<?php

$sql = "SELECT a.id, a.name 
FROM armor a
WHERE a.id NOT
IN (
    SELECT f.armor_id
    FROM fighter f
    WHERE f.armor_id IS NOT NULL
)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$idNUM = $row["id"];
    	$idName = $row["name"];

    	echo '<option value="'.$idNUM.'">'.$idName.'</option>';
    }

}
					
?>					
					</select><br><br>

			<input type="submit" value="Add Row"><br><br>
		</form>

		<form method="post" action="search.php">
			<input type="hidden" name="table" value="fighter">
			Search by Name: <input type="text" name="search">
			<input type="submit" value="search">
			<br><br>
		</form>


		<table>
			<tr>
				<th>Name</th>
				<th>Race</th>
				<th>Class</th>
				<th>Squad</th>
				<th>Weapon</th>
				<th>Armor</th>
			</tr>

<?php
$sql = "SELECT id, name, race, class, squad_id, weapon_id,armor_id FROM fighter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	echo "<tr>

    			<td>".$row["name"]."</td>
    			<td>".$row["race"]."</td>
    			<td>".$row["class"]."</td>
    			<td>".$row["squad_id"]."</td>
    			<td>".$row["weapon_id"]."</td>
    			<td>".$row["armor_id"]."</td>";

    	echo '<td><form method="post" action="fighter_update.php">
    			<input type="hidden" name="id" value="'.$row["id"].'">
    			<input type="submit" value="update">
    	</form></td>';

    	echo '<td><form method="post" action="fighter_delete.php">
    			<input type="hidden" name="id" value="'.$row["id"].'">
    			<input type="submit" value="delete">
    	</form></td>';
    			

    	echo "</tr>";
    }

    echo "</table>";

} else {
    echo "</table>Table is Empty";
}

?>


<!-- **************************************************** -->
<!-- ********************Squads************************** -->
<!-- **************************************************** -->
<br><br>
		<h2>Squads</h2>

		<form method="post" action="squad_add.php">
			Name: <input type="text" name="name"><br>
			Gold: <input type="number" name="gold"><br><br>
			<input type="submit" value="Add Row"><br><br>
		</form>

		<form method="post" action="search.php">
			<input type="hidden" name="table" value="squad">
			Search by Name: <input type="text" name="search">
			<input type="submit" value="search">
			<br><br>
		</form>

		<table>
			
			<tr>
				<th>Name</th>
				<th>Gold</th>
			</tr>

<?php
$sql = "SELECT id, name, gold FROM squad";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	echo "<tr>
    			<td>".$row["name"]."</td>
    			<td>".$row["gold"]."</td>";

    	echo '<td><form method="post" action="squad_update.php">
    			<input type="hidden" name="id" value="'.$row["id"].'">
    			<input type="submit" value="update">
    	</form></td>';

    	echo '<td><form method="post" action="squad_delete.php">
    			<input type="hidden" name="id" value="'.$row["id"].'">
    			<input type="submit" value="delete">
    	</form></td>';
    			

    	echo "</tr>";
    }

    echo "</table>";

} else {
    echo "</table>Table is Empty";
}

?>
		
<!-- ***************************************************** -->
<!-- **********************Weapons************************ -->
<!-- ***************************************************** -->
<br><br>
		<h2>Weapons</h2>

		<form method="post" action="weapon_add.php">
			Name: <input type="text" name="name"><br>
			Type: <input type="text" name="type"><br>
			Quality: <select name="quality">
						<option value="common">Common</option>
						<option value="rare">Rare</option>
						<option value="epic">Epic</option>
						<option value="legendary">Legendary</option>
					</select><br>
			Durability: <input type="number" name="durability"><br>
			Damage: <input type="number" name="damage"><br><br>
			<input type="submit" value="Add Row"><br><br>
		</form>

		<form method="post" action="search.php">
			<input type="hidden" name="table" value="weapon">
			Search by Name: <input type="text" name="search">
			<input type="submit" value="search">
			<br><br>
		</form>

		<table>
			<tbody>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Quality</th>
				<th>Durability</th>
				<th>Damage</th>
			</tr>

<?php
$sql = "SELECT id, name, type, quality, durability, damage FROM weapon";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

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

    echo "</tbody></table>";

} else {
    echo "</tbody></table>Table is Empty";
}


?>

<!-- ***************************************************** -->
<!-- **********************Armor************************** -->
<!-- ***************************************************** -->
<br><br>
		<h2>Armor</h2>

		<form method="post" action="armor_add.php">
			Name: <input type="text" name="name"><br>
			Type: <input type="text" name="type"><br>
			Quality: <select name="quality">
						<option value="common">Common</option>
						<option value="rare">Rare</option>
						<option value="epic">Epic</option>
						<option value="legendary">Legendary</option>
					</select><br>
			Durability: <input type="number" name="durability"><br>
			Damage Reduction: <input type="number" name="damage_reduction"><br><br>
			<input type="submit" value="Add Row"><br><br>
		</form>

		<form method="post" action="search.php">
			<input type="hidden" name="table" value="armor">
			Search by Name: <input type="text" name="search">
			<input type="submit" value="search">
			<br><br>
		</form>

		<table>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Quality</th>
				<th>Durability</th>
				<th>Damage Reduction</th>
			</tr>

<?php
$sql = "SELECT id, name, type, quality, durability, damage_reduction FROM armor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

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
    echo "</table>Table is Empty";
}

?>

<!-- ***************************************************** -->
<!-- *********************Power-Ups*********************** -->
<!-- ***************************************************** -->
<br><br>
		<h2>Power-Ups</h2>

		<form method="post" action="power_up_add.php">
			Name: <input type="text" name="name"><br>
			Type: <input type="text" name="type"><br><br>
			<input type="submit" value="Add Row"><br><br>
		</form>

		<form method="post" action="search.php">
			<input type="hidden" name="table" value="power_up">
			Search by Name: <input type="text" name="search">
			<input type="submit" value="search">
			<br><br>
		</form>

		<table>
			<tr>
				<th>Name</th>
				<th>Type</th>
			</tr>

<?php
$sql = "SELECT id, name, type FROM power_up";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	echo "<tr>

    			<td>".$row["name"]. "</td>
    			<td>".$row["type"]. "</td>

    		</tr>";
    }

    echo "</table>";

} else {
    echo "</table>Table is Empty";
}

?>

<!-- ***************************************************** -->
<!-- ****************Fighter - Power-Ups****************** -->
<!-- ***************************************************** -->
<br><br>
		<h2>Fighter - Power-Ups</h2>

		<form method="post" action="fighter_power_up_add.php">

			Fighter: <select name="fighter">
<?php
$sql = "SELECT id, name FROM fighter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$idNUM = $row["id"];
    	$idName = $row["name"];

    	echo '<option value="'.$idNUM.'">'.$idName.'</option>';
    }

}

?>					

					</select><br>

			Power-Up: <select name="power_up">
<?php
$sql = "SELECT id, name FROM power_up";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$idNUM = $row["id"];
    	$idName = $row["name"];

    	echo '<option value="'.$idNUM.'">'.$idName.'</option>';
    }

}

?>	
			</select><br><br>
			<input type="submit" value="Add Row"><br><br>
		</form>

		<table>
			<tr>
				<th>Fighter</th>
				<th>Power-Up</th>
			</tr>

<?php
$sql = "SELECT id, fighter_id, power_up_id FROM fighter_power_up";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	echo "<tr>

    			<td>".$row["fighter_id"]. "</td>
    			<td>".$row["power_up_id"]. "</td>";

	    echo '<td><form method="post" action="fighter_power_up_update.php">
    			<input type="hidden" name="id" value="'.$row["id"].'">
    			<input type="submit" value="update">
    	</form></td>';

    	echo '<td><form method="post" action="fighter_power_up_delete.php">
    			<input type="hidden" name="id" value="'.$row["id"].'">
    			<input type="submit" value="delete">
    	</form></td>';
    			

    	echo "</tr>";
    }

    echo "</table>";

} else {
    echo "</table>Table is Empty";
}

?>




	</body>
</html>

<?php
	$conn->close();
?>