<?php 
	require 'config.php';
	session_start();

	$user_check = $_SESSION['login_user'];
	$ses_str = pg_query("SELECT username FROM login.users WHERE username = '$user_check' ");
	$row = pg_fetch_array($ses_str);

	$login_ses = $row['username'];

	if (!isset($_SESSION['login_user'])) {
		
		header("location:\index.php");
	}
 ?>