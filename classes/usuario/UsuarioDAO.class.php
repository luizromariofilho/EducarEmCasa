<?php
require_once '../utils/Database.class.php';
class UsuarioDAO{
	var $database;
	function __construct(){
		$this->database = new Database();
	}

	function objectToArray($usuario){
		$arr = array('id' => $usuario->getId(), 'nome'=> $usuario->getNome(), 'login' => $usuario->getLogin(),
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
		$arr = $this->getWithPermissao();
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

	public function getWithPermissao(){
		$query = "SELECT U.*, P.id as regra_id, P.regra FROM usuario U LEFT JOIN permissao P ON P.id = U.permissao_id";
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