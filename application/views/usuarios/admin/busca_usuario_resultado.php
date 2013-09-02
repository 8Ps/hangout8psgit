
	<script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/scripts/DataTables/media/js/jquery.dataTables.js"></script>

	<script type="text/javascript">



	$(document).ready(function() {
    $('#usuarios2').dataTable({

    	 "aaSorting": [[ 2, "asc" ]],
    	 "oLanguage": {

    		    "sProcessing":   "Processando...",
    		    "sLengthMenu":   "Mostrar _MENU_ registros",
    		    "sZeroRecords":  "Não foram encontrados resultados",
    		    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    		    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
    		    "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
    		    "sInfoPostFix":  "",
    		    "sSearch":       "Buscar:",
    		    "sUrl":          "",
    		    "oPaginate": {
    		        "sFirst":    "Primeiro",
    		        "sPrevious": "Anterior",
    		        "sNext":     "Seguinte",
    		        "sLast":     "Último"
    		    }
 		}



     });
} );


</script>
	<div class="content-box-header">

					<h3>Listando Usuarios</h3>



					<div class="clear"></div>

		</div> <!-- End .content-box-header -->

		<div class="content-box-content">

				<div>

				Filtrar usuários por:<br/>
				<a href="<?php echo base_url()?>usuarios/admin/lista_usuario/status/free">FREE</a> <br/>
			    <a href="<?php echo base_url()?>usuarios/admin/lista_usuario/status/premium">Premium</a><br/>
			    <a href="<?php echo base_url()?>usuarios/admin/lista_usuario/status/trial">8ps</a>

						<table id="usuarios2">

							<thead>
								<tr>

								   <th>Nome</th>
								   <th>E-mail</th>

								   <th>Financeiro / transações</th>

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

							<!-- <a href="#">Mostrar Somente Alunos</a><br/><br/> -->

							{usuarios}

								<tr>

									<td>{nome}</td>
									<td>{email}</td>

									<td><a href="<?php echo base_url()?>usuarios/admin/financeiro/{id}" title="title">Financeiro</a></td>


									<td>
										<!-- Icons -->
										 <a href="<?php echo base_url()?>usuarios/admin/editar_usuario/{id_usuario}" title="Edit"><img src="<?php echo base_url()?>assets/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo base_url()?>usuarios/admin/deletar_usuario/{id_usuario}" title="Delete"><img src="<?php echo base_url()?>assets/images/icons/cross.png" alt="Delete" /></a>
										 <!-- <a href="<?php echo base_url()?>clientes/admin/deletar/{id}" title="Edit Meta"><img src="<?php echo base_url()?>assets/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
									</td>
								</tr>

							{/usuarios}

							</tbody>

						</table>

					</div> <!-- End #tab1 -->


			</div>

