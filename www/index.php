<?php
	
	include "fragments/header.php";

?>

	<div class="container-fluid" id="main">
		<div class="container well" id="login-well">
			<h2>SLU Online Enrollment</h2>
			<h1>ADMIN</h1>
			<form action="fragments/login.php" id="login-form" method="post">
				<label>USERNAME</label>
				<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
					<input class="form-control" type="text" id="username" name="username" placeholder="Username"/>
				</div>
				<label>PASSWORD</label>
				<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					<input class="form-control" type="text" id="password" name="password" placeholder="Password"/>
				</div>
				<button class="btn btn-success" name="signIn" type="submit">Sign in</button>
			</form>
			<div id="other-options">
				<p><a href="signUp.php">Sign Up</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="forgetPassword.php">Forget Password?</a></p>
			</div>
		</div>
	</div>

<?php include "fragments/footer.php" ?>