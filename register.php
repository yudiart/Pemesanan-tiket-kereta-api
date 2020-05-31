<?php include 'pages/templates/header.php'; ?>
<div class="form-controll">
	<form method="post" action='q_register.php'>
		<div class="container">
			<div class="col-sm-12">
				<h1 class="text-center">Register</h1>
				<div class="row mt-5">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" name="email" placeholder="email">
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="password">
						</div>
						<input class="btn btn-primary" type="submit" name="btn" value="Register">	
					</div>
				</div>
			</div>
		</div>
	</form>
</div>