<?php

	include('db_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = test_input($_POST["id"]);
		$fighter = test_input($_POST["fighter"]);
		$power_up = test_input($_POST["power_up"]);

		$sql = 'UPDATE fighter_power_up SET fighter_id=(SELECT id FROM fighter WHERE id="'.$fighter.'"), 
		power_up_id=(SELECT id FROM power_up WHERE id="'.$power_up.'")
		WHERE id="'.$id.'"';
	
		if ($conn->query($sql) === TRUE) {
		    echo "Update Successful";
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

	$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Update Row</title>
	</head>

	<body>
		<a href="display_tables.php"><h2>Click Here To Go Home</h2></a>
	</body>

</html>