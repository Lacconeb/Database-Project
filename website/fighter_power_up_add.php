<?php

	include('db_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$fighter = test_input($_POST["fighter"]);
		$power_up = test_input($_POST["power_up"]);

		$sql = 'INSERT INTO fighter_power_up (fighter_id, power_up_id)
		VALUES ((SELECT id FROM fighter WHERE id="'.$fighter.'"),
		(SELECT id FROM power_up WHERE id="'.$power_up.'"))';

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
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