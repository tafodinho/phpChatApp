<!--php scripts which logs a user in -->

<?php
	session_start();//starts a new session
	include "connect.php";//includes the file which has the connection variable
	
	if(isset($_POST['submit']))//checks if the submit button was pressed
	{
		$username = $_POST['username'];//stores username into a variable
		$password = md5($_POST['password']);//stores passowrd into a variable
		
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";//sql statement to select everything from the users table
		$result = $conn->query($sql);//php function to run sql statement
		if($result->num_rows > 0)//checks if anything was returned from users table.
		{
			$row = $result->fetch_array(MYSQL_ASSOC);
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['picture'] = $pic = substr($row['picture'], 3);
			$sql = "INSERT INTO chaters (username, seen, picture) VALUES ('$username', ".time().", '$pic')";
			$result = $conn->query($sql);
			header("location: ../index.php");
		}
		else
		{
			$error = "login error";
			header("location: login_form.php?error=".$error."");//redirects user back to login_form with an initialized error variable
		}
	}
	else
	{
		echo "failure";
	}
?>
<!-- end -->