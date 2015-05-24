<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");

	$student_id = $_GET["student_id"];

	$query = $pdo->prepare("SELECT * FROM students WHERE student_id=?;");
	    $query->bindValue(1,$student_id);
		$query->execute();
		$result = $query->fetch();

		if (isset($_POST["update"])) {

			$last_name= $_POST["lastName"];
			$first_name = $_POST["firstName"];
			$middle_name = $_POST["middleName"];
			$course = $_POST["course"];
			$email = $_POST["email"];
			
			$query = $pdo->prepare("UPDATE `enrollmentsystem`.`students` SET `lastName`=?, `firstName`=?, `middleName`=?, `course`=?, `email`=? WHERE `student_id`=?;");
			    $query->bindValue(1,$last_name);
			    $query->bindValue(2,$first_name);
			    $query->bindValue(3,$middle_name);
			    $query->bindValue(4,$course);
			    $query->bindValue(5,$email);
			    $query->bindValue(6,$student_id);
			   	$query->execute();
			   	header("Location: success.php");
			   	
		}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Update Student</h2>
			<form action="updateStudent.php?student_id=<?php echo $student_id?>" id="form" method="post">
				<label>Student ID: </label>
					<input class="form-control" type="text" name="student_id" value="<?php echo $result["student_id"] ?>" />
				<label>Last Name: </label>
					<input class="form-control" type="text" name="lastName" value="<?php echo $result["lastName"] ?>" />
				<label>First Name: </label>
					<input class="form-control" type="text" name="firstName" value="<?php echo $result["firstName"] ?>" />
				<label>Middle Name:</label>
					<input class="form-control" type="text" name="middleName" value="<?php echo $result["middleName"] ?>" />
				<label>Course:</label>
					<input class="form-control" type="text" name="course" value="<?php echo $result["course"] ?>" />
				<label>Email:</label>
					<input class="form-control" type="text" name="email" value="<?php echo $result["email"] ?>" />
				<button class="btn btn-success" type="submit" name="update">Update Student</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>