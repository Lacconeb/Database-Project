<?php

	include('db_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = test_input($_POST["name"]);
		$race = test_input($_POST["race"]);
		$class = test_input($_POST["class"]);
		$squad = test_input($_POST["squad"]);
		$weapon = test_input($_POST["weapon"]);
		$armor = test_input($_POST["armor"]);


		$sql = 'INSERT INTO fighter (name, race, class, squad_id, weapon_id, armor_id)
		VALUES ("'.$name.'", "'.$race.'", "'.$class.'", 
		(SELECT id FROM squad WHERE id="'.$squad.'"), 
		(SELECT id FROM weapon WHERE id="'.$weapon.'"), 
		(SELECT id FROM armor WHERE id="'.$armor.'"))';

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

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
		<title>Add Row</title>
	</head>

	<body>
		<a href="display_tables.php"><h2>Click Here To Go Home</h2></a>
	</body>

</html>