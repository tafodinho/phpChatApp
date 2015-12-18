<!DOCTYPE html>
<?php 

?>
<html>
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../page.css">
		<link rel="stylesheet" href="../chat.css">
		<?php 	
			
		?>
	</head>
	<body>
		<div class="container" id="login-frame">
			<span></span>
			<form role="form" method="POST" action="login.php">
				<div id="form-login">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control" id="login-input" autocomplete="off"><br>
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" id="login-input" autocomplete="off"><br>
					<input type="submit" name="submit" class="button" value="Login" id="">
					<a href="registration_form.php"><div class="button" style="float: right">Register</div></a>
				</div>
			</form>
		</div>
	</body>
</html>
