<?php
	require_once ("Usuario.class.php");
	require_once ("UsuarioDAO.class.php");

	$id = $_POST['id'];
	$nome = $_POST['nome'];

	$usuario = new Usuario($nome);
	if(isset($id) && $id != null && $id != ''){
		$usuario->setId($id);
	}
	$usuarioDAO = new UsuarioDAO();
	echo $usuarioDAO->salvar($usuario);
?>