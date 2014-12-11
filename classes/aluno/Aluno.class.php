<?php
class Aluno{
	var $id;
	var $nome;
	var $rg;
	var $cpf;
	var $matricula;
	var $usuario_id;

	function __construct($nome, $rg, $cpf, $matricula, $usuario_id){
		$this->nome =  $nome;
		$this->rg = $rg;
		$this->matricula = $matricula;
		$this->cpf = $cpf;
		$this->usuario_id = $usuario_id;
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

	public function getCpf(){
		return $this->cpf;
	}

	public function getMatricula(){
		return $this->matricula;
	}

	public function getRg(){
		return $this->rg;
	}

	public function getUsuarioID(){
		return $this->usuario_id;
	}
}
?>