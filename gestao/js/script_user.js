
			$( document ).ready(function() {
				atualizarUsers();
				function atualizarUsers(){
					var teste='';
					$.ajax({
				    	method: "POST",
			            url: 'ajax/userAjax.php', 
			            async: false,   		    	
				    	success: function(data){
				    		var dados = JSON.parse(data);
				           	var header = '';
				           	for (i = 0; i < dados.length; i++) { 
				           		
					           	header += '<tr>';
					           	header += '<td>';
				           		header += (i +1);
				           		header += '<input type="hidden" name="id" value="'+dados[i].id+'"/>';
				           		header += '</td>';
					           	header += '<td>';
					           	header += dados[i].nome;
				           		// header += '<input type="hidden" name="thumbnail" value="'+data.data[i].images.thumbnail.url+'"/>';
				           		// header += '<input type="hidden" name="standard_resolution" value="'+data.data[i].images.standard_resolution.url+'"/>';
				           		header += '</td>';
				           		header += '<td>';
				           		header += dados[i].email;
				           		header += '</td>';	
				           		header += '<td>';
				           		header += (dados[i].tipo == 1?'Admin':'Gestão');
				           		header += '</td>';
				           		header += '<td>';
				           		header += '<a class="btn btn-primary" id="btnEdit" style="margin-right:5px;" href="#modal-Editar" role="button" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>';
				           		header += '<button class="btn btn-danger" id="btnRemoverUser" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></button>';
				           		header += '</td>';
				           		header += '</tr>';
				           		
				           	}	
				           	
			                $('#usuarios').html(header);
		
				    	}	
					});
				}
				$("#btn2").click(function(){
					if(confirm('Tem certeza que deseja remover todos?')){
						$.ajax({
					    	method: 'POST',
				            url: 'ajax/slideRemoverTodasAjax.php', 
				            dataType: "json",
					    	success: function(data){
					    		atualizarUsers();
					    	}	
						});
						
					}
				    
				});	
				$("#btnCadastrar").click(function(){
					var dados = [$('#nome'),$('#email'),$('#pass'),$('#tipo')];
					if(validarDados(dados)){
						console.log('entrou0');
						$.ajax({
					    	method: 'POST',
				            url: 'ajax/userCadastrarAjax.php', 
				            dataType: "json",
				            data:{nome:dados[0].val(),
				            	  email:dados[1].val(),
				            	  pass:dados[2].val(),
				            	  tipo:dados[3].val(),},
					    	success: function(data){
					    		if(data.success){
						    		$('#modal-cadastrar').modal('hide');
						    		$('#form_cadastro').each (function(){
						    			  this.reset();
						    			  this.parent().removeClass('has-error');
						    		});
						    		$('#msg').html('');
						    		alert('Cadastrado com sucesso!');
						    		atualizarUsers();
					    		}else{
					    			$('#email').parent().addClass('has-error');
					    			$('#msg').html('Email já cadastrado!');
					    		}
					    	}	
						});
					}					
				    
				});
				$('#cancel_cadastro').click(function(){
					$('#modal-cadastrar').modal('hide');
					$('#form_cadastro').each (function(){
		    			  this.reset();
		    		});
					$('#nome').parent().removeClass('has-error');
					$('#email').parent().removeClass('has-error');
					$('#pass').parent().removeClass('has-error');
					$('#tipo').parent().removeClass('has-error');
					$('#msg').html('');
				});
				
				$('#tbl2').on('click', '#btnRemover', function (event) {

				    var $botao = $(event.target);
				    var $tr = $botao.closest('tr');
				    var id = $tr.children("td:nth-child(1)");
					id = id.children("input[name=id]").val();
				    $.ajax({                 
				    	type: 'POST',                 
				    	dataType: 'json',                 
				    	url: 'ajax/slideRemoverAjax.php',            
				    	data: {id:id},                 
				    	success: function(response) {
				    	  $tr.remove();
				    	  atualizarFotos();
				    	}
				    });

				});
				function validarDados(dados){
					var retorno = true;
					for(i = 0; i< dados.length;i++){
						if(dados[i].val() == ""){
							dados[i].parent().addClass('has-error');
							retorno  = false;
						} 
					}
					if(retorno === false){
						$('#msg').html('Preencha o/os campo/campos marcados!');
					}
					return retorno;
				}
				
			});	