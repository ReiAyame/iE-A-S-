<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM `classes` WHERE `class_code` NOT IN (SELECT `class_code` FROM `blocks`);");
	$query->execute();
	$result = $query->fetchAll();
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Classes</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Class Code</th>
						<th>Course Number</th>
						<th>Description</th>
						<th>Time</th>
						<th>Days</th>
						<th>Room</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $class): ?>
                    <tr>
                        <td><?php echo $class["class_code"]; ?></td>
                        <td><?php 

                        		$course_no = $class["course_no"];
                        		echo "$course_no";

                        	?></td>
                        <td><?php

                        		$desc = $pdo->prepare("SELECT * FROM `ienroll`.`subjects` WHERE `course_no`=?;");
									$desc->bindValue(1,$course_no);
								$desc->execute();
								$res = $desc->fetchAll();

	                    		foreach ($res as $val) {
	                    			echo $val["description"];
	                    		}

                        	?></td>
                        <td><?php echo $class["start_time"]." - ".$class["end_time"] ?></td>
                        <td><?php echo $class["days"] ?></td>
                        <td><?php echo $class["room"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                	<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php include "fragments/footer.php" ?>