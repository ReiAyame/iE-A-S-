	<?php

		session_start();

		include "connection.php";
		
		$username_session = $_SESSION['username'];
		$stmt = $pdo->prepare("SELECT first_name FROM users WHERE username = :username");
		$stmt->execute(array(':username' => "$username_session"));
		$row = $stmt->fetch();

	?>

	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="welcome.php">iEnroll</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="welcome.php">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Add Something<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="addStudent.php">Add Student</a></li>
								<li><a href="addSubject.php">Add Subject</a></li>
								<li><a href="addCurriculum.php">Add Curriculum</a></li>
								<li><a href="addClass.php">Add Class</a></li>
								<li><a href="addBlock.php">Add Block</a></li>
								<li><a href="enrollmentSched.php">Enrollment Sched</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">View Something<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="viewStudents.php">View Students</a></li>
								<li><a href="viewSubjects.php">View Subjects</a></li>
								<li><a href="viewCurriculum.php">View Curriculums</a></li>
								<li><a href="viewClasses.php">View Classes</a></li>
								<li><a href="viewBlocks.php">View Blocks</a></li>
								<li><a href="viewIntlSujects.php">Irregular Classes</a></li>
								<li><a href="viewEnrollmentSched.php">Enrollment Sched</a></li>
							</ul>
						</li>
						<li><a href="statistics.php">Statistics</a></li>
					</ul>
          			<ul class="nav navbar-nav navbar-right">
          				<li><a href="fragments/logout.php">Logout</a></li>
						<li><a href="welcome.php"> <?php echo $row['first_name']; ?> </a></li>
					</ul>
				</div>
			</div>
	    </nav>
	</header>