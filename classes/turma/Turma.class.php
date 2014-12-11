<?php
class Turma{
	var $id;
	var $aluno_id;
  	var $disciplina_id;
  	var $semestre_id;

	function __construct($aluno_id, $disciplina_id, $semestre_id){
		$this->aluno_id = $aluno_id ;
  		$this->disciplina_id =  $disciplina_id;
  		$this->semestre_id =  $semestre_id;
	}

	public function getAlunoId(){
		return $this->aluno_id;
	}

	public function getSemestreId(){
		return $this->semestre_id;
	}

	public function getDisciplinaId(){
		return $this->disciplina_id;
	}


	public function setId($value){
		$this->id = $value;
	}

	public function getId(){
		return $this->id;
	}
}
?>