<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM curriculums");
	$query->execute();
	$result = $query->fetchAll();
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Subjects</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>School Year</th>
						<th>Course</th>
						<th>Year</th>
						<th>Semester</th>
						<th>Course Number</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $curriculum): ?>
                    <tr>
                        <td><?php echo $curriculum["school_year"]; ?></td>
                        <td><?php echo $curriculum["course"]; ?></td>
                        <td><?php echo $curriculum["year"] ?></td>
                        <td><?php echo $curriculum["semester"] ?></td>
                        <td><?php echo $curriculum["course_no"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                	<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php include "fragments/footer.php" ?>