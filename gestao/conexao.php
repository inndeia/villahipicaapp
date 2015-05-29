<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "villahipicaapp";
//conexão com o servidor 
$conect = mysql_connect($host, $user, $pass); 
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro 
if (!$conect) header('Location: index.php?msg=3'); 
// Caso a conexão seja aprovada, então conecta o Banco de Dados. 
$db = mysql_select_db($dbName); 
if (!$db) header('Location: index.php?msg=4');
/*Configurando este arquivo, depois é só você dar um include em suas paginas php, isto facilita muito, pois caso haja necessidade de mudar seu Banco de Dados você altera somente um arquivo*/ 
?>
