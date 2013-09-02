
<script type="text/javascript">
<!--

	

function valida(){

	 	
	if(document.frmusuario.nome.value == ""){
	    alert("O Campo Nome é obrigatório ");
	    return false;
  	}

 

  else
  {
    return true;
  }
}

//-->
</script>
		
		<!--=========Add Usuário=========-->
		<div  class="box expose">
			<!-- A box with class of expose will call expose plugin automatically -->
			<div class="header">
				Editando Usuário
			</div>
			<div class="body">

			
				{usuario}
				<!--=========Forms=========-->
						<form action="<?=base_url()?>usuarios/admin/edita_minha_conta_bd/{id}" name="frmusuario" method="post" onsubmit="return valida()">
							<fieldset>
								<legend>Conteúdo</legend>
								
								<div class="box_left_form">
									<p>
										<label>Nome:</label>
										<input name="nome" type="text" value="{nome}" class="textfield med" />
										<small>Nome do usuário</small></p>
									<p>
								</p>
								</div>
								
								
								<div class="box_left_form">
									<p>
										<label>Sobrenome:</label>
										<input name="sobrenome" type="text" value="{sobrenome}" class="textfield med" />
										
									<p>
								</div>
								
								<div class="clear"></div>
								
								<p>
									<label>E-mail:</label>
									<input name="email" type="text" value="{email}" class="textfield " style="width:480px;" />
									<small>Título da notícia</small></p>
								
								<div class="clear"></div>
								
								<div class="box_left_form">
									<p>
										<label>Telefone:</label>
										<input name="telefone" type="text" value="{telefone}" class="textfield med" />
										<small>Com DDD</small></p>
									<p>
								</p>
								</div>
								
								
								<div class="box_left_form">
									<p>
										<label>Celular:</label>
										<input name="celular" type="text" value="{celular}" class="textfield med" />
										
									<p>
								</div>
								
								<div class="clear"></div>
								
								
									<p>
										<label>Endereço:</label>
										<input name="endereco" type="text" value="{endereco}" class="textfield " style="width:480px;" />
										<small>Endereço</small>
									
									</p>
									
								<div class="clear"></div>
									
								<div class="box_left_form">
									
									<p>
										<label>Cidade:</label>
										<input name="cidade" type="text" value="{cidade}" class="textfield " style="width:220px;" />
									
									
									</p>
									
								</div>
								
								<div class="box_left_form">
									
									<label>Estado</label>
									<select name="estado" id="select">
										
										{estado_selecionado}<option SELECTED>{estado}</option>{/estado_selecionado}
										<option>AC</option>
								        <option>AL</option>
								        <option>AM</option>
								        <option>BA</option>
								        <option>CE</option>
								        <option>DF</option>
								        <option>ES</option>
								        <option>GO</option>
								        <option>MA</option>
								        <option>MG</option>
								        <option>MS</option>
								        <option>MT</option>
								        <option>PA</option>
								        <option>PB</option>
								        <option>PE</option>
								        <option>PI</option>
								        <option>PR</option>
								        <option>RJ</option>
								        <option>RN</option>
								        <option>RO</option>
								        <option>RR</option>
								        <option>RS</option>
								        <option>SC</option>
								        <option>SE</option>
								        <option>SP</option>
								        <option>TO</option>

									
									
									</select>
								
								</div>
								
							
								<div class="clear"></div>
								
								
								<div class="box_left_form">
									
									<p>
										<label>Nova Senha:</label>
										<input name="senha" type="text" class="textfield " style="width:480px;" />
									
									
									</p>
									
								</div>
								
								<div class="clear"></div>
								
								
								<div class="box_left_form">
									
									<p>
										<label>Confirmar Senha:</label>
										<input name="senha2" type="text" class="textfield " style="width:480px;" />
									
									
									</p>
									
								</div>
								
								<div class="clear"></div>
								
								
								
								<p>
									
									<input name="button2" type="submit" class="button2" id="button2" value="Editar" />
									<input name="button" type="submit" class="button" id="button" value="Cancelar" />
									
								</p>
								
							</fieldset>
						</form>
			{/usuario}
				
				
			</div>
		</div>
		<!--End painel inicial-->