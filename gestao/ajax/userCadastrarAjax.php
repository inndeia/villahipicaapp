<?php 
include "../conexao.php";
$nome = $_POST['nome']; 
$email = $_POST['email'];
$pass = $_POST['pass'];
$tipo = $_POST['tipo'];

$result = $conect->query("SELECT * FROM user WHERE email='$email'");
if ($result->num_rows == 0) {
	$sql = "INSERT INTO user (nome, email, pass, tipo) VALUES ('$nome', '$email', '$pass', '$tipo')"; 
	if ($conect->query($sql) === TRUE) {
		$response = array("success" => true); 
		echo json_encode($response);
	}else{
		die('erro');
	}
}else{
	$response = array("success" => false);
	echo json_encode($response);
}
?>