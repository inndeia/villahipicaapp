<?php 
session_start(); 
if((!isset ($_SESSION['UserID']) == true) and (!isset ($_SESSION['UserNome']) == true)) { 
	unset($_SESSION['UserID']); 
	unset($_SESSION['UserNome']); 
	header('location:index.php'); 
} 
$nome = $_SESSION['UserNome']; 
?>
<?php require_once('header.php')?>
<script type="text/javascript" src="js/script_user.js"></script>
<?php require_once('menu.php')?>