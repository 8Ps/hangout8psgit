<?php

	class Pagamento extends CI_Controller{


		function index(){
			
			$id = $this->uri->segment("3");
			
			
			$usuario = $this->db->query("SELECT * FROM usuarios WHERE id='".$this->session->userdata('id_user')."'");
			
			$dados = array(

				"main_content" => "usuarios/minha_conta",
				"usuario" => $usuario->result_array(),
			
			);
			
				

		//$this->load->view('adm/includes/template_login', $data);
		$this->parser->parse('templates/template', $dados);

		}
		
		function cobranca(){
			
			$this->load->helper("date");
			
			$id_usuario = $this->uri->segment(4);
			
			$this->db->where("id",$id_usuario);
			$qusuarios = $this->db->get("usuarios");
			
			
			$datestring = "%Y-%m-%d  %h:%i";
			$agora = now();
			$data =  mdate($datestring, $agora);
			
			// verifica pagamento //
			$qCheckPagamento = $this->db->query("SELECT *, DATEDIFF('".$data."',data_pagamento) as tempo_pagamento FROM pagamentos_associados WHERE id_usuario='".$id_usuario."' AND status='pago' order by id DESC LIMIT 1");
			
			$rCheckPagamento = $qCheckPagamento->row();
			
			$dados['main_content'] = "usuarios/cobranca";
			$dados['usuario'] = $qusuarios->result_array();
	
			if($qCheckPagamento->num_rows() == 0){
				
				$dados['gera_cobranca'] = true;
				
			}else{
				
				
				if($rCheckPagamento->tempo_pagamento > 360){
				
					$dados['gera_cobranca'] = true;
				
				}else{
				
					$dados['gera_cobranca'] = false;
				
				}
			
			}
			
			$this->parser->parse("templates/template",$dados);
		
			
		}
		
		function retorno(){
		
		
			
		if (count($_POST) > 0) {
			
			$this->load->helper("date");
			
			$datestring = "%Y-%m-%d  %h:%i";
			$agora = now();
			
			$data =  mdate($datestring, $agora);
			
			$qUser = $this->db->query("SELECT * FROM usuarios WHERE email='".$_POST['CliEmail']."'");
			$rUser = $qUser->row();
			
			$qPagamento = $this->db->query("SELECT * FROM pagamentos_associados WHERE id_usuario='".$rUser->id."' ORDER by id DESC");
			$rPagamento = $qPagamento->row();
			
			$content_post = array(
			
			
				"id" => $rPagamento->id,
				"id_transacao" => $_POST['TransacaoID'],
				"data_pagamento" => $data,
				
			);
			
			
			

			if($_POST['StatusTransacao'] == 'Aprovado'){
			
				$content_post['status'] = "pago";
				
			
			}elseif($_POST['StatusTransacao'] == 'Em Análise'){
			
				$content_post['status'] = "aguardando_pagamento";
		
			}elseif($_POST['StatusTransacao'] == 'Aguardando Pagto'){
			
				$content_post['status'] = "aguardando_pagamento";
			
			}elseif($_POST['StatusTransacao'] == 'Completo'){
			
			
				$content_post['status'] = "completo";
			
			}elseif($_POST['StatusTransacao'] == 'Cancelado'){
			
			
				$content_post['status'] = "cancelado";
			
			
		}else{
			
			$content_post['status'] = "cancelado";
			
			
		}
	


	} else {
		
		$dados['main_content'] = "usuarios/pagamento_sucesso";
		
		$this->load->view("templates/template",$dados);
		return false;
		
	// POST não recebido, indica que a requisição é o retorno do Checkout PagSeguro.
	// No término do checkout o usuário é redirecionado para este bloco.
	$informacao['status'] = '3';
}



	$this->load->model("Edita_model_public");
	$this->Edita_model_public->edita_modulo($content_post,"pagamentos_associados","");
		
			
			
	// dados do usuario //
	$dados['main_content'] = "usuarios/pagamento_sucesso"; 
	$this->parser->parse('templates/template',$dados);
}


			
		}
	

?>