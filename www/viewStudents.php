<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM students");
	$query->execute();
	$result = $query->fetchAll();
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Students</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>School</th>
						<th>Course</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $student): ?>
                    <tr>
                        <td><?php echo $student["student_id"]; ?></td>
                        <td><?php echo $student["last_name"]; ?></td>
                        <td><?php echo $student["first_name"]; ?></td>
                        <td><?php echo $student["middle_name"] ?></td>
                        <td><?php 

                        		$course = $student["course"];

                        		$sch = $pdo->prepare("SELECT `schools`.`description` AS `description`, `schools`.`school_code` AS `school_code`, `courses`.`course` AS `course`, `courses`.`school` AS `school`, `students`.`course` AS `student_course` FROM `schools` INNER JOIN `courses` INNER JOIN students WHERE `courses`.`course` = ? AND `courses`.`school` = `schools`.`school_code` LIMIT 1;");
									$sch->bindValue(1,$course);
								$sch->execute();
								$res = $sch->fetchAll();

	                    		foreach ($res as $val) {
	                    			echo $val["description"];
	                    		}

                        	?></td>
                        <td><?php echo "$course" ?></td>
                        <td><a href="updateStudent.php?student_id=<?php echo $student["student_id"] ?>">Edit</a></td>
                    </tr>
                	<?php endforeach; ?>
                    <?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php include "fragments/footer.php" ?>