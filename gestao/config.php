<?php 
session_start(); 
if((!isset ($_SESSION['UserID']) == true) and (!isset ($_SESSION['UserNome']) == true)) { 
	unset($_SESSION['UserID']); 
	unset($_SESSION['UserNome']); 
	unset($_SESSION['UserTipo']);
	header('location:index.php'); 
} 
if($_SESSION['UserTipo'] != 1){
	header('location:dashboard.php');
}
$nome = $_SESSION['UserNome'];
?>
<?php require_once('header.php')?>
<?php require_once('menu.php')?>
<div class="row clearfix" style="margin-top:70px;">
		<div class="col-md-4 column">
			<div class="bem_vindo_user">
				<h4>Bem vindo, <?php echo $nome ?></h4>
			</div>
		</div>
		<div class="col-md-4 column">
			
		</div>
		<div class="col-md-4 column">
			
		</div>
</div>
<?php
include 'conexao.php';
$exibirAlert = 'hidden';
$msgAlert='';
$classAlert='';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$hastagPost = $_POST['hastag'];
	$tempoAtualizacaoPost = $_POST['tempo_atualizacao'];
	$tempoFotoSlidePost = $_POST['tempo_foto_slide'];
	
	$sql = "UPDATE config SET hastag='$hastagPost', tempo_atualizacao=$tempoAtualizacaoPost, tempo_foto_slide=$tempoFotoSlidePost WHERE id=1";
	if ($conect->query($sql) === TRUE) {
		$exibirAlert ='';
		$tipoAlert = 'Sucesso';
		$msgAlert = 'Alterado com sucesso!';
		$classAlert = 'success';
	} else {
		$exibirAlert ='';
		$tipoAlert = 'Error';
		$msgAlert = 'Erro ao alterar!';
		$classAlert = 'danger';
	}
}


$sql = 'SELECT * FROM config WHERE id=1';
$result = $conect->query($sql);
$hastag = ''; 
$tempoAtualizacao = '';
$tempoFotoSlide = '';
while($row = mysqli_fetch_array($result)) {
	$hastag = $row['hastag'];
	$tempoAtualizacao = $row['tempo_atualizacao'];
	$tempoFotoSlide = $row['tempo_foto_slide'];
}
?>
<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="alert alert-<?php echo $classAlert?> alert-dismissable <?php echo $exibirAlert?>">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					<?php echo $tipoAlert;?>
				</h4> <?php echo $msgAlert;?>
			</div>
		</div>
	</div>
<div class="row clearfix">
		<div class="col-md-4 column">
			<h2>Configurações</h2>
			<form role="form" action="config.php" method="POST">
				<div class="form-group">
					 <label for="hastag">Hastag* (Obs: Coloque a hastag sem '#')</label><input type="text" class="form-control" id="hastag" name="hastag" value="<?php echo $hastag;?>" required/>
				</div>
				<div class="form-group">
					 <label for="tempoAtulizacao">Tempo botão atualização em minutos*</label><input type="text" class="form-control" id="tempo_atualizacao" name="tempo_atualizacao" value="<?php echo $tempoAtualizacao;?>" required/>
				</div>
				<div class="form-group">
					 <label for="tempo_foto_slide">Tempo da foto no slide em segundos*</label><input type="text" class="form-control" id="tempo_foto_slide" name="tempo_foto_slide" value="<?php echo$tempoFotoSlide;?>" required/>
				</div>
				<button type="submit" class="btn btn-primary">Atualizar</button>
			</form>
		</div>
		<div class="col-md-4 column">
		</div>
		<div class="col-md-4 column">
		</div>
	</div>
	<?php require_once('footer.php')?>