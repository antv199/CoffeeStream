<?php 
include_once 'header.html';
include_once 'footer.html';?>

<div style="padding: 350px; padding-top: 100px;">
	<form>
		<div class="row align-items-center g-3">
			<div class="form-floating col-auto" >
				<input type="email" class="form-control" id="InputEmail" value="test@example.com">
				<label for="InputEmail">Email address</label>
				<span class="form-text">We'll never share your email with anyone else.</span>
			</div>
			<div class="form-floating col-auto">
				<input type="password" class="form-control" id="InputPassword">
				<label for="InputPassword">Password</label>
				<span class="form-text">Must be 8-20 characters long.</span>
			</div>
		</div>
		<br>

		<!-- Content Creator/Publisher Stuff-->
		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="Check">
			<label class="form-check-label" for="Check">Are you a content creator/publisher?</label>
		</div>
		<div class="mb-3" >
			<label for="InputName" class="form-label">Content Creator/Publisher Name</label>
			<input type="email" class="form-control" id="InputName">
		</div>
		<div class="mb-3" >
			<label for="InputAddress" class="form-label">Street Address</label>
			<input type="email" class="form-control" id="InputAddress">
		</div>
		<div class="mb-3" >
			<label for="InputCountry" class="form-label">Country</label>
			<input type="email" class="form-control" id="InputCountry">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>