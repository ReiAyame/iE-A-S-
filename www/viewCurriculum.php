<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM curriculums");
	$query->execute();
	$result = $query->fetchAll();

	include "fragments/filter.php"
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Curriculum</h2>
<div id="liveFilter">
    <div class="liveFilterContainer">
        <input type="text" class="liveFilterInput default" />
        <a href="#" class="clearField" title="Clear Filter">x</a>
    </div>
    <div class="noResults"> Enter Search Key</div>
			<table class="liveFilterList table table-hover">
				<thead>
					<tr>
						<th>School Year</th>
						<th>Course</th>
						<th>Year</th>
						<th>Semester</th>
						<th>Subject Code</th>
                        <th></th>
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
                        <td><?php echo $curriculum["subjectCode"] ?></td>
                        <td><a href="updateCurriculum.php?id=<?php echo $curriculum["curr_id"] ?>">Edit</a></td>
                    </tr>
                	<?php endforeach; ?>
                	<?php endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>

<?php include "fragments/footer.php" ?>