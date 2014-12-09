<?php

class Disciplina{
	var $id;
	var $nome;
	var $codigo;
	var $carga_horaria;


	function __construct($nome, $codigo, $carga_horaria){
		$this->nome = $nome;
		$this->codigo = $codigo;
		$this->carga_horaria = $carga_horaria;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getCargaHoraria(){
		return $this->carga_horaria;
	}	

}
?>