<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM classes");
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
						<th>Subject Code</th>
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

                        		$subject_code = $class["subject_code"];
                        		echo "$subject_code";

                        	?></td>
                        <td><?php

                        		$desc = $pdo->prepare("SELECT * FROM `ienroll`.`subjects` WHERE `subject_code`=?;");
									$desc->bindValue(1,$subject_code);
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