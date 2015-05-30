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
<script type="text/javascript" src="js/script_dashboard.js"></script>
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
			<div class="div_btn_atualizar">
				<p><span id="sessao"></span></p>
				<button class="btn btn-primary" id="btn" >Atualizar fotos</button>
			</div>
		</div>
	</div>
	<div class="row clearfix" >
		<div class="col-md-12 column">
			<h3 class="text-left">
				Fotos #hastag
			</h3>
			<table class="table table-striped table-hover table-condensed" id="tbl">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Fotos
						</th>
						<th>
							#hastags
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody id="fotos_instagram">
	
				</tbody>
			</table>
		</div>
	</div>

<?php require_once('footer.php')?>