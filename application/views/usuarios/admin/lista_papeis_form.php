
	<div class="content-box-header">
					
					<h3>Listando Papeis de Usuários</h3>
					
					
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
				
				<div>
					
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Nome</th>
								 
								  
								   <th>Ações</th>
								   
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
									
									<!-- 
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										 -->
										<!-- 
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div>
										 -->
										<!-- End .pagination -->
										
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
							
							{papeis}
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>{nome}</td>
									
									
								
									<td>
										<!-- Icons -->
										 <a href="<?php echo base_url()?>usuarios/admin/editar_papel/{id}" title="Edit"><img src="<?php echo base_url()?>assets/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo base_url()?>usuarios/admin/deletar_papel/{id}" title="Delete"><img src="<?php echo base_url()?>assets/images/icons/cross.png" alt="Delete" /></a> 
										 <!-- <a href="<?php echo base_url()?>clientes/admin/deletar/{id}" title="Edit Meta"><img src="<?php echo base_url()?>assets/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
									</td>
								</tr>
								
							{/papeis}
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->			
					    
					
			</div>
			
			