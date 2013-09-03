<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()?>assets/public/css/home/style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/public/js/jquery.cookie.js"></script>
<title>Hangout 8Ps</title>

<script type='text/javascript'>//<![CDATA[ 
		
			
					function valida(){
	

		 
		
		if(document.meuform.email.value == "" || document.meuform.email.value == undefined){
		    alert("O Campo E-mail é obrigatório ");
		    return false;
	  	}
	  	
	  	
	

	  else
	  {
	    return true;
	  }
}


			</script>
		
</head>

<body>
	
	<!-- analytics -->
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-43649450-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- end analytics -->


<!-- remarketing -->
<!-- Código do Google para tag de remarketing -->
<!--------------------------------------------------
As tags de remarketing não podem ser associadas a informações pessoais de identificação nem inseridas em páginas relacionadas a categorias de confidencialidade. Veja mais informações e instruções sobre como configurar a tag em: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 989334342;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/989334342/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- end remarketing -->



<script>
	
	
	
	
	
	
		
	
	
		var url = '<?php echo base_url();?>';
		<?php if(isset($_GET['ref'])) {?> var id_parceiro = '<?php echo $_GET['ref'];?>';<?php } else {?> var id_parceiro = 0; <?php } ?> 
		
		
		
		
		
		if(id_parceiro != ""){
			
		}else{
			
			var id_parceiro = 0;
		}
		
	
	 $.ajax({
		   type: "POST",
		   url: url+'cadastro/ajax/'+$('#awf_field-51175789').val()+'/'+id_parceiro,
		   data: "",
		   beforeSend: function(){
			 // $("#load_produtos_familia").show()
			
			   },
		   success: function(msg){
		   	
		 
			  $('#meuform').submit();
		   },
		   
		 });
			
		

	
		 


	
</script>
	
	<center>
	<div class="wrapper">
		<div class='box_fora'>
			
			<div class="box">
					
				<form method="post" class="af-form-wrapper" id="meuform" name="meuform" action="<?php echo base_url();?>funcao_video" onsubmit="return valida();"  >
					
					

					<div class="box_conteudo">
						<h1 class="titulo">Hangout: Tática da explosão de leads</h1>
						<div class="descricao">
							
							Aprenda gratuitamente com Conrado Adolpho como conseguir dezenas de milhares de fãs e leads (contatos interessados). 
Deixe seu email abaixo e se inscreva na palestra online que vai fazer suas vendas se multiplicarem muitas vezes.
						</div>
						
					</div>
					<div style="height:26px"></div>
					
					
					<input type='text' id="awf_field-51175789" type="text" name="email"  class="input" placeholder="Escreva seu e-mail" />
					
					<div style="height:26px"></div>
					
					<div style="cursor:pointer;padding-left: 0px"><input type="image" class="botao_ver_video" src="<?php echo base_url();?>assets/public/images/home/botao-veja-video.png" /></div>
					
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
