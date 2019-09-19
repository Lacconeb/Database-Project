
<?php
	include('db_connection.php');

	$id = $name = $race = $class = $squad_id = $weapon_id = $armor_id = '';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = test_input($_POST["id"]);


		$sql = 'SELECT name, race, class, squad_id, weapon_id, armor_id FROM fighter WHERE id="'.$id.'"';
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$name = $row["name"];
		    	$race = $row["race"];
		    	$class = $row["class"];
		    	$squad_id = $row["squad_id"];
		    	$weapon_id = $row["weapon_id"];
		    	$armor_id = $row["armor_id"];
			}

			
		}
		
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Update Row</title>
	</head>

	<body>
		<h2>Fighters</h2>

		<form method="post" action="fighter_update_check.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
			Race: <select name="race">
						<option value="human" <?PHP if($race=='human'){echo 'selected';}?> >Human</option>
						<option value="elf" <?PHP if($race=='elf'){echo 'selected';}?> >Elf</option>
						<option value="dwarf" <?PHP if($race=='dwarf'){echo 'selected';}?> >Dwarf</option>
						<option value="undead" <?PHP if($race=='undead'){echo 'selected';}?> >Undead</option>
					</select><br>
			Class: <select name="class">
						<option value="warrior" <?PHP if($class=='warrior'){echo 'selected';}?> >Warrior</option>
						<option value="mage" <?PHP if($class=='mage'){echo 'selected';}?> >Mage</option>
						<option value="archer" <?PHP if($class=='archer'){echo 'selected';}?> >Archer</option>
						<option value="rogue" <?PHP if($class=='rogue'){echo 'selected';}?> >Rogue</option>
					</select><br>
			Squad: <select name="squad">
						<option value="">None</option>

<?php
$sql = "SELECT id, name FROM squad";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
    	if($squad_id == $row["id"]){

    		$idNUM = $row["id"];
	    	$idName = $row["name"];

	    	echo '<option value="'.$idNUM.'" selected>'.$idName.'</option>';

	    }else{

	    	$idNUM = $row["id"];
	    	$idName = $row["name"];

	    	echo '<option value="'.$idNUM.'">'.$idName.'</option>';
	    }
    }

}

?>					

					</select><br>
			Weapon: <select name="weapon">
						<option value="">None</option>

<?php
$sql = "SELECT id, name FROM weapon WHERE id='".$weapon_id."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

	    	$idNUM = $row["id"];
	    	$idName = $row["name"];

	    	echo '<option value="'.$idNUM.'" selected>'.$idName.'</option>';
	}

}

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
$sql = "SELECT id, name FROM armor WHERE id='".$armor_id."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

	    	$idNUM = $row["id"];
	    	$idName = $row["name"];

	    	echo '<option value="'.$idNUM.'" selected>'.$idName.'</option>';
	}

}

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

$conn->close();
					
?>					
					</select><br><br>

			<input type="submit" value="Add Row"><br><br>
		</form>
	</body>

</html>