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
			$usuarioBD->setId($arr[0]['id']);

			if($usuarioBD->getPassword() == $senha){
				$arr = array('permissao' => $usuarioBD->getPermissao(), 'id' => $usuarioBD->getId());
				return $arr;
			}else{
				return false;
			}
		}


	}
?>