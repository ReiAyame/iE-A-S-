<?php

	include "fragments/header.php";
	include "fragments/nav.php";
	include "fragments/connection.php";

	$username_session = $_SESSION["username"];
	$stmt = $pdo->prepare("SELECT first_name, last_name, middle_name FROM users WHERE username = :username");
	$stmt->execute(array(":username" => "$username_session"));
	$row = $stmt->fetch();
	
?>

	<div class="container" id="other">
		<h1><?php echo "Welcome, ".$row["first_name"]." ".$row["middle_name"]." ".$row["last_name"]."!"; ?></h1>
        <img id="user-photo" alt="<?php echo $username_session; ?>" src="images/admin/<?php echo $username_session; ?>.jpg">
	</div>

<?php include "fragments/footer.php"; ?>