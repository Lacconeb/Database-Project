<?php

	include('db_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = test_input($_POST["name"]);
		$type = test_input($_POST["type"]);

		$sql = 'INSERT INTO power_up (name, type)
		VALUES ("'.$name.'", "'.$type.'")';

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