<?php
require_once('conexao.php');

$email = $_POST['email'];
$senha = $_POST['pass'];

//Validacoes

if (!preg_match('^([a-zA-Z0-9.-])*([@])([a-z0-9]).([a-z]{2,3})',$email)){
		header('Location: index.php?msg=1');
}
if($senha == ''){
	header('Location: index.php?msg=2');
}

$query = sprintf("SELECT * FROM user WHERE email='%s' AND pass='%s'",
    $conect->real_escape_string($email),
    $conect->real_escape_string($senha));


// Perform Query
$result = $conect->query($query);
if ($result->num_rows != 1) {
   header('Location: index.php?msg=5');
}else{
	$resultado = mysqli_fetch_array($result);
	if (!isset($_SESSION)) session_start();
      
        // Salva os dados encontrados na sessão
        $_SESSION['UserID'] = $resultado['id'];
        $_SESSION['UserNome'] = $resultado['nome'];
        $_SESSION['UserEmail'] = $resultado['email'];
        $_SESSION['UserTipo'] = $resultado['tipo'];
      
        // Redireciona o visitante
        header("Location: dashboard.php"); exit;
}

?>