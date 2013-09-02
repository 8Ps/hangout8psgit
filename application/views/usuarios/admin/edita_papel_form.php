<div class="content-box-header">
					
					<h3>Editando Cargo</h3>
					
					
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
				
				<div>
				<!--=========Forms=========-->
						<form action="<?php echo base_url()?>usuarios/admin/edita_papel_bd/{papel_id}" name="frmpapel" method="post" onsubmit="return valida()">
							<fieldset>
								
									<p>
										<label>Nome:</label>
										<input name="nome" type="text" value="{papel_nome}" class="text-input medium-input" />
									</p>
										
								<h2>Cargo</h2>
								
								<div class="clear"></div>
								
								
									{modulos}
										<div style="float:left;width:150px;">	
											
											<label>{nome}</label>
											<input type="checkbox" name="modulos[]" {checked} value="{id_papel}" />
											
											
										</div>
									{/modulos}
								
								
								<div class="clear" style="height:25px"></div>
								
								
								<p>
									
									<input name="button2" type="submit" class="button" id="button2" value="Editar" />
									<input name="button" type="submit" class="button" id="button" value="Cancelar" />
									
								</p>
								
							</fieldset>
						</form>
			
				
					</div> <!-- End #tab2 -->     
					
			</div>
			