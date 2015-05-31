<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addSubject"])) {

		$subject_code = $_POST["code"];
		$description = $_POST["desc"];
		$unit = $_POST["unit"];
		$price = $_POST["price"];
		$slots = $_POST["slots"];

		$query = $pdo->prepare("INSERT INTO `enrollmentsystem` VALUES (?,?,?,?,?,?,?,?,?,?,?);");
		    $query->bindValue(1,$subject_code);
		    $query->bindValue(2,$description);
		    $query->bindValue(3,$unit);
		    $query->bindValue(4,$slots);
		    $query->execute();
		    header("Location: success.php");
		    
	}

?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Subject</h2>
			<form action="addSubject.php" id="form" method="post">
				<label>Subject Code: </label>
					<input class="form-control" type="text"  name="code" placeholder="IT 312L"/>
				<label>Description: </label>
					<input class="form-control" type="text"  name="desc" placeholder="Programming Applications Laboratory"/>
				<label>Unit: </label>
					<input class="form-control" type="text" name="unit" placeholder="3"/>
				<label>Price: </label>
					<input class="form-control" type="text"  name="price" placeholder="0.00"/>
				<label>Slots: </label>
					<input class="form-control" type="text"  name="slots" placeholder="50"/>
				<button class="btn btn-success" name="addSubject" type="submit">Add Subject</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>