<?php
class Semestre{
	var $id;
	var $valor;

	function __construct($valor){
		$this->valor =  $valor;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getId(){
		return $this->id;
	}
}
?>