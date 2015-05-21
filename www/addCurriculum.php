<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addCurriculum"])) {

		$curr_id = $_POST["curr_id"];
		$school_year = $_POST["sch_yr"];
		$course = $_POST["course"];
		$year = $_POST["year"];
		$semester = $_POST["sem"];
		$course_no = $_POST["course_no"];

		$query = $pdo->prepare("INSERT INTO `ienroll`.`curriculums` (`curr_id`, `school_year`, `course`, `year`, `semester`, `course_no`) VALUES (?,?,?,?,?,?);;");
		    $query->bindValue(1,$curr_id);
		    $query->bindValue(2,$school_year);
		    $query->bindValue(3,$course);
		    $query->bindValue(4,$year);
		    $query->bindValue(5,$semester);
		    $query->bindValue(6,$course_no);
		    $query->execute();
		    header("Location: success.php");
		    
	}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Curriculum</h2>
			<form action="addCurriculum.php" id="form" method="post">
				<label>Curriculum ID: </label>
					<input class="form-control" type="text"  name="curr_id" placeholder="75"/>
				<label>School Year: </label>
					<input class="form-control" type="text"  name="sch_yr" placeholder="2014"/>
				<label>Course: </label>
					<input class="form-control" type="text"  name="course" placeholder="BSIT"/>
				<label>Year: </label>
					<input class="form-control" type="text"  name="yr" placeholder="1"/>
				<label>Semester:</label>
					<input class="form-control" type="text"  name="sem" placeholder="FIRST"/>
				<label>Course Number: </label>
					<input class="form-control" type="text"  name="course_no" placeholder="ENGL 1"/>
				<button class="btn btn-success" name="addCurriculum" type="submit">Add Curriculum</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>