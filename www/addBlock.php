<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addBlock"])) {

		$course = $_POST["course"];
		$year = $_POST["year"];
		$block_no = $_POST["block_no"];
		$class_code = $_POST["class_code"];

		$query = $pdo->prepare("INSERT INTO `ienroll`.`blocks` (`course`, `year`, `block_no`, `class_code`) VALUES (?,?,?,?);");
		    $query->bindValue(1,$course);
		    $query->bindValue(2,$year);
		    $query->bindValue(3,$block_no);
		    $query->bindValue(4,$class_code);
		    $query->execute();
		    header("Location: success.php");
		    
	}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Block</h2>
			<form action="addBlock.php" id="form" method="post">
				<label>Course:</label>
					<input class="form-control" type="text"  name="course" placeholder="BSIT"/>
				<label>Year: </label>
					<input class="form-control" type="text"  name="year" placeholder="1"/>
				<label>Block Number: </label>
					<input class="form-control" type="text"  name="block_no" placeholder="1"/>
				<label>Class Code: </label>
					<input class="form-control" type="text"  name="class_code" placeholder="8777"/>
				<button class="btn btn-success" name="addAnotherBlock">Add Another Block</button>
				<button class="btn btn-success" name="addBlock" type="submit">Add Block</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>