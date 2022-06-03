<?php 
include_once 'header.php';

$loggedIN=FALSE;
if(isset($_COOKIE['userLoggedIn']) and $_COOKIE['userLoggedIn']==TRUE){
	$loggedIN=TRUE;
}

if($loggedIN==TRUE){
	echo "
	<center>
	<div class='alert alert-success' role='alert'>
	<strong>Ahem!</strong> You are already logged in...
	</div>
	</center>";
}
?>

<title>Sign Up</title>
<body>
	<div style="padding: 350px; padding-top: 100px;">
		<form method="post" action="signupmngr.php" id="signUpForm" class="row g-3 needs-validation"> 
			<div class="row align-items-center g-3">
				<div class="form-floating col-auto" >
					<input type="email" name="InputEmail" class="form-control" id="InputEmail" value="test@example.com" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  required>
					<label for="InputEmail">Email address</label>
					<span class="form-text">We'll never share your email with anyone else.</span>
				</div>
				<div class="form-floating col-auto">
					<input type="password" name="InputPassword" class="form-control" id="InputPassword" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  required>
					<label for="InputPassword">Password</label>
					<span class="form-text">Must be 8-20 characters long.</span>
				</div>
			</div>
			<br><br>
			<div class="mb-3" >
				<label for="InputCountry" class="form-label">Country</label>
				<input type="text" name="InputCountry" class="form-control" id="InputCountry" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  required>
			</div><br>

			<!-- Content Creator/Publisher Stuff-->
			<div class="mb-3 form-check">
				<label class="form-check-label" for="CheckCC">Are you a content creator/publisher?</label>
				<input type="checkbox" value="0" name="CheckCC" class="form-check-input" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  id="ContentPubCheck">
			</div>
			<div class="mb-3" >
				<label for="InputName" class="form-label">Creator/Publisher Name</label>
				<input type="text" name="InputCCName" class="form-control" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  id="InputCCName">
			</div>
			<div class="mb-3" >
				<label for="InputAddress" class="form-label">Street Address</label>
				<input type="text" name="InputAddress" class="form-control" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  id="InputAddress">
			</div>

			<div class="mb-3 form-check">
				<input type="checkbox" value="1" class="form-check-input" <?php if($loggedIN==TRUE){echo 'disabled';} ?>  id="TOSCheck" required>
				<label class="form-check-label" for="CheckTOS">I accept the TOS</label>
			</div>

			<button type="submit" class="btn btn-primary" <?php if($loggedIN==TRUE){echo 'disabled';} ?>>Submit</button>
		</form>
	</div>
</body>