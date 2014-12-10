<?php
require_once '../utils/Database.class.php';
class DisciplinaDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	function objectToArray($disciplina){
		$arr = array('id' => $disciplina->getId(), 'nome' => $disciplina->getNome(),
			'codigo' => $disciplina->getCodigo(),'carga_horaria' => $disciplina->getCargaHoraria());
		return $arr;
	}

	public function salvar($disciplina){
		$this->database->connect();
		if(isset($disciplina->id)){
			$arr = array($disciplina->getCodigo(), $disciplina->getNome(), $disciplina->getCargaHoraria());
			$this->database->update("disciplina", $arr, "id = ".$disciplina->getId());
		} else {
			$result = $this->database->insert("disciplina", $this->objectToArray($disciplina));
		}
		$this->database->disconnect();
		return $result;
	}

	public function getAll(){
		$this->database->connect();
		$arr = $this->database->select('disciplina');
		$this->database->disconnect();
		return $arr;
	}

	
}
?>