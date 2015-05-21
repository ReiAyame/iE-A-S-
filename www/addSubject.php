<?php

	include "fragments/header.php";
	include "fragments/nav.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addSubject"])) {

		$course_code = $_POST["code"];
		$description = $_POST["desc"];
		$unit = $_POST["unit"];
		$price = $_POST["price"];

		$query = $pdo->prepare("INSERT INTO `ienroll`.`subjects` (`course_no`, `description`, `unit`, `price`) VALUES (?,?,?,?);");
		    $query->bindValue(1,$course_code);
		    $query->bindValue(2,$description);
		    $query->bindValue(3,$unit);
		    $query->bindValue(4,$price);
		    $query->execute();
		    header("Location: success.php");
		    
	}

?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Add Subject</h2>
			<form action="addSubject.php" id="form" method="post">
				<label>Course Code</label>
				<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-code fa-fw"></i></span>
					<input class="form-control" type="text"  name="code" placeholder="IT 312L"/>
				</div>
				<label>Description</label>
				<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-align-justify fa-fw"></i></span>
					<input class="form-control" type="text"  name="desc" placeholder="Programming Applications Laboratory"/>
				</div>
				<label>Unit</label>
				<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-yahoo fa-fw"></i></span>
					<input class="form-control" type="text" name="unit" placeholder="3"/>
				</div>
				<label>Price</label>
				<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
					<input class="form-control" type="text"  name="price" placeholder="0.00"/>
				</div>
				<button class="btn btn-success" name="addSubject" type="submit">Add Subject</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>