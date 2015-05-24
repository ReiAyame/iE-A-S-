<?php
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=ienroll","root","");
	} catch (PDOException $e) {
		exit("Database Error!");
	}
?>