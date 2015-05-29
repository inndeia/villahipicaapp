<?php
require_once('conexao.php');

$email = $_POST['email'];
$senha = $_POST['pass'];

//Validacoes

if (!ereg('^([a-zA-Z0-9.-])*([@])([a-z0-9]).([a-z]{2,3})',$email)){
		header('Location: index.php?msg=1');
}
if($senha == ''){
	header('Location: index.php?msg=2');
}

$query = sprintf("SELECT * FROM user WHERE email='%s' AND pass='%s' AND status=1",
    mysql_real_escape_string($email),
    mysql_real_escape_string($senha));


// Perform Query
$result = mysql_query($query);

if (mysql_num_rows($result) != 1) {
   header('Location: index.php?msg=5');
}else{
	$resultado = mysql_fetch_assoc($result);
	if (!isset($_SESSION)) session_start();
      
        // Salva os dados encontrados na sessão
        $_SESSION['UserID'] = $resultado['id'];
        $_SESSION['UserNome'] = $resultado['nome'];
        $_SESSION['UserEmail'] = $resultado['email'];
      
        // Redireciona o visitante
        header("Location: dashboard.php"); exit;
}

?>