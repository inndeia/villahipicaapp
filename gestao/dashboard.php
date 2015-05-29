<?php require_once('header.php')?>
<?php require_once('menu.php')?>
	<div class="row clearfix" style="margin-top:70px;">
		<div class="col-md-4 column">
			<div class="bem_vindo_user">
				<h4>Bem vindo, Fulano de tal</h4>
			</div>
		</div>
		<div class="col-md-4 column">
			<div class="div_ultima_atualizacao">
				<p>Ultima atualização</p>
			</div>
		</div>
		<div class="col-md-4 column">
			<div class="div_btn_atualizar">
				<p>Espere para nova atualização 00:04:59</p>
				<button class="btn btn-primary" id="btn" >Atualizar fotos</button>
			</div>
		</div>
	</div>
	<div class="row clearfix" >
		<div class="col-md-12 column">
			<h3 class="text-left">
				Fotos #hastag
			</h3>
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Fotos
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
		<nav id="pagination" >
		  <ul class="pager">
		    <li class="next"><a href="#" id="btnMais">Mais... <span aria-hidden="true">&rarr;</span></a></li>
		  </ul>
		</nav>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			 <a id="modal-191977" href="#modal-container-191977" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
			
			<div class="modal fade" id="modal-container-191977" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Modal title
							</h4>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>

<?php require_once('footer.php')?>