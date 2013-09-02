<script type="text/javascript">



	
	

	
	function valida(){
	
	
		 
		
		if(document.meuform.nome.value == "" || document.meuform.nome.value == undefined){
		    alert("O Campo Nome é obrigatório ");
		    return false;
	  	}
	
		if(document.meuform.password.value == "" ||  document.meuform.password.value == undefined){
		    alert("O campo senha é obrigatório -_-");
		    return false;
	  	}
	  	
	  	if(document.meuform.id_afiliado.value == "" || document.meuform.id_afiliado.value == undefined){
		    alert("O campo id hotmart é obrigatório");
		    return false;
	  	}
	  	
	  	if(document.meuform.username.value == "" || document.meuform.username.value == undefined){
		    alert("O campo nome de usuário é obrigatório");
		    return false;
	  	}
	  	
	  	if(document.meuform.papel.value == ""  || document.meuform.papel.value == 0){
		    alert("O campo papel é obrigatório");
		    return false;
	  	}
	
	  else
	  {
	    return true;
	  }
}

	



</script>
	<div class="content-box-header">
					
					<h3>Cadastrando Usuário</h3>
					
					
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
				
				<div>
					
						<form action="<?php echo base_url()?>usuarios/admin/add_usuario_bd" enctype="multipart/form-data" name="meuform" id="meu_form" method="post" onsubmit="return valida()">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Nome</label>
										<input class="text-input small-input" type="text" id="nome" name="nome" /> 
										<br />
								</p>
								
								
								
								<p>
									<label>E-mail</label>
									<input class="text-input small-input datepicker" type="text" id="email" name="email" /> 
									<!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								
								<p>
									<label>ID afiliado (id do hotmart)</label>
										<input class="text-input small-input" type="text" id="id_afiliado" name="id_afiliado" /> 
										<br />
								</p>
								
								
							
								
								
								</fieldset>
								
								<!--  endereço  -->
								<fieldset class="column-left">
									<p>
										<label>Endereço</label>
										<input class="text-input medium-input" type="text" id="endereco" name="endereco" />
									</p>
									
									
								
								
								</fieldset>
								
								
							
								
								<!--  end endereço  -->
								
								
								<div style="clear:both"></div>
							
								
								
								<fieldset class="column-left">
								
									<p>
										<label>Telefone</label>
										<input class="text-input medium-input" type="text" id="telefone" name="telefone" />
									</p>
									
								
								</fieldset>
								
								
								
								<div style="clear:both"></div>
								
								<fieldset>
								
								
								
								</fieldset>
								
								<fieldset>
								
								
									<p>
									<label>Papeis</label>              
									<select name="papel" class="medium-input" id="papel">
										<option value='0' SELECTED>Selecione um papel</option>
										{papeis}<option value="{id}">{nome}</option>{/papeis}
										
									</select> 
								
								
										
								
									
									</div>
									<fieldset>
									
									
										<label>Nome de usuário</label>
										<input class="text-input medium-input" type="text" id="username" name="username" />
										</p>
									
									</fieldset>
									
									
									<fieldset>
									
									
										<label>Senha</label>
										<input class="text-input medium-input" type="password" id="password" name="password" />
										</p>
									
									</fieldset>
								
								
								
								
								
							<input type="submit" value="Cadastrar" />
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
			</div>

			