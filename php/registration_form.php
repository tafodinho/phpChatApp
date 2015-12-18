<!DOCTYPE html>
<?php
if(isset($_POST['submit']))
{
	$image_name = $_FILES['picture']['name'];
	$image_size = $_FILES['picture']['size'];
	$image_ext = end(explode('.', $image_name));
	$image_tmp = $_FILES['picture']['tmp_name'];
	$target_dir = "../img/profile/";
	$target_file = $target_dir .substr((md5(time())), 0, 10).".".$image_ext;;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


	//checks if file is ready to upload
	if($uploadOk == 0)
	{
		echo "Sorry, your file was not uploaded.";
	}
	else
	{
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_file))
		{
			echo "The file ".basename($_FILES['picture']['name'])." has been uploaded.";
		}
		else
		{
			echo "Sorry, there was an error uploading your file.";
		}
	
	}
}
?>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../page.css">
		<link rel="stylesheet" href="../chat.css">
		<?php
			
		?>
	</head>
	<body>
		<div class="container register" id="register-frame">
			<form role="form" method="POST" action="registration.php" enctype="multipart/form-data">
				<div id="form-login" class="">
					<label for="fname">First Name</label>
					<input type="text" name="fname" class="form-control" id="fname" required=""><br>
					<label for="lname">Last Name</label>
					<input type="text" name="lname" class="form-control" id="lname" required=""><br>
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control" id="uname" required=""><br>
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" id="email" required=""><br>
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" id="pwd" required=""><br>
					<label for="cpassword">Confirm Password</label>
					<input type="password" name="cpassword" class="form-control" id="cpwd" required=""><br>
					Select picture: <input type="file" name="picture" class="" id="picture"><br>
					<input type="submit" name="submit" class="button" value="Register" id="">
					<a href="login_form.php"><div class="button now">&larr; back to login</div></a>
				</div>
			</form>
		</div>
	</body>
</html>
