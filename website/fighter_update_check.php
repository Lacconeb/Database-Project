<?php

	include('db_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = test_input($_POST["id"]);
		$name = test_input($_POST["name"]);
		$race = test_input($_POST["race"]);
		$class = test_input($_POST["class"]);
		$squad = test_input($_POST["squad"]);
		$weapon = test_input($_POST["weapon"]);
		$armor = test_input($_POST["armor"]);



		$sql = 'UPDATE fighter SET name="'.$name.'", race="'.$race.'", class="'.$class.'", 
		squad_id=(SELECT id FROM squad WHERE id="'.$squad.'"), 
		weapon_id=(SELECT id FROM weapon WHERE id="'.$weapon.'"),
		armor_id=(SELECT id FROM armor WHERE id="'.$armor.'")
		WHERE id="'.$id.'"';

		


		if ($conn->query($sql) === TRUE) {
		    echo "Update Successful";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
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

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Add Row</title>
	</head>

	<body>
		<a href="display_tables.php"><h2>Click Here To Go Home</h2></a>
	</body>

</html>