<?php
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=enrollmentsystem","root","");
	} catch (PDOException $e) {
		exit("Database Error!");
	}
?>