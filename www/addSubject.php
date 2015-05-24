<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
if (isset($_POST['addSubject'])) {
$code = $_POST["code"];
$school = $_POST["sch"];
$course = $_POST["course"];
$year = $_POST["year"];
$sem = $_POST["sem"];
$description = $_POST["desc"];
$unit = $_POST["unit"];
$slots = $_POST["slots"];

$query = $pdo->prepare("INSERT INTO `subjects` 
VALUES(?,?,?,?,?,?,?,?);");
    $query->bindValue(1,$code);
    $query->bindValue(2,$school);
    $query->bindValue(3,$course);
    $query->bindValue(4,$year);
    $query->bindValue(5,$sem);
    $query->bindValue(6,$description);
    $query->bindValue(7,$unit);
    $query->bindValue(8,$slots);
    $query->execute();
}
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Subject</h2>
			<form action="addSubject.php" id="form" method="post">
				<label>Subject Code: </label>
					<input class="form-control" type="text"  name="code" placeholder="Subject Code"/>
				<label>School: </label>
					<input class="form-control" type="text"  name="sch" placeholder="Enter School eg. SCIS"/>
				<label>Course: </label>
					<input class="form-control" type="text"  name="course" placeholder="Enter Course eg. BSIT"/>
				<label>Year: </label>
					<input class="form-control" type="text"  name="year" placeholder="School Year"/>
				<label>Semster: </label>
					<input class="form-control" type="text"  name="sem" placeholder="Semester"/>
				<label>Description: </label>
					<input class="form-control" type="text"  name="desc" placeholder="Programming Applications Laboratory"/>
				<label>Unit: </label>
					<input class="form-control" type="text" name="unit" placeholder="3"/>
				<label>Slots: </label>
					<input class="form-control" type="text"  name="slots" placeholder="50"/>
				<button class="btn btn-success" name="addSubject" type="submit">Add Subject</button>
			</form>
		</div>
	</div>


<?php include "fragments/footer.php" ?>