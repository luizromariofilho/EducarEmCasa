<?php
require_once '../utils/Database.class.php';
class SemestreDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	function objectToArray($semestre){
		$arr = array('id' => $semestre->getId(), 'valor'=> $semestre->getValor());
		return $arr;
	}

	public function salvar($semestre){
		$this->database->connect();
		$arr = $this->objectToArray($semestre);
		if(isset($semestre->id)){
			$result = $this->database->update("semestre", $arr, array('id' => $semestre->getId()));
		} else {
			$result = $this->database->insert("semestre", $arr);
		}
		$this->database->disconnect();
		return $result;
	}

	public function getAll(){
		$this->database->connect();
		$arr = $this->database->select("semestre");
		$this->database->disconnect();
		return $arr;
	}

	public function get($id){
		$this->database->connect();
		$semestre = $this->database->select('semestre', '*' , 'id ='.$id);
		$this->database->disconnect();
		return $semestre;
	}

	public function delete($id){
		$this->database->connect();
		$result =  $this->database->delete('semestre', array('id' => $id));
		$this->database->disconnect();
		return $result;
	}
}
?>