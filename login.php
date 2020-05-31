<?php 
session_start();
	require 'server/config.php';
	if (isset($_SESSION['email'])) {
		header('Location: index.php');
	}
	require 'pages/templates/header.php';
 ?>
<div class="header-login text-center mt-4">
	<h1>Login</h1>
</div>
<div class="login">
	<br/>
	<form action="q_login.php" method="post">
		<div>
			<label>Username:</label>
			<input type="text" name="email" id="email" />
		</div>
		<div>
			<label>Password:</label>
			<input type="password" name="password" id="password" />
		</div>			
		<div>
			<input type="submit" value="Login" name="login" class="tombol">
		</div>
	</form>
</div>
