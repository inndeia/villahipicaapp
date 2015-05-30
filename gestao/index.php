<?php require_once('header.php')?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<?php
								$alert = 'hidden';
								$resp = $_GET['msg'];
								switch ($resp) {
									case '1':
										$msg = 'Email inválido!';
										$alert = '';
										break;
									case '2':
										$msg = 'Senha inválida!';
										$alert = '';
										break;
									case '3':
										$msg = 'Erro ao conectar ao banco de dados!';
										$alert = '';
										break;
									case '5':
										$msg = 'Email ou senha inválido!';
										$alert = '';
										break;
									default:
										$msg = '';
										$alert = 'hidden';
										break;
								}
							?>
							<div class="alert alert-danger alert-dismissable <?php echo $alert;?>">
								 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>
									Error!
								</h4> <strong><?php echo $msg;?></strong>  
							</div>
				<div class="row clearfix">
					<div class="col-md-4 column">
					</div>
					<div class="col-md-4 column">
						<div class="caixa_login">							
							<div class="fundo_titulo">
								<h2>Painel Administrativo</h2>
							</div>							
							<form role="form" action="login.php" method="post">
								<div class="form-group">
									 <label for="email">Email</label><input type="email" class="form-control" name="email" id="email" required/>
								</div>
								<div class="form-group">
									 <label for="pass">Senha</label><input type="password" class="form-control" name="pass" id="pass" required/>
								</div>
								<button type="submit" class="btn btn-default">Entrar</button>
							</form>
						</div>
					</div>
					<div class="col-md-4 column">
					</div>
				</div>
			</div>
		</div>
	
<?php require_once('footer.php')?>