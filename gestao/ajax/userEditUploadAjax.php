<?php 

	require_once('../conexao.php');
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$tipo = $_POST['tipo'];

	$sql = "UPDATE user SET nome='$nome', email='$email', pass='$pass', tipo=$tipo WHERE id=$id";
	
	if ($conect->query($sql) === TRUE) {
		$response = array("success" => true);
	} else {
		$response = array("success" => false);
	}
	echo json_encode($response);
		
?>