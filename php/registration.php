<?php
	include "connect.php";
	
	$fname = "";
	$lname = "";
	$uname = "";
	$pwd = "";
	
	if(isset($_POST['submit']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['username'];
		$pwd = md5($_POST['password']);

		$image_name = $_FILES['picture']['name'];
		$image_size = $_FILES['picture']['size'];
		$image_ext = strtolower(end(explode('.', $image_name)));
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
				
				$sql = "SELECT * FROM users WHERE username = '$uname';";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					$error = "username exist";
					echo "username already exist;";
				}
				else
				{
					$sql = "INSERT INTO users(first_name, last_name, username, password, picture)
							VALUES ('$fname', '$lname', '$uname', '$pwd', '$target_file');";
					$result = $conn->query($sql);
					if($result === true)
					{
						$error = "registration successfull";
						echo "connection succcess";
						session_start();
						$_SESSION['login'] = "1";
						$_SESSION['username'] = $uname;
						
					}
					else
					{
						$error = "registraton failed";
						echo "connection error";
					}
					
				}

				header("location: registration_form.php?error=".$error."&error1=".$error1."");

			}
			else
			{
				echo "Sorry, there was an error uploading your file.";
			}
		}

		
	}
	
?>
