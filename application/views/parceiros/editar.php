
		  	
		  	  <div class="benefits_wrapper" style="width:600px;"><!-- Start of benefits_wrapper -->
      
      			<span class="orange_title">Cadastra Parceiro</span>
      			
      			 <?php if($this->uri->segment(5)) {?>
      			 
      			 	<div style="clear:both;height:60px;"></div>
		      
			      	<h3 style="color:green">Editado com sucesso</h3>
			      
			      <?php }?>
	      			
      		<div style="clear:both;height:60px;"></div>
      			 
        		Para acessar a página dos cursos confirme seu e-mail.
        	  </div><!-- End of benefits_wrapper -->
		     
      			<div style="clear:both;height:60px;"></div>
      			
      			{parceiro}
		  		<form action="<?php echo base_url();?>parceiros/admin/editar_bd/{id}" enctype="multipart/form-data"  method="post">
		  			
		  			<label>Nome</label>
		  			<br/>
		  			<input type="text" name="nome" value="{nome}" style="width:250px" />
		  			
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Título </label>
		  			<br/>
		  			<input type="text" name="titulo" value="{titulo}" style="width:250px" />
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Link</label><br/>
		  			<input type="text" name="link" value="{link}" style="width:250px" />
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Descrição</label><br/>
		  			<textarea name="descricao" style="width:260px;height:250px;#E2DCD7">{descricao}</textarea>
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<label>Imagem</label>
		  			<input type="file" name="userfile" value="" />
		  			<img src="<?php echo base_url()?>uploads/imagens/{img}" alt="" />
		  			
		  			<div style="clear:both;height:20px;"></div>
		  			
		  			<input type="submit" alt="" value="Cadastrar" />
		  		
		  		</form>
		  			
		  			{/parceiro}
		  			
		  			
		  			
		  			
		  			
		  		
		  			
		  		
		  		
		  		
		  	