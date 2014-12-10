<?php
	require_once("../usuario/UsuarioDAO.class.php");
	require_once("../usuario/Usuario.class.php");

	class Login {
		var $usuarioDAO;

		function __construct(){
			$this->usuarioDAO = new UsuarioDAO();
		}

		function logar($login, $senha){
			$arr = $this->usuarioDAO->getByLogin($login);
			$usuarioBD = new Usuario($arr[0]['login'], $arr[0]['senha']);
			$usuarioBD->setPermissao($arr[0]['permissao_id']);

			if($usuarioBD->getPassword() == $senha){
				return $usuarioBD->getPermissao();
			}else{
				return false;
			}
		}


	}
?>