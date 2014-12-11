<?php
require_once '../utils/Database.class.php';
class TurmaDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	function objectToArray($turma){
		$arr = array('id' => $turma->getId(), 'aluno_id' => $turma->getAlunoId(), 'disciplina_id' => $turma->getDisciplinaId()
			, 'semestre_id' => $turma->getSemestreId());
		return $arr;
	}

	public function salvar($turma){
		$this->database->connect();
		$arr = $this->objectToArray($turma);
		if(isset($turma->id)){
			$result = $this->database->update("turma", $arr, array('id' => $turma->getId()));
		} else {
			$result = $this->database->insert("turma", $arr);
		}
		$this->database->disconnect();
		return $result;
	}
	public function salvarNotas($turma_id, $nota, $falta){
		$this->database->connect();
		$result = $this->database->insert('nota', array('valor' => $nota, 'turma_id' => $turma_id));
		if($result){
			$result = $this->database->insert('falta', array('valor' => $falta, 'turma_id' => $turma_id));
		}else{
			$this->database->disconnect();
			return false;
		}
		$this->database->disconnect();
		return $result;
	}
	

	public function getAll(){
		$this->database->connect();
		$arr = $this->getCompleto();
		$this->database->disconnect();
		return $arr;
	}

	public function get($id){
		$this->database->connect();
		$turma = $this->database->select('turma', '*' , 'id ='.$id);
		$this->database->disconnect();
		return $turma;
	}

	public function delete($id){
		$this->database->connect();
		$result =  $this->database->delete('turma', array('id' => $id));
		$this->database->disconnect();
		return $result;
	}

	public function getCompleto(){
		$query = "SELECT T.id, D.nome as disciplina_nome, A.nome as aluno_nome, S.valor as semestre_valor FROM turma T LEFT JOIN disciplina D ON T.disciplina_id = D.id LEFT JOIN aluno A ON T.aluno_id = A.id LEFT JOIN semestre S ON T.semestre_id = S.id";
        $result = pg_query($this->database->getDb(), $query);
        if (!$result) {
            echo "Ocorreu um erro!\n";
            exit;
        }
        $arr = pg_fetch_all($result);
        return $arr;
	}
}
?>