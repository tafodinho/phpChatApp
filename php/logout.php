<?php
	session_start();
	include "../core/connect.php";
	$username = $_SESSION['username'];
	$sql = "DELETE FROM chaters WHERE username = '$username'";
	$result = $conn->query($sql);
	session_destroy();
	header("location: login_form.php");
?>