<?php
	require_once ("UsuarioDAO.class.php");

	$usuarioDAO = new UsuarioDAO();
	$json = json_encode($usuarioDAO->getAll());
	echo $json;
?>