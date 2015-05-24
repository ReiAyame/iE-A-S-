<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM subjects");
	$query->execute();
	$result = $query->fetchAll();

	include "fragments/filter.php";
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Subjects</h2>

			<div id="liveFilter">
			    <div class="liveFilterContainer">
			        <input type="text" class="liveFilterInput default" />
			        <a href="#" class="clearField" title="Clear Filter">x</a>
			    </div>
			    <div class="noResults"> Enter Search Key</div>
			        <table class="liveFilterList table table-hover">
			            <thead>
			                <tr>
			                    <th>Code</th>
			                    <th>School</th>
			                    <th>Course</th>
			                    <th>Year</th>
			                    <th>Semester</th>
			                    <th>Description</th>
			                    <th>Units</th>
			                    <th>Slots</th>
								<th></th>
			                </tr>
			            </thead>
			            <tbody align="center">
			            <?php if(count($result)>0):?>
			                <?php $no=1; ?>
			                <?php foreach($result as $student): ?>
			                <tr>
			                    <td><?php echo $student["subjectCode"]; ?></td>
			                    <td><?php echo $student["school"]; ?></td>
			                    <!--<td><?php echo $student->firstName; ?></td>-->
			                    <td><?php echo $student["course"]; ?></td>
			                    <td><?php echo $student["year"] ?></td>
			                    <td><?php echo $student["semester"] ?></td>
			                    <td><?php echo $student["description"] ?></td>
			                    <td><?php echo $student["units"] ?></td>
			                    <td><?php echo $student["slots"] ?></td>
			                    <td><a href="updateSub.php?id=<?php echo $student["subjectCode"] ?>">Edit</a></td>
			                </tr>
			                <?php endforeach; ?>
			            <?php endif; ?>
			            </tbody>
			        </table>
			    </div>
			</div>
		</div>
	</div>

<?php include "fragments/footer.php" ?>