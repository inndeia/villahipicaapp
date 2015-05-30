<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "villahipicaapp";
//conexão com o servidor 
$conect = mysqli_connect($host, $user, $pass,$dbName); 
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro 
if (!$conect) header('Location: index.php?msg=3'); 
?>
