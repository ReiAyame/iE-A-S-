<?php

	include "fragments/header.php";
	include "fragments/nav.php";
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Enrollment Schedule</h2>
			<form action="enrollmentSched.php" id="form" method="post">
				<label>Semester: </label>
					<input class="form-control" type="text"  name="sem" placeholder="9811"/>
				<label>Day: </label>
					<input class="form-control" type="text"  name="day" placeholder="ENGL 1"/>
				<label>Date: </label>
					<input class="form-control" type="text"  name="date" placeholder="7:30"/>
				<label>Year: </label>
					<input class="form-control" type="text"  name="year" placeholder="8:30"/>
				<label>School: </label>
					<input class="form-control" type="text"  name="year" placeholder="SCIS"/>
				<label>Course: </label>
					<input class="form-control" type="text"  name="course" placeholder="S425"/>
				<label>Type: </label>
					<input class="form-control" type="text"  name="type" placeholder="S425"/>
				<button class="btn btn-success" name="createEnrollmentSched" type="submit">Create Enrollment Schedule</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>