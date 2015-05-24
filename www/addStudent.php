<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");

	if (isset($_POST["addStudent"])) {

		$student_id = $_POST["student_id"];
		$password = $_POST["password"];
		$last_name = $_POST["last_name"];
		$first_name = $_POST["first_name"];
		$middle_name = $_POST["middle_name"];
		$gender = $_POST["gender"];
		$course = $_POST["course"];
		$email = $_POST["email"];

		$query = $pdo->prepare("INSERT INTO `enrollmentsystem`.`students` (`student_id`, `password`, `last_name`, `first_name`, `middle_name`, `gender`, `course`, `email`) VALUES (?,?,?,?,?,?,?,?);");
			$query->bindValue(1,$student_id);
		    $query->bindValue(2,$password);
		    $query->bindValue(3,$last_name);
		    $query->bindValue(4,$first_name);
		    $query->bindValue(5,$middle_name);
		    $query->bindValue(6,$gender);
		    $query->bindValue(7,$course);
		    $query->bindValue(8,$email);
		   	$query->execute();
		   	header("Location: success.php");
	
	}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Student</h2>
			<form action="addStudent.php" id="form" method="post">
				<label>Student ID: </label>
					<input class="form-control" type="text"  name="student_id" placeholder="2150001"/>
				<label>Password:</label>
					<input class="form-control" type="text"  name="password" placeholder="1000512"/>
				<label>Last Name: </label>
					<input class="form-control" type="text"  name="last_name" placeholder="Doe"/>
				<label>First Name: </label>
					<input class="form-control" type="text"  name="first_name" placeholder="John"/>
				<label>Middle Name: </label>
					<input class="form-control" type="text"  name="middle_name" placeholder="Flores"/>
				<label>Gender:</label>
					<input class="form-control" type="text"  name="gender" placeholder="M"/>
				<label>Course:</label>
					<input class="form-control" type="text"  name="course" placeholder="BSIT"/>
				<label>Email:</label>
					<input class="form-control" type="text"  name="email" placeholder="johndoekennedy@gmail.com"/>
				<button class="btn btn-success" name="addStudent" type="submit">Register</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>