<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	$query = $pdo->prepare("SELECT * FROM blocks");
	$query->execute();
	$result = $query->fetchAll();
	
?>

	<div class="container-fluid" id="other">
		<div class="container">
			<h2>View Blocks</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Course</th>
						<th>Year</th>
						<th>Block Number</th>
						<th>Class Code</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($result)>0):?>
					<?php $no=1; ?>
					<?php foreach($result as $block): ?>
                    <tr>
                        <td><?php echo $block["course"] ?></td>
                        <td><?php echo $block["year"] ?></td>
                        <td><?php echo $block["block_no"] ?></td>
                        <td><?php echo $block["class_code"] ?></td>
                    </tr>
                	<?php endforeach; ?>
                	<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php include "fragments/footer.php" ?>