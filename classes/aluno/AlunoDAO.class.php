<?php
require_once '../utils/Database.class.php';
class AlunoDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	function objectToArray($aluno){
		$arr = array('id' => $aluno->getId(), 'nome'=> $aluno->getNome(), 'cpf' => $aluno->getCpf(), 'usuario_id' => $aluno->getUsuarioID() , 'rg' => $aluno->getRg(), 'matricula' => $aluno->getMatricula());
		return $arr;
	}

	public function salvar($aluno){
		$this->database->connect();
		$arr = $this->objectToArray($aluno);
		if(isset($aluno->id)){
			$result = $this->database->update("aluno", $arr, array('id' => $aluno->getId()));
		} else {
			$result = $this->database->insert("aluno", $arr);
		}
		$this->database->disconnect();
		return $result;
	}

	public function getAll(){
		$this->database->connect();
		$arr = $this->getWithResponsavel();
		$this->database->disconnect();
		return $arr;
	}

	public function get($id){
		$this->database->connect();
		$aluno = $this->database->select('aluno', '*' , 'id ='.$id);
		$this->database->disconnect();
		return $aluno;
	}

	public function delete($id){
		$this->database->connect();
		$result =  $this->database->delete('aluno', array('id' => $id));
		$this->database->disconnect();
		return $result;
	}

	public function getWithResponsavel(){
		$query = "SELECT A.*, U.id as responsavel_id, U.nome as responsavel_nome FROM aluno A LEFT JOIN usuario U ON A.usuario_id = U.id";
        $result = pg_query($this->database->getDb(), $query);
        if (!$result) {
            echo "Ocorreu um erro!\n";
            exit;
        }
        $arr = pg_fetch_all($result);
        return $arr;
	}

	public function count(){
		$this->database->connect();
		$query = "SELECT count(id) FROM aluno";
        $result = pg_query($this->database->getDb(), $query);
        if (!$result) {
            echo "Ocorreu um erro!\n";
            exit;
        }
        $arr = pg_fetch_all($result);
		$this->database->disconnect();
        return $arr;
	}

	public function getPorPai($id){
		$this->database->connect();
		$query = "SELECT * FROM aluno A  WHERE A.usuario_id = {$id}";
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