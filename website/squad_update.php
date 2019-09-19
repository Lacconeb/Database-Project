<?php
	include('db_connection.php');

	$id = $name = $gold = '';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = test_input($_POST["id"]);


		$sql = 'SELECT name, gold FROM squad WHERE id="'.$id.'"';
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$name = $row["name"];
		    	$gold = $row["gold"];
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

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Update Row</title>
	</head>

	<body>
		<h2>Squads</h2>

		<form method="post" action="squad_update_check.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
			Gold: <input type="number" name="gold" value="<?php echo $gold; ?>"><br><br>
			<input type="submit" value="Update"><br><br>
		</form>
	</body>

</html>