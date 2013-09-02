<script type="text/javascript">



	
	

	
	function valida(){
	
		
		 
		
		if(document.meuform.nome.value == "" || document.meuform.nome.value == undefined){
		    alert("O Campo Nome é obrigatório ");
		    return false;
	  	}
	
		
	  	
	  	
	  	
	
	  else
	  {
	    return true;
	  }
}

		


	 

    
    



</script>
	<div class="content-box-header" style="margin-left:5%">
					
					<h3>Minha Conta</h3>
					
					{usuario}
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content" style="margin-left:5%">
				
				<div>
					
						<form action="<?php echo base_url()?>usuarios/minha_conta/edita_minha_conta_bd/{id}" enctype="multipart/form-data" name="meuform" id="meu_form" method="post" onsubmit="return valida()">
							
							<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									
										<input class="input_nome" type="text" id="nome" value="{nome}" name="nome" /> 
										<br />
								</p>
								
								
								
								<p>
									
									<input class="input_email" type="text" value="{email}" id="email" name="email" /> 
									<!-- <span class="input-notification error png_bg">Error message</span> -->
								</p>
								
								
								
									
								
								
								
								
						
								
								
							
								
								
									
									
									
									<div style="clear:both"></div>
								
								
								
									
									<input class="input_senha" type="password" id="password" name="password" />
									</p>
								
								
								
								
								
							<input type="image" src="<?php echo base_url();?>assets/public/images/membros/novo/botao-editar.jpg" style="width:141px;height:38px"  name="submit" >
							<div class="clear"></div><!-- End .clear -->
							<br/><br/>
							Dados de acesso ao ninja:<br/>
							<a href=" http://ninjappc.com.br/" target="_blank">www.ninjappc.com.br</a><br/>
							usuario: afiliado8ps<br/>
							senha: lancamento8ps<br/>
							<br/>
							
							
						</form>
						{/usuario}
						
					</div> <!-- End #tab2 -->     
					
			</div>
			
			