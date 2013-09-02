
<script type="text/javascript">
<!--



function valida(){


	if(document.frmpapel.nome.value == ""){
	    alert("O Campo nome é obrigatório ");
	    return false;
  	}



  else
  {
    return true;
  }
}

//-->
</script>

		<!--=========Add papel Usuário=========-->
		<div  class="box expose">
			<!-- A box with class of expose will call expose plugin automatically -->
			<div class="header">
				Busca Usuário
			</div>
			<div class="body">



				<!--=========Forms=========-->
						<form action="<?php echo base_url()?>usuarios/busca" name="frmpapel" method="post" onsubmit="return valida()">

							E-mail <input type="text" name="email" />
							<input type="hidden" name="action" value="ok"/>

							<input type="submit" value="buscar" />
						</form>



			</div>
		</div>
		<!--End painel inicial-->