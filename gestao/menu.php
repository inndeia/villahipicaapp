<?php 
session_start(); 
if((!isset ($_SESSION['UserID']) == true) and (!isset ($_SESSION['UserNome']) == true)) { 
	unset($_SESSION['UserID']); 
	unset($_SESSION['UserNome']); 
	unset($_SESSION['UserTipo']);
	header('location:index.php'); 
}
$nome = $_SESSION['UserNome'];
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="dashboard.php"><img src="img/logo_inndeia.png" /></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<?php if($_SESSION['UserTipo'] == 1){?>
						<li>
							<a href="user.php">Usuários</a>
						</li>
						<?php }?>
						<?php if($_SESSION['UserTipo'] == 1){?>
						<li>
							<a href="config.php">Configurações</a>
						</li>
						<?php }?>
						<li>
							<a href="dashboard.php">Fotos Instagram</a>
						</li>
						<li>
							<a href="slide.php">Fotos Slide</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
						</li>
					</ul>
				</div>				
					
			</nav>
		</div>
	</div>