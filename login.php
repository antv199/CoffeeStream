<?php 
include_once 'header.php';

$loggedIN=FALSE;
if(isset($_COOKIE['userLoggedIn']) and $_COOKIE['userLoggedIn']==TRUE){
	$loggedIN=TRUE;
}
?>

<title>Log In</title>
<body>
	<center>
		<?php
			if(isset($_GET["error"])){
				if($_GET["error"]==1){
					echo "<div class='alert alert-danger' role='alert'>
							<strong>Error!</strong> Wrong email or password.
						</div>";
				}elseif($_GET["error"]==0){
					echo "<div class='alert alert-success' role='alert'>
							<strong>Success!</strong> You are now logged in.
						</div>";
				}elseif($_GET["error"]==3){
					echo "<div class='alert alert-secondary' role='alert'>
							<strong>Success!</strong> You are now logged out.
						</div>";
				}
			}
		?>
	</center>
	<div style="padding: 410px; padding-top: 100px; top-50 start-50">
		<form method="post" action="logincheck.php" id="loginform">
			<div class="row align-items-center g-3">
				<div class="form-floating col-auto" >
					<input type="email" class="form-control" name="InputEmail" id="InputEmail" <?php if($loggedIN==TRUE){echo 'disabled';} ?> required>
					<label for="InputEmail">Email address</label>
				</div>
				<div class="form-floating col-auto">
					<input type="password" class="form-control" name="InputPassword" id="InputPassword" <?php if($loggedIN==TRUE){echo 'disabled';}?> required>
					<label for="InputPassword">Password</label>
				</div>
			</div>
			<br>

		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="Check">
			<label class="form-check-label" for="Check">Remember me</label>
		</div>
			<button type="submit" value="login" name="login" class="btn btn-primary" <?php if($loggedIN==TRUE){echo 'disabled';}?> >Log In</button>
		</form>
	</div>
</body>