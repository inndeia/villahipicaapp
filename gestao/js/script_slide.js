
			$( document ).ready(function() {
				atualizarFotos();
				function atualizarFotos(){
					var teste='';
					$.ajax({
				    	method: "POST",
			            url: 'ajax/slideAjax.php', 
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
					           	header += '<a class="fancybox"  href="'+dados[i].standard_resolution+'"><img src="'+dados[i].thumbnail+'" alt="" /></a>';
				           		// header += '<input type="hidden" name="thumbnail" value="'+data.data[i].images.thumbnail.url+'"/>';
				           		// header += '<input type="hidden" name="standard_resolution" value="'+data.data[i].images.standard_resolution.url+'"/>';
				           		header += '</td>';
				           		header += '<td> <p>';
				           		for (y = 0; y < dados[i].tags.length; y++) {
				           			header += '#'+dados[i].tags[y]+' ';
				           			header += '<input type="hidden" name="tags[]" value="'+dados[i].tags[y]+'"/>';
				           		}
				           		header += '</p></td>';				           		
				           		header += '<td>';
				           		header += '<button class="btn btn-danger" id="btnRemover" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></button>';
				           		header += '</td>';
				           		header += '</tr>';
				           		
				           	}	
				           	
			                $('#fotos_slide').html(header);
		
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
					    		atualizarFotos();
					    	}	
						});
						
					}
				    
				});			
				
				$('#tbl2').on('click', '#btnRemover', function (event) {

				    var $botao = $(event.target);
				    var $tr = $botao.closest('tr');
				    var id = $tr.children("td:nth-child(1)");
					id = id.children("input[name=id]").val();
					
					console.log(id);
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
				
			});	
