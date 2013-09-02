
		  	
		  	  <div class="benefits_wrapper" style="width:600px;"><!-- Start of benefits_wrapper -->
      
      			<span class="orange_title">Cadastra Parceiro</span>
      			
      			 <?php if($this->uri->segment(4)) {?>
      			 
      			 	<div style="clear:both;height:60px;"></div>
		      
			      	<h3 style="color:green">Cadastrado com sucesso</h3>
			      
			      <?php }?>
	      			
      		<div style="clear:both;height:60px;"></div>
      			 
        		Para acessar a página dos cursos confirme seu e-mail.
        	  </div><!-- End of benefits_wrapper -->
		     
      			<div style="clear:both;height:60px;"></div>
      		
		  		<form action="<?php echo base_url();?>parceiros/admin/add_bd" enctype="multipart/form-data"  method="post">
		  			
		  			<label>Nome</label>
		  			<br/>
		  			<input type="text" name="nome" value="" style="width:250px" />
		  			
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Título </label>
		  			<br/>
		  			<input type="text" name="titulo" value="" style="width:250px" />
		  			
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Descrição</label><br/>
		  			<textarea name="descricao" style="width:260px;height:250px;#E2DCD7"></textarea>
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			
		  			
		  			<label>Link</label><br/>
		  			<input type="text" name="link" value="" style="width:250px" />
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Imagem</label>
		  			<input type="file" name="userfile" value="" />
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<input type="submit" alt="" value="Cadastrar" />
		  		
		  		</form>
		  			
		  			
		  			
		  			
		  			
		  			
		  		
		  			
		  		
		  		
		  		
		  	