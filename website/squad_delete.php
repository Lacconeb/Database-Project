<?php

	include('db_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = test_input($_POST["id"]);

		$sql = 'DELETE FROM squad WHERE id="'.$id.'"';

		if ($conn->query($sql) === TRUE) {
		    echo "Delete Successful";
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
		<title>Delete Row</title>
	</head>

	<body>
		<a href="display_tables.php"><h2>Click Here To Go Home</h2></a>
	</body>

</html>