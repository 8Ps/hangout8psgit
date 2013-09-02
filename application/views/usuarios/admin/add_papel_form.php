
<script type="text/javascript">
<!--

	

function valida(){

	 	
	if(document.frmpapel.nome.value == ""){
	    alert("O Campo nome é obrigatório ");
	    return false;
  	}

	

  else
  {
    return true;
  }
}

//-->
</script>
		
		<!--=========Add papel Usuário=========-->
		<div  class="box expose">
			<!-- A box with class of expose will call expose plugin automatically -->
			<div class="header">
				Criando Cargo Usuário
			</div>
			<div class="body">

			
				
				<!--=========Forms=========-->
						<form action="<?=base_url()?>usuarios/admin/add_papel_bd" name="frmpapel" method="post" onsubmit="return valida()">
							<fieldset>
								<legend>Conteúdo</legend>
								
								
										
									<p>
										<label>Nome:</label>
										<input name="nome" type="text" class="textfield med" />
									</p>
										
								<h2>Módulos</h2>
								
								<div class="clear"></div>
								
								
									{modulos}
										<div style="float:left;width:150px;">		
										
											<label>{titulo}</label>
											<input type="checkbox" name="modulos[]" value="{id}" />
											
										</div>
									{/modulos}
								
								
								<div class="clear" style="height:25px"></div>
								
								
								<p>
									
									<input name="button2" type="submit" class="button2" id="button2" value="Cadastrar" />
									<input name="button" type="submit" class="button" id="button" value="Cancelar" />
									
								</p>
								
							</fieldset>
						</form>
			
				
				
			</div>
		</div>
		<!--End painel inicial-->