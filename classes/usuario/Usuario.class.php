<?php
class Usuario{
	var $id;
	var $login;
	var $password;
	var $permissao_id;
	var $nome;

	function __construct($login, $password){
		$this->login =  $login;
		$this->password = $password;
	}

	public function getPermissao(){
		return $this->permissao_id;
	}

	public function setPermissao($value){
		$this->permissao_id = $value;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getId(){
		return $this->id;
	}

	public function setNome($value){
		$this->nome = $value;
	}

	public function getNome(){
		return $this->nome;
	}
}
?>