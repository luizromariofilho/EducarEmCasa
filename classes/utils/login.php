<?php
	require_once("Login.class.php");
	if(isset($_POST["username"]) && isset($_POST["username"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
	}else{
		$username = $_GET["username"];
		$password = $_GET["password"];
	}


	if(!isNull($username) && !isNull($password)){
		$login = new Login();	
		echo json_encode($login->logar($username, $password));
	}

	function isNull($value){
		return !isset($value) || $value == "";
	}
?>