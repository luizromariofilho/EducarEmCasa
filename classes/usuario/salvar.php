<?php
	require_once ("Usuario.class.php");
	require_once ("UsuarioDAO.class.php");

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$permissao_id = $_POST['permissao_id'];

	$usuario = new Usuario($login, $senha);
	$usuario->setPermissao($permissao_id);
	$usuario->setNome($nome);
	if(isset($id) && $id != null && $id != ''){
		$usuario->setId($id);
	}
	$usuarioDAO = new UsuarioDAO();
	echo $usuarioDAO->salvar($usuario);
?>