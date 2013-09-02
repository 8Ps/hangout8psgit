
		  	
		  	  <div class="benefits_wrapper" style="width:600px;"><!-- Start of benefits_wrapper -->
      
      			<span class="orange_title">Editando Parceiro</span>
      			
      			 <?php if($this->uri->segment(4)) {?>
      			 
      			 	<div style="clear:both;height:60px;"></div>
		      
			      	<h3 style="color:green">Cadastrado com sucesso</h3>
			      
			      <?php }?>
	      			
      		<div style="clear:both;height:60px;"></div>
      			 
        		texto
        	  </div><!-- End of benefits_wrapper -->
		     
      			<div style="clear:both;height:60px;"></div>
      		
		  		
		  		
		  		
		  			<table border="1">
		  				
		  				<tr>
		  					<td style="width:120px">Nome</td>
		  					<td>Cliques</td>
		  				</tr>
		  				
		  				{parceiros}
		  			
		  				<tr>
		  				
		  					<td><a href="<?php echo base_url()?>parceiros/admin/editar/{id}">{nome}</a></td>
		  					<td></td>
		  					
		  				</tr>
		  				
		  				{/parceiros}
		  			
		  			
		  			
		  			</table>
		  		
		  			
		  			
		  			
		  			
		  			
		  			
		  		
		  			
		  		
		  		
		  		
		  	