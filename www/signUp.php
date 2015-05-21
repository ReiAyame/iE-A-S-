<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addClass"])) {

		$class_code = $_POST["class_code"];
		$course_no = $_POST["course_no"];
		$start_time = $_POST["start_time"];
		$end_time = $_POST["end_time"];
		$days = $_POST["days"];
		$room = $_POST["room"];

		$query = $pdo->prepare("INSERT INTO `ienroll`.`classes` (`class_code`, `course_no`, `start_time`, `end_time`, `days`, `room`) VALUES (?,?,?,?,?,?);");
		    $query->bindValue(1,$class_code);
		    $query->bindValue(2,$course_no);
		    $query->bindValue(3,$start_time);
		    $query->bindValue(4,$end_time);
		    $query->bindValue(5,$days);
		    $query->bindValue(6,$room);
		    $query->execute();
		    header("Location: verification.php");
		    
	}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Sign Up</h2>
			<form action="fragments/addClass.php" id="form" method="post">
				<label>Username: </label>
					<input class="form-control" type="text"  name="class_code"/>
				<label>Password:</label>
					<input class="form-control" type="text"  name="course_no"/>
				<label>First Name: </label>
					<input class="form-control" type="text"  name="start_time"/>
				<label>Last Name: </label>
					<input class="form-control" type="text"  name="end_time"/>
				<label>Middle Name: </label>
					<input class="form-control" type="text"  name="days"/>
				<label>Department: </label>
					<input class="form-control" type="text"  name="days"/>
				<label>Email: </label>
					<input class="form-control" type="text"  name="room"/>
				<button class="btn btn-success" name="signUp" type="submit">Sign Up</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>