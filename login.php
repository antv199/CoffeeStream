<?php 
include_once 'header.php';?>

<title>Log In</title>
<body>
	<div style="padding: 410px; padding-top: 100px; top-50 start-50">
		<form>
			<div class="row align-items-center g-3">
				<div class="form-floating col-auto" >
					<input type="email" class="form-control" id="InputEmail" required>
					<label for="InputEmail">Email address</label>
				</div>
				<div class="form-floating col-auto">
					<input type="password" class="form-control" id="InputPassword" required>
					<label for="InputPassword">Password</label>
				</div>
			</div>
			<br>

		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="Check">
			<label class="form-check-label" for="Check">Remember me</label>
		</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>