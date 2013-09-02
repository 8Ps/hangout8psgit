
	<div class="content-box-header">
					
					<h3>Editando Transação</h3>
					
					{transacao}
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
				
				<div>
					
						<form action="<?php echo base_url()?>usuarios/admin/edita_transacao_bd/{id}" enctype="multipart/form-data" id="meu_form" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<?php echo $transacao[0]['status'] ; ?>
								<p>
									<label>Status</label>
									<select name="status">
										
										<?php if($transacao[0]['status'] == 'cadastro') {?><option selected value='cadastro'>Cadastrado</option><?php } else { ?><option  value='cadastrado'>Cadastrado </option> <?php  }?>
										<?php if($transacao[0]['status'] == 'pago') {?><option selected value='pago'>Pago</option><?php } else { ?><option  value='pago'>Pago</option> <?php  }?>
										<?php if($transacao[0]['status'] == 'iniciado') {?><option selected value='iniciado'>Iniciado</option><?php } else { ?><option  value='iniciado'>Iniciado</option> <?php  }?>
										<?php if($transacao[0]['status'] == 'aguardando_pagamento') {?><option selected value='aguardando_pagamento'>Aguardando Pagamento</option><?php } else { ?><option  value='aguardando_pagamento'>Aguardando Pagamento</option> <?php  }?>
										<?php if($transacao[0]['status'] == 'expirado') {?><option selected value='expirado'>Expirado</option><?php } else { ?><option  value='expirado'>Expirado</option> <?php  }?>
									
									</select>
									
								</p>
								
								
								
								<p>
									<label>Pacote</label>
									<select name="pacote">
										
										{pacote_atual}<option SELECTED value="{id_pac_at}">{nome_pac_at}</option>{/pacote_atual}
										{pacotes}<option  value="{id_pacote}">{nome_pacote}</option>{/pacotes}
									
									</select>
									
								</p>
								
								
								
									<p>
									<label>Data Pagamento</label>
									<input type="text" name="data_pagamento" id="data_pagamento" value="{data_pagamento}" />
									
								</p>
								
								
								<p>
									<label>Data Cadastro</label>
									<input type="text" name="data" id="data" value="{data}" />
									
								</p>
								
								
								</fieldset>
								
								
								
								
								
								
							<input type="submit" value="Editar" />
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						{/transacao}
						
					</div> <!-- End #tab2 -->     
					
			</div>
					<script>

		
			$("#data_pagamento").datepicker({ dateFormat: "dd/mm/yy" });
			$("#data").datepicker({ dateFormat: "dd/mm/yy" });
			
			</script>
			
			
			