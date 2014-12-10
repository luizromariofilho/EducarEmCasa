<?php
require_once '../utils/Database.class.php';
class UsuarioDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	function objectToArray($usuario){
		$arr = array('id' => $usuario->getId(), 'login' => $usuario->getLogin(),
			'senha' => $usuario->getPassword(),'permissao_id' => $usuario->getPermissao());
		return $arr;
	}


	public function getByLogin($login){
		$this->database->connect();
		$usuario = $this->database->select('usuario', '*' , "login ='{$login}'");
		$this->database->disconnect();
		return $usuario;
	}

	public function salvar($usuario){
		$this->database->connect();
		$arr = $this->objectToArray($usuario);
		if(isset($usuario->id)){
			$result = $this->database->update("usuario", $arr, array('id' => $usuario->getId()));
		} else {
			$result = $this->database->insert("usuario", $arr);
		}
		$this->database->disconnect();
		return $result;
	}

	public function getAll(){
		$this->database->connect();
		$arr = $this->database->select('usuario');
		$this->database->disconnect();
		return $arr;
	}

	public function get($id){
		$this->database->connect();
		$usuario = $this->database->select('usuario', '*' , 'id ='.$id);
		$this->database->disconnect();
		return $usuario;
	}

	public function delete($id){
		$this->database->connect();
		$result =  $this->database->delete('usuario', array('id' => $id));
		$this->database->disconnect();
		return $result;
	}	
}
?>