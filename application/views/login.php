
        	<div class="clear" style="height:50px;"></div>
        	
        	<div class="form_login">
	        		<form action="<?php echo base_url();?>login_public/validate_credentials" method="post" class="form_padrao">
	
						<img src="<?php echo base_url();?>assets/public/images/membros/novo/form-label-login.png" alt="" />
						<div class="clear_form" style="height:5px;clear:both"></div>
						<input type="text" name="username" class="input_login" >
						
						<div class="clear_form" style="height:15px;clear:both"></div>
		
						<img src="<?php echo base_url();?>assets/public/images/membros/novo/form-label-senha.png" alt="" />
						<div class="clear_form" style="height:5px"></div>
						<input type="password" name="password" class="input_login"  >
		
					
						
						<div class="clear_form" style="height:15px"></div>
						<input type="image" src="<?php echo base_url();?>assets/public/images/membros/novo/login-button.png" value="Login"  name="submit"  style="width:157px;height:43px; margin-left:90px;">
						
						<br/><br/>
						
						{message}
						
						<br/>
						
						Se você esqueceu sua senha <a href="<?php echo base_url();?>login_public/recuperar_senha">Clique aqui</a>.
	
				</form>
			</div>
			
			    	<div class="clear" style="height:50px;"></div>
        		
        	
		  			
		  			
