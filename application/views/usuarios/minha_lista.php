<div id="breadcrumb">

<h1 class="text">Minha lista de desejos</h1><br/>
{produtos}

<a href="<?php echo base_url()?>produtos/view/{uri}/{id}.html">{nome_pt}</a> - <a href="<?php echo base_url()?>usuarios/minha_lista/deleta_produto_lista/{id}" style="color:red;">Excluir</a><br/>


{/produtos}

<div class="none" style="{sem_produtos}">
	
	Você não tem nenhum produto na sua lista ainda.
	

</div>

</div>