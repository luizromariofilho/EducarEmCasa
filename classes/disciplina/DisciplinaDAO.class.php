<?php
require_once '../utils/Database.class.php';
class DisciplinaDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	public function salvar($disciplina){
		$arr = array($disciplina->getCodigo(), $disciplina->getNome(), $disciplina->getCargaHoraria());
		if(isset($disciplina->id)){
			// update
		} else {
			$this->database->connect();
			$this->database->insert("disciplina", $arr);
		}
	}
}
?>