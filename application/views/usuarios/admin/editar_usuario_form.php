<script type="text/javascript">



	
	

	
	function valida(){
	
		
		 
		
		if(document.meuform.nome.value == ""){
		    alert("O Campo Nome é obrigatório ");
		    return false;
	  	}
	
		
	  	
	  	if(document.meuform.id_afiliado.value == ""){
		    alert("O campo id hotmart é obrigatório");
		    return false;
	  	}
	  	
	  	if(document.meuform.username.value == ""){
		    alert("O campo nome de usuário é obrigatório");
		    return false;
	  	}
	
	  else
	  {
	    return true;
	  }
}

		


	 

    
    



</script>
	<div class="content-box-header" style="margin-left:5%">
					
					<h3>Editando Usuário</h3>
					
					{usuario}
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content" style="margin-left:5%">
				
				<div>
					
						<form action="<?php echo base_url()?>usuarios/admin/edita_usuario_bd/{id}" enctype="multipart/form-data" name="meuform" id="meu_form" method="post" onsubmit="return valida()">
							
							<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Nome</label><br/>
										<input class="text-input small-input" type="text" id="nome" value="{nome}" name="nome" /> 
										<br />
								</p>
								
								
								
								<p>
									<label>E-mail</label><br/>
									<input class="text-input small-input datepicker" type="text" value="{email}" id="email" name="email" /> 
									<!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								<p>
									<label>Id Hotmart</label><br/>
										<input class="text-input small-input" type="text" id="nome" value="{id_afiliado}" name="id_afiliado" /> 
										<br />
								</p>
								
								
								<!--  endereço  -->
								
									<p>
										<label>Endereço</label><br/>
										<input class="text-input medium-input" type="text" id="endereco" value="{endereco}" name="endereco" />
									</p>
									
									
									
								
								
								
								
								<!--  end endereço  -->
								
								
								<div style="clear:both"></div>
							
								
								
							
								
									<p>
										<label>Telefone</label><br/>
										<input class="text-input medium-input" type="text" id="telefone" name="telefone" value="{telefone}" />
									</p>
									
								
						
								
								
								
								<div style="clear:both"></div>
								
							
								
								
							
								
									<p>
									<label>Papeis</label><br/>              
									<select name="papel" class="medium-input" id="papel">
										<option>Selecione um papel</option>
										{papel_selecionado}<option value="{id_papel_s}" SELECTED>{nome_papel_s}</option>{/papel_selecionado}
										{papeis}<option value="{id_papel_t}">{nome_papel}</option>{/papeis}
										
									</select> 
									
									<div style="clear:both"></div>
								
								
								
									<label>Nome de usuário</label><br/>
									<input class="text-input medium-input" type="text" id="username" value="{username}" name="username" />
									
									
									<div style="clear:both"></div>
								
								
								
									<label>Senha</label><br/>
									<input class="text-input medium-input" type="password" id="password" name="password" />
									</p>
								
								
								
								
								
							<input type="submit" value="Editar" />
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						{/usuario}
						
					</div> <!-- End #tab2 -->     
					
			</div>
			
			