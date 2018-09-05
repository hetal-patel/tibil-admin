<?php 
	require 'config.php';
	session_start();

	$user_check = $_SESSION['login_user'];
	$type_check = $_SESSION['login_type'];

	$ses_str = pg_query("SELECT username FROM login.users WHERE username = '$user_check', user_type = '$type_check' ");

	$row = pg_fetch_array($ses_str);

	$login_ses = $row['username'];
	$type_ses = $row['user_type'];

	if (!isset($_SESSION['login_user'])) {
		
		header("location:\index.php");
	}
 ?>