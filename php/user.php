<?php
	class User
	{
		protected $username;
		protected $password;
		protected $first_name;
		protected $last_name;
		protected $message;
		
		function __construct()
		{
			setName();
			setUsername();
			setPassword();
		}
		function setName($a, $b)
		{
			$first_name = $a;
			$last_name = $b;
		}
		function getFirstName()
		{
			return $first_name;
		}
		function getLastName()
		{
			return $last_name;
		}
		function setPassword($a)
		{
			$password = $a;
		}
		function getPassword()
		{
			return $password;
		}
		function setMessage($a)
		{
			$message = $a;
		}
		function getMessage()
		{
			return $message;
		}
		
	}
?>
