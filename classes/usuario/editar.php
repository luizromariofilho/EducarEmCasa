
<?php
	require_once ("UsuarioDAO.class.php");
	$id = $_GET["id"];

	$usuarioDAO = new UsuarioDAO();
	
	$json = json_encode($usuarioDAO->get($id));
	echo $json;
?>