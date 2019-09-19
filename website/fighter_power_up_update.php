<?php
	include('db_connection.php');

	$id = $fighter_id = $power_up_id = '';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = test_input($_POST["id"]);



		$sql = 'SELECT fighter_id, power_up_id FROM fighter_power_up WHERE id="'.$id.'"';
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	$fighter_id = $row["fighter_id"];
		    	$power_up_id = $row["power_up_id"];
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
		<h2>Fighters - Power-Ups</h2>

		<form method="post" action="fighter_power_up_update_check.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			Fighter: <select name="fighter">
<?php
$sql = "SELECT id, name FROM fighter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	if($fighter_id == $row["id"]){

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

			Power-Up: <select name="power_up">
<?php
$sql = "SELECT id, name FROM power_up";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	if($power_up_id == $row["id"]){

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
$conn->close();

?>	
			</select><br><br>
			<input type="submit" value="Update Row"><br><br>
		</form>




		</form>
	</body>
</html>