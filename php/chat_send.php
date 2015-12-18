<?php
	session_start();
	include "../core/connect.php";
	
	if (!empty($_POST['message'])) {
		$user_id = $_SESSION['id']; 
		$message = $_POST['message'];

		$sql = "INSERT INTO message(user_id, message, time)
				VALUES($user_id, '$message', now())";
		$result = $conn->query($sql);

	} else{
		echo "cannot send an empty message";
	}
	
?>
