<?php
class Usuario{
	var $login;
	var $password;
	var $permissao;

	function __construct($login, $password){
		$this->login =  $login;
		$this->password = $password;
	}

	public function getPermissao(){
		return $this->permissao;
	}

	public function setPermissao($value){
		$this->permissao = $value;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getPassword(){
		return $this->password;
	}
}
?>