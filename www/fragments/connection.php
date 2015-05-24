<?php
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=iEnroll","root","");
	} catch (PDOException $e) {
		exit("Database Error!");
	}
?>