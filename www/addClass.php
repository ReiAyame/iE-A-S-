<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addClass"])) {

		$class_code = $_POST["class_code"];
		$subject_code = $_POST["subject_code"];
		$start_time = $_POST["start_time"];
		$end_time = $_POST["end_time"];
		$days = $_POST["days"];
		$room = $_POST["room"];

		$query = $pdo->prepare("INSERT INTO `ienroll`.`classes` (`class_code`, `subject_code`, `start_time`, `end_time`, `days`, `room`) VALUES (?,?,?,?,?,?);");
		    $query->bindValue(1,$class_code);
		    $query->bindValue(2,$subject_code);
		    $query->bindValue(3,$start_time);
		    $query->bindValue(4,$end_time);
		    $query->bindValue(5,$days);
		    $query->bindValue(6,$room);
		    $query->execute();
		    header("Location: success.php");
		    
	}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Class</h2>
			<form action="addClass.php" id="form" method="post">
				<label>Class Code: </label>
					<input class="form-control" type="text"  name="class_code" placeholder="9811"/>
				<label>Subject Code:</label>
					<input class="form-control" type="text"  name="subject_code" placeholder="ENGL 1"/>
				<label>Start Time: </label>
					<input class="form-control" type="text"  name="start_time" placeholder="7:30"/>
				<label>End Time: </label>
					<input class="form-control" type="text"  name="end_time" placeholder="8:30"/>
				<label>Days: </label>
					<input class="form-control" type="text"  name="days" placeholder="MWF"/>
				<label>Room: </label>
					<input class="form-control" type="text"  name="room" placeholder="S425"/>
				<button class="btn btn-success" name="addClass" type="submit">Add Class</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>