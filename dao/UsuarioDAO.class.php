<?php
include('./utils/Database.class.php');

class UsuarioDAO {

	function __constructor(){
	}

	public function teste(){
		echo "string1";
		$db = new Database();
		$db->connect();
		echo "string";
		$db->select('cargo');
		$res = $db->getResult();
		print_r($res);
	}

	/*function save($usuario){
		if(isset($usuario->id)){
			//atualizar
		} else{
			//inserir
		}
	}

	function getAll(){
		$usuarios; // lista completa
		return $usuarios;
	}

	function get($id){
		$usuario = populate($result); //passar resultado da consulta
		return $usuario;
	}

	function populate($result){
		$usuario; //povoar o objeto vindo do banco de dados
		return $usuario;
	}*/

}