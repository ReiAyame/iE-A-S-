<?php

	include "fragments/header.php";

	require_once("fragments/connection.php");
	
	if (isset($_POST["addClass"])) {

		$username = $_POST["username"];
		$password = $_POST["password"];
		$first_name = $_POST["first_name"];
		$middle_name = $_POST["middle_name"];
		$last_name = $_POST["last_name"];
		$department = $_POST["department"];
		$email = $_POST["email"];

		$query = $pdo->prepare("INSERT INTO `ienroll`.`users` (`username`, `password`, `first_name`, `middle_name`, `last_name`, `department`, `email`) VALUES (?,?,?,?,?,?,?);");
		    $query->bindValue(1,$username);
		    $query->bindValue(2,$password);
		    $query->bindValue(3,$first_name);
		    $query->bindValue(4,$middle_name);
		    $query->bindValue(5,$last_name);
		    $query->bindValue(6,$department);
		    $query->bindValue(7,$email);
		    $query->execute();
		    header("Location: verification.php");
		    
	}
	
?>

	<div class="container-fluid" id="other">
		<div class="container well">
			<h2>Sign Up</h2>
			<form action="signUp.php" id="form" method="post">
				<label>Username: </label>
					<input class="form-control" type="text"  name="username"/>
				<label>Password:</label>
					<input class="form-control" type="text"  name="password"/>
				<label>First Name: </label>
					<input class="form-control" type="text"  name="first_name"/>
				<label>Middle Name: </label>
					<input class="form-control" type="text"  name="middle_name"/>
				<label>Last Name: </label>
					<input class="form-control" type="text"  name="last_name"/>
				<label>Department: </label>
					<input class="form-control" type="text"  name="department"/>
				<label>Email: </label>
					<input class="form-control" type="text"  name="email"/>
				<button class="btn btn-success" name="signUp" type="submit">Sign Up</button>
			</form>
		</div>
	</div>

<?php include "fragments/footer.php" ?>