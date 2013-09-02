<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>assets/public/css/home/style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/public/js/jquery.cookie.js"></script>
<title>8Ps</title>

<meta property="og:title" content="Curso Express Gratuito do Método 8Ps - Aumente os lucros e o faturamento da sua empresa."/>
  <meta property="og:type" content="article"/>
  <meta property="og:image" content="http://8ps.com/curso8ps/assets/public/images/imagem-face.png"/>
  <meta property="og:site_name" content="Método 8Ps"/>
  <meta property="fb:app_id" content="621624621196111">
  <meta property="og:description" content="Descubra como alavancar os resultados da sua empresa e da sua carreira utilizando a internet como sua principal ferramenta de vendas para aumento de faturamento e de rentabilidade."/>
 <meta property="og:url" content="http://www.8ps.com/curso8ps/" />
</head>

<body>
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42790332-1', '8ps.com');
  ga('send', 'pageview');

</script>


<script>
	
	function disableEnterKey(e)
{
     var key;

     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox

     if(key == 13)
          return false;
     else
          return true;
}
	
	
	function verificacao(){
	
		 
		if(document.meuform.email.value == "" || document.meuform.email.value == undefined){
		    alert("O Campo E-mail é obrigatório ");
		    return false;
	  	}
	
		
	// seta o email pra verificao do lead
	 $.cookie("email_lead_ver", $('#awf_field-51175789').val(), {expires: new Date(2013, 10, 29, 11, 00, 00), secure: false});

		
	
		var url = '<?php echo base_url();?>';
		<?php if(isset($_GET['ref'])) {?> var id_parceiro = '<?php echo $_GET['ref'];?>';<?php } else {?> var id_parceiro = 0; <?php } ?> 
		var id_squeeze  = '<?php echo $page[0]['id'];?>';
		
		
		
		
		if(id_parceiro != ""){
			
		}else{
			
			var id_parceiro = 0;
		}
		
	
	 $.ajax({
		   type: "POST",
		   url: url+'cadastro/ajax/'+$('#awf_field-51175789').val()+'/'+id_parceiro+'/'+id_squeeze,
		   data: "",
		   beforeSend: function(){
			 // $("#load_produtos_familia").show()
			
			   },
		   success: function(msg){
		   	
		 
			  $('#meuform').submit();
		   },
		   
		 });
			
		

	
		 

}
	
</script>
	<?php 	
	
		if($this->session->userdata('papel') == 1){ ?>
			
			<div style="background:white; width:200px; height:100px;">
				
				<?php echo $page[0]['nome']; ?>
				{afiliado} {nome}{/afiliado}
				
			</div>
			
			 <?php

		}
	
	
	?>
	<center>
	<div class="wrapper">
		<div class='box_fora'>
			
			<div class="box">
					
				<form method="post" class="af-form-wrapper" id="meuform" name="meuform" action="<?php echo base_url();?>funcao_video"  >
					
					

					<div class="box_conteudo">
						<h1 class="titulo">COMO GERAR 1.000 POTENCIAIS CLIENTES COM APENAS R$ 490?</h1>
						<div class="descricao">
							
							Conrado Adolpho, uma das maiores autoridades do Marketing no Brasil, ensinará para você duas técnicas poderosas que irão fazer você gerar 1.000 novos contatos com apenas R$ 490. Não perca este Hangout que fará você faturar mais com muito menos!
						</div>
						
					</div>
					<div style="height:26px"></div>
					
					
					<input type='text' id="awf_field-51175789" type="text" name="email"  onKeyPress="return disableEnterKey(event)" class="input" placeholder="Escreva seu e-mail" />
					
					<div style="height:26px"></div>
					
					<div style="cursor:pointer;padding-left: 0px"><img class="botao_ver_video" src="<?php echo base_url();?>assets/public/images/home/botao-veja-video.png" onclick="return verificacao();" /></div>
					
					<div style="height:26px"></div>
					
					<!--<span class="descricao_footer">Your contact information is secure and will never be shared, rented or sold. We hate spam and just want you to see our video and newsletters, which you’ll receive when you optin. View our Terms, Disclaimers and Privacy Policy. Copyright 2013 The Burchard Group. All rights reserved.</span>-->
					
					<div style="height:6px"></div>
					
					
					
						
				</form>
				
				
				
			
			
			
			</div>
			
			<!--<div class="footer_fundo"></div>-->
		</div>
		
		
			
	</div>
	</center>
</body>

</html>
