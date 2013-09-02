<script>

$("#selecttest").validate();


$('#meu_form').validate({
    rules:{
       
       nome:{
            required: true,
            minlength: 3
        },
        email:{
            required: true,
            minlength: 3,
            email: true
        },
        username:{
            required: true,
            minlength: 3
        },

        password:{
            required: true,
            minlength: 3
        },
        password2: {
			required: true,
			minlength: 5,
			equalTo: "#senha1"
		},
        
        
       
        termos: "obrigatório"
    },
    messages:{
        
        nome:{
            required: "O campo nome é obrigatorio.",
            minlength: "O campo nome deve conter no mínimo 3 caracteres."
        },
        email:{
            required: "O campo e-mail é obrigatorio.",
            minlength: "O campo e-mail deve conter no mínimo 3 caracteres."
        },
        username:{
            required: "O campo nome de usuário é obrigatorio.",
            minlength: "O campo usuário deve conter no mínimo 3 caracteres."
        },
        password:{
            required: "O campo Senha é obrigatorio.",
            minlength: "O campo Senha deve conter no mínimo 5 caracteres."
        },
        password2:{
            required: "O campo Senha é obrigatorio.",
            minlength: "O campo Senha deve conter no mínimo 5 caracteres."
        },
        
        termos: "Para se cadastrar você deve aceitar os termos de uso."
    }

});



</script>
<br style="clear:both">
            
			
            <h2 style="margin-top:20px;">Meus Dados</h2>
            
            <div id="texto_institucional" >
{usuario}

<form action="<?php echo base_url();?>usuarios/minha_conta/edita_minha_conta_bd/{id}" class="form_padrao" name="meu_form" method="post">
	
		<label>Nome</label>
		<div class="clear_form" style="height:10px"></div>
		<input type="text" name="nome" value="{nome}" class="input_form">

		
		<div class="clear_form" style="height:10px"></div>
		
		
		<label>E-mail</label>
		<div class="clear_form" style="height:10px"></div>
		<input type="text" name="email" value="{email}" class="input_form">

		<div class="clear_form" style="height:10px"></div>
		
		<label>Senha</label>
		<div class="clear_form" style="height:10px"></div>
		<input type="password" id="senha1" name="password" />
		<div class="clear_form" style="height:5px"></div>
		<small>Caso queria alterar sua senha, digite a nova senha no campo abaixo e, a seguir, digite-a novamente para confirmar</small>
		
		<div class="clear_form" style="height:10px"></div>
		
		
		<label>Confirmação de senha</label>
		<div class="clear_form" style="height:10px"></div>
		<input type="password" name="password2" id="senha2" />
		
		<div class="clear_form" style="height:10px"></div>
	


		<input type="image" src="<?php echo base_url()?>assets/images/salvar-button.png" style="padding:0px;margin:0px;border:0px;background:none;width:198px;height:57px;" value="Enviar" style="height:30px;width:200px" />

</form>
{/usuario}

</div>
