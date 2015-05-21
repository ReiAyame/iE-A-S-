<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM subjects");
	$query->execute();
	$result = $query->fetchAll();
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Subjects</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Course Number</th>
						<th>Description</th>
						<th>Unit</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $subject): ?>
                    <tr>
                        <td><?php echo $subject["course_no"]; ?></td>
                        <td><?php echo $subject["description"]; ?></td>
                        <td><?php echo $subject["unit"] ?></td>
                        <td><?php echo $subject["price"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                	<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php include "fragments/footer.php" ?>