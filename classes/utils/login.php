<?php
	require_once("Login.class.php");
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(!isNull($username) && !isNull($password)){
		$login = new Login();
		echo $login->logar($username, $password);
	} else{
		echo false;
	}

	function isNull($value){
		return !isset($value) || $value == "";
	}
?>