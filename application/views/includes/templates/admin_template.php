<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script type="text/javascript" src="http://jquery-limit.googlecode.com/files/jquery.limit-1.2.source.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/public/scripts/jquery.validate.js" ></script>
		

<link href="<?php echo base_url()?>assets/public/css/membros/style.css" rel="stylesheet" type="text/css" />

</head>


<body class="{pagina}">
	
	<div class="wrapper">
		
		<div class="header">
			
			<div style="margin-left:250px; padding-top:60px">
				
				<?php if($this->session->userdata('is_logged_in')){?>
					
					<a href="<?php echo base_url();?>membros/"><img src="<?php echo base_url();?>assets/public/images/membros/novo/botao-entrar-topo.jpg" style="float:left;"  /></a>	
					<a href="<?php echo base_url();?>usuarios/minha_conta"><img src="<?php echo base_url();?>assets/public/images/membros/novo/meus-dados-botao.jpg" style="float:left;"  /></a>	
					<a href="<?php echo base_url();?>logout" class="branco" style="float:left;margin-left:25px;margin-top:15px">Sair</a>
					
				<?php } ?>
			</div>
			
			<!--<img src="<?php echo base_url();?>assets/public/images/membros/logo-topo.png" class="logo" />-->
			
		</div>
		
		<div class="content">
		 	
		 	<?php $this->load->view($main_content);?><br />
		 	
		 	<div style="clear:both;height:0px"></div>
		 
		 </div>
		 
		 
		<div class="footer">
			
		
			
			
		</div>
	
	</div>
	
	
</body>
</html>

		  	 
		  			
		  			
		  			
		  		
		  			
		  		
		  		
		  	