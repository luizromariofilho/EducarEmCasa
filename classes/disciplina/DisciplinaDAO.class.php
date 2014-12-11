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
		$arr = $this->objectToArray($disciplina);
		if(isset($disciplina->id)){
			$result = $this->database->update("disciplina", $arr, array('id' => $disciplina->getId()));
		} else {
			$result = $this->database->insert("disciplina", $arr);
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

	public function get($id){
		$this->database->connect();
		$disciplina = $this->database->select('disciplina', '*' , 'id ='.$id);
		$this->database->disconnect();
		return $disciplina;
	}

	public function delete($id){
		$this->database->connect();
		$result =  $this->database->delete('disciplina', array('id' => $id));
		$this->database->disconnect();
		return $result;
	}	

	public function count(){
		$this->database->connect();
		$query = "SELECT count(id) FROM disciplina";
        $result = pg_query($this->database->getDb(), $query);
        if (!$result) {
            echo "Ocorreu um erro!\n";
            exit;
        }
        $arr = pg_fetch_all($result);
		$this->database->disconnect();
        return $arr;
	}
}
?>