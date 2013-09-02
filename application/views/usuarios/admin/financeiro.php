
	<div class="content-box-header">
					
					<h3>Listando Histório Financeiro</h3>
					
					
					
					<div class="clear"></div>
					
		</div> <!-- End .content-box-header -->
		
		<div class="content-box-content">
				
				<div>
					{usuario}
					
						<h3>Financeiro do cliente: {nome}</h3>
					{/usuario}
						
					<h3>Histórico:</h3><br/>
					{pagamentos}
						
						<strong>Tempo de pagamento em dias</strong> {tempo_pagamento_dias}<br/>
						<strong>Data do pagamento: </strong>{data_pagamento}<br/>
						<strong>Status : {status} </strong><br/>
						<strong>Id da Transação </strong>:{id_transacao}<br/>
						
						<strong>Pacote:{nome_pacote}</strong>
						<hr />
						
						<a href="<?php echo base_url();?>usuarios/admin/editar_transacao/{pag_id}">Editar esta transação</a>
						
						
						
					{/pagamentos}		
						
				
						
				</div> 			
					    
					
			</div>
			
			