<?php

	session_start();

	$username = $_POST["username"];
	$password = $_POST["password"];

	if ($username&&$password) {
		$connect = new PDO("mysql:host=localhost;dbname=iEnroll;charset=utf8", "root", "");
		
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = $connect->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");

		$numrows = $connect->query("SELECT * FROM users");
		$row_count = $numrows->rowCount();

		if ($row_count != 0) {
			while ($row = $numrows->fetch(PDO::FETCH_ASSOC)) {
				$dbusername = $row["username"];
				$dbpassword = $row["password"];

				echo "$dbusername";

				if ( $username==$dbusername && $password==$dbpassword ) {
					header("Location: ../welcome.php");
					$_SESSION["username"]=$dbusername;
				} else {
				 	header("Location: ../index.php");
				}

			}
		} else {
			echo "Invalid username and/or password!";
		}

	} else {
		echo "Please enter username and password!";
	}

?>