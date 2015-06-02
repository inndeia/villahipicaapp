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
<script type="text/javascript" src="js/script_user.js"></script>
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
			<a href="#modal-cadastrar" role="button" class="btn btn-success" data-toggle="modal">Novo Usuário</a>
		</div>
	</div>
	<div class="row clearfix" >
		<div class="col-md-12 column">
			<h3 class="text-left">
				Usuários
			</h3>
			<table class="table table-striped table-hover table-condensed" id="tbl3">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Nome
						</th>
						<th>
							Email
						</th>
						<th>
							Tipo
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody id="usuarios">
	
				</tbody>
			</table>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			 
			<div class="modal fade" id="modal-cadastrar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" id="cancel_cadastro" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Cadastro de Usuário
							</h4>
						</div>
						<div class="modal-body">
							<div class="row clearfix">
								<div class="col-md-12 column">
									<form role="form" id="form_cadastro">
										<div class="form-group">
											 <label for="nome">Nome*</label><input type="text" class="form-control" id="nome" name="nome" required/>
										</div>
										<div class="form-group">
											 <label for="email">Email*</label><input type="email" class="form-control" id="email" name="email" required/>
										</div>
										<div class="form-group">
											 <label for="pass">Senha*</label><input type="password" class="form-control" id="pass" name="pass" required/>
										</div>
										<div class="form-group">
											 <label for="pass">Tipo*</label>
											 <select name="tipo" id="tipo" required class="form-control">
											 	<option value="">Selecione...</option>
											 	<option value="1">Admin</option>
											 	<option value="2">Gestão</option>
											 </select>
										</div>
									</form>
								</div>
							</div>
							<span id="msg"></span>
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default"  id="cancel_cadastro2">Cancelar</button> <button type="button" class="btn btn-primary" id="btnCadastrar">Cadastar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row clearfix">
		<div class="col-md-12 column">
			 
			<div class="modal fade" id="modal-Editar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Editar de Usuário
							</h4>
						</div>
						<div class="modal-body">
							<div class="row clearfix">
								<div class="col-md-12 column">
									<form role="form" id="form_editar">
										<div class="form-group">
											 <label for="nome">Nome</label><input type="text" class="form-control" id="nome_edit" name="nome" />
											 <input type="hidden" class="form-control" id="id_edit" name="id_edit" />
										</div>
										<div class="form-group">
											 <label for="email">Email</label><input type="email" class="form-control" id="email_edit" name="email" />
										</div>
										<div class="form-group">
											 <label for="pass">Senha</label><input type="password" class="form-control" id="pass_edit" name="pass" />
										</div>
										<div class="form-group">
											 <label for="tipo">Tipo</label>
											 <select name="tipo_edit" id="tipo_edit" required class="form-control">
											 	<option value="">Selecione...</option>
											 	<option value="1">Admin</option>
											 	<option value="2">Gestão</option>
											 </select>
										</div>
									</form>
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> <button type="button" class="btn btn-primary" id="btnAlterar">Alterar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>			
<?php require_once('footer.php')?>