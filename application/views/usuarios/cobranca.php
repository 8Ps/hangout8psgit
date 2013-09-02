<div>


<div style="height:100px"></div>
<h2>Associado ABMP</h2>


<?php if(!$gera_cobranca){?>

	Você está em dia com a anuidade ABMP.
	
<?php } else {?>

Sua anuidade expirou, por favor faça o pagamento novamente.
{usuario}
										<!-- Declaração do formulário -->  
										<form target="pagseguro" method="post"  action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
										      
										    <!-- Campos obrigatórios -->  
										    <input type="hidden" name="receiverEmail" value="abmp2012@gmail.com">  
										    <input type="hidden" name="currency" value="BRL">  
										      
										    <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
										    <input type="hidden" name="itemId1" value="{id}">  
										    <input type="hidden" name="itemDescription1" value="Pagamento anuidade">  
										    <input type="hidden" name="itemAmount1" value="120.00">  
										    <input type="hidden" name="itemQuantity1" value="1">  
										      
										      
										    <!-- Código de referência do pagamento no seu sistema (opcional) -->  
										    <input type="hidden" name="reference" value="{id}">  
										      
										      
										    <!-- Dados do comprador (opcionais) -->  
										    <input type="hidden" name="senderName" value="{nome} {sobrenome}">  
										      
										    <input type="hidden" name="senderPhone" value="{telefone}">  
										    <input type="hidden" name="senderEmail" value="{email}">  
										      
										    <!-- submit do form (obrigatório) -->  
										    <input type="image" name="submit"   
										    src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"   
										    alt="Pague com PagSeguro">  
										      
										</form>  
										
{/usuario}


<?php } ?>


</div>