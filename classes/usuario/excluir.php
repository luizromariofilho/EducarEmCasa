<?php
	require_once ("UsuarioDAO.class.php");
	$id = $_POST["id"];

	$usuarioDAO = new UsuarioDAO();
	
	echo $usuarioDAO->delete($id);
?>