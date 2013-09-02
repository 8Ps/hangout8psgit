<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crons extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->helper("date");
		
		// lembra o usuario que virou premium para fazer o pagamento //
		
		//$this->lembra_usuario_premium();
		
		die();
		
	}

	function index(){
	die();

		$datestring = "%Y-%m-%d  %h:%i";
		$agora = now();
		$data =  mdate($datestring, $agora);
			
		// verifica usuários que tem mais de ano de acesso
		$qCheckPagamento = $this->db->query("SELECT *, DATEDIFF('".$data."',data_pagamento) as tempo_pagamento FROM pagamentos_usuarios WHERE status='pago' order by id DESC ");
		
		
		
		foreach($qCheckPagamento->result_array() as $PagamentosExp){
			
			
			
			//só os que tem data de pagamento //
			if($PagamentosExp['tempo_pagamento'] <> 0){
				
			
				// seleciona pacote
				$qPacote = $this->db->query("SELECT * FROM pacotes WHERE id='".$PagamentosExp['id_pacote']."'");
				$rPacote = $qPacote->row();
				
					//trial
					
					
					if($rPacote->tipo == 'trial'){
						
						if($PagamentosExp['tempo_pagamento'] >= 30){
						
							// seta o pagamento como expirado
							$content_post4['status'] = 'expirado';
							$this->db->where('id_usuario', $PagamentosExp['id_usuario']);
							$this->db->update('pagamentos_usuarios',$content_post4);
							
							// pega email do usuario
							$qUserMail = $this->db->query("SELECT * FROM usuarios WHERE id='".$PagamentosExp['id_usuario']."'");
							$rUserMail = $qUserMail->row();
							
							
							
							if($qUserMail->num_rows() > 0){
								
								//echo 'via lembrete';
								//die();
								
								$this->envia_email_lembrete_expirado_trial($rUserMail->id);
							}
							
							
						}
					
					}
				
					// mensal
					
					if($rPacote->tipo == 'mensal') {
						if($PagamentosExp['tempo_pagamento'] >= 30){
							
							echo $PagamentosExp['tempo_pagamento'];
							
							
							/*
							$content_post3['status'] = '0';
							$content_post3['id'] = $PagamentosExp['id_usuario'];
							
							$this->load->model("Edita_model_public");
							$this->Edita_model_public->edita_modulo($content_post3,"usuarios",false);
							
							*/
							
							
							// seta o pagamento como expirado
								$content_post4['status'] = 'expirado';
								$this->db->where('id_usuario', $PagamentosExp['id_usuario']);
								$this->db->update('pagamentos_usuarios',$content_post4);
								
								echo $PagamentosExp['id_usuario'];
							
							// pega email do usuario
							$qUserMail = $this->db->query("SELECT * FROM usuarios WHERE id='".$PagamentosExp['id_usuario']."'");
							$rUserMail = $qUserMail->row();
							
							
							
							if($qUserMail->num_rows() > 0){
								
								$this->envia_email_lembrete_expirado($rUserMail->id);
							}
						
						}
					}
					
					
					// trimestral
					if($rPacote->tipo == 'trimestral') {
						
						
						
						if($PagamentosExp['tempo_pagamento'] > 90){
							
							
							
							// seta o pagamento como expirado
							$content_post4['status'] = 'expirado';
							$this->db->where('id_usuario', $PagamentosExp['id_usuario']);
							$this->db->update('pagamentos_usuarios',$content_post4);
						
							/*
							
							// seta o usuário como ativo //
							$content_post3['status'] = '0';
							$content_post3['id'] = $PagamentosExp['id_usuario'];
							
							$this->load->model("Edita_model_public");
							$this->Edita_model_public->edita_modulo($content_post3,"usuarios",false);
							
							//
							 * */
							 
						
							
							// pega email do usuario
							$qUserMail = $this->db->query("SELECT * FROM usuarios WHERE id='".$PagamentosExp['id_usuario']."'");
							$rUserMail = $qUserMail->row();
							
							
							
							if($qUserMail->num_rows() > 0){
								
								$this->envia_email_lembrete_expirado($rUserMail->id);
							}
						
						}
					}
					
					
					if($rPacote->tipo == 'semestral') {
						
						// semestral
						if(round($PagamentosExp['tempo_pagamento']) >= 180){
							
							/*
							
							// seta o usuário como ativo //
							$content_post3['status'] = '0';
							$content_post3['id'] = $PagamentosExp['id_usuario'];
							
							$this->load->model("Edita_model_public");
							$this->Edita_model_public->edita_modulo($content_post3,"usuarios",false);
							
							//
						
							*/
							
							// seta o pagamento como expirado
								$content_post4['status'] = 'expirado';
								$this->db->where('id_usuario', $PagamentosExp['id_usuario']);
								$this->db->update('pagamentos_usuarios',$content_post4);
								
							// pega email do usuario
							$qUserMail = $this->db->query("SELECT * FROM usuarios WHERE id='".$PagamentosExp['id_usuario']."'");
							$rUserMail = $qUserMail->row();
							
							
							
							if($qUserMail->num_rows() > 0){
								
								$this->envia_email_lembrete_expirado($rUserMail->id);
							}
						
						}
					}
					
					// anual
					if($rPacote->tipo == 'anual') {
						if($PagamentosExp['tempo_pagamento'] >= 360){
							
							/*
							
							// seta o usuário como ativo //
							$content_post3['status'] = '0';
							$content_post3['id'] = $PagamentosExp['id_usuario'];
							
							$this->load->model("Edita_model_public");
							$this->Edita_model_public->edita_modulo($content_post3,"usuarios",false);
							
							//
						*/
							
							// seta o pagamento como expirado
								$content_post4['status'] = 'expirado';
								$this->db->where('id_usuario', $PagamentosExp['id_usuario']);
								$this->db->update('pagamentos_usuarios',$content_post4);
							
							// pega email do usuario
							$qUserMail = $this->db->query("SELECT * FROM usuarios WHERE id='".$PagamentosExp['id_usuario']."'");
							$rUserMail = $qUserMail->row();
							
							
							
							if($qUserMail->num_rows() > 0){
								
								$this->envia_email_lembrete_expirado($rUserMail->id);
							}
						
						}
					}
			}else {
				 //echo "sem usuario com data de pagamento";//
			}
			
			
			// pega o usuário
			$qUserLemQui = $this->db->query("SELECT * FROM usuarios WHERE id='".$PagamentosExp['id_usuario']."'");
			$rUserLemQui = $qUserLemQui->row();
			
			
			
			
			if($rPacote->tipo == 'mensal'){
				
				if($PagamentosExp['tempo_pagamento'] == 15 ){ $this->envia_email_lembrete($rUserLemQui->id); }
			
			}
			else if($rPacote->tipo == 'trimestral'){
			
				if($PagamentosExp['tempo_pagamento'] == 75){ $this->envia_email_lembrete($rUserLemQui->id); }
			
			}
			
			else if($rPacote->tipo == 'semestral'){
			
				if($PagamentosExp['tempo_pagamento'] == 165){ $this->envia_email_lembrete($rUserLemQui->id); }
			
			}
			
		else if($rPacote->tipo == 'anual'){
			
				if($PagamentosExp['tempo_pagamento'] == 350){$this->envia_email_lembrete($rUserLemQui->id); }
			
			}
		
		}
		

	}
	
	
	function envia_email_lembrete_expirado($id_usuario){
	
				
			// pega email do usuario
			$qUser = $this->db->query("SELECT * FROM usuarios WHERE id='".$id_usuario."'");
			$rUser= $qUser->row();


			/* padrão locaweb */
			// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
			// O return-path deve ser ser o mesmo e-mail do remetente.
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: contato@ninjappc.com.br\r\n"; // remetente
			$headers .= "Return-Path: contato@ninjappc.com.br\r\n"; // return-path
			$headers .= "Cc: rodrigodevel@gmail.com\n";
			$envio = mail($rUser->email, "Lembrete de Pagamento Ninja PPC", '
		
			
		

			Olá, '.$rUser->nome.',
			<br/><br/>

			Não sei se já tentou entrar no curso NinjaPPC, mas sua assinatura expirou. <br/>
			Caso tente, infelizmente, não irá conseguir se logar. Para voltar a acessar <br/>
			é preciso renovar o seu plano. Acesse já a <a href="'.base_url().'cadastro/pacotes">página de pagamento</a> e renove sua <br/>
			assinatura para continuar usufruindo das aulas do NinjaPPC.
			
			<br/><br/>
			
			Caso tenha realmente desistido de continuar o curso, lamentamos sua saída, <br/>
			porém, gostaríamos que nos dissesse o motivo da desistência. Peço isso para <br/>
			que melhoremos cada vez os nossos serviços.
			
			<br/><br/>
			
			Espero revê-lo em breve.
			<br/><br/>
			
			
			Um grande abraço,<br/>
			Conrado Adolpho
		
				', $headers);

			if($envio){

			//echo "enviado";

		}else{

			//echo "erro";



		}
		
		
		

		/*
		$this->load->library('email');

		$config['protocol'] = 'mail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';


		$this->email->initialize($config);

		$this->email->from('noreply@'.$rDomain->dominio.'', 'Döhler');
		$this->email->to($rAdminMail->email_admin);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Contato pelo site da Döhler');
		$this->email->message('

		Prezado Adminitrador, <br/>

		Segue o e-mail enviado pelo formulário de contato no site da Döhler: <br/><br/>

		Nome:'.$_REQUEST['nome'].' <br/>
		E-mail:'.$_REQUEST['email'].' <br/>
		Mensagem:'.$_REQUEST['mensagem'].' <br/>


		');


		$ok = $this->email->send();
		if($ok){


			$dados['message'] = $this->lang->line('contatook_sucess');
			$dados['main_content'] = "institucional/contatook";
			$dados['page_title'] = "Fale Conosco";
			$this->parser->parse("templates/template",$dados);

		}else{

			$mail_admin = $this->db->query("SELECT * FROM config");
			$rmail_admin = $mail_admin->row();

			$dados['message'] = "Desculpe mas ocorreu um erro ao enviar o e-mail.";
			$dados['main_content'] = "institucional/contatook";
			$dados['page_title'] = "Fale Conosco";
			$this->parser->parse("templates/template",$dados);



		}
		*/

	}
		
function envia_email_lembrete_expirado_trial($id_usuario){
	
				
			// pega email do usuario
			$qUser = $this->db->query("SELECT * FROM usuarios WHERE id='".$id_usuario."'");
			$rUser= $qUser->row();


			/* padrão locaweb */
			// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
			// O return-path deve ser ser o mesmo e-mail do remetente.
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: contato@ninjappc.com.br\r\n"; // remetente
			$headers .= "Return-Path: contato@ninjappc.com.br\r\n"; // return-path
			$headers .= "Cc: rodrigodevel@gmail.com\n";
			$envio = mail($rUser->email, "Cadastro Ninja PPC", '
		
			
		

			Olá, '.$rUser->nome.',
			<br/><br/>

			O seu cadastro gratuito expirou, espero que você tenha gostado das aulas.<br/>
			Se você deseja continuar assistindo, <a href="'.base_url().'pacotes">clique aqui</a> para escolher um plano.<br/><br/>
			
			
			Um grande abraço,<br/>
			Conrado Adolpho
		
				', $headers);

			if($envio){

			//echo "enviado";

		}else{

			//echo "erro";



		}
		
		
		

		/*
		$this->load->library('email');

		$config['protocol'] = 'mail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';


		$this->email->initialize($config);

		$this->email->from('noreply@'.$rDomain->dominio.'', 'Döhler');
		$this->email->to($rAdminMail->email_admin);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Contato pelo site da Döhler');
		$this->email->message('

		Prezado Adminitrador, <br/>

		Segue o e-mail enviado pelo formulário de contato no site da Döhler: <br/><br/>

		Nome:'.$_REQUEST['nome'].' <br/>
		E-mail:'.$_REQUEST['email'].' <br/>
		Mensagem:'.$_REQUEST['mensagem'].' <br/>


		');


		$ok = $this->email->send();
		if($ok){


			$dados['message'] = $this->lang->line('contatook_sucess');
			$dados['main_content'] = "institucional/contatook";
			$dados['page_title'] = "Fale Conosco";
			$this->parser->parse("templates/template",$dados);

		}else{

			$mail_admin = $this->db->query("SELECT * FROM config");
			$rmail_admin = $mail_admin->row();

			$dados['message'] = "Desculpe mas ocorreu um erro ao enviar o e-mail.";
			$dados['main_content'] = "institucional/contatook";
			$dados['page_title'] = "Fale Conosco";
			$this->parser->parse("templates/template",$dados);



		}
		*/

	}
	
	function envia_email_lembrete($id_usuario){
	
				
			// pega email do usuario
			$qUser = $this->db->query("SELECT * FROM usuarios WHERE id='".$id_usuario."'");
			$rUser= $qUser->row();


			/* padrão locaweb */
			// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
			// O return-path deve ser ser o mesmo e-mail do remetente.
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: contato@ninjappc.com.br\r\n"; // remetente
			$headers .= "Return-Path: contato@ninjappc.com.br\r\n"; // return-path
			$headers .= "Cc: rodrigodevel@gmail.com\n";
			$envio = mail($rUser->email, "Lembrete Expiração Conta", '
		
				Olá, '.$rUser->nome.',<br/><br/>

				Tudo bem?<br/><br/>
				
				Espero que esteja gostando do NinjaPPC. Os depoimentos que tenho recebido<br/>
				são os melhores possíveis. Como lhe disse no e-mail de boas-vindas quando <br/>
				se tornou um membro premium da nossa comunidade NinjaPPC, estou lhe escrevendo <br/> 
				para avisá-lo que a data de vencimento do plano que adquiriu está chegando.
				
				<br/>
				<br/>
				
				
				Caso esteja usufruindo das aulas, para não perder nem um dia sequer de assinatura <br/>
				premium, aconselho a ir se preparando para renovar seu plano. Caso não queira renová-lo,<br/>
				por favor nos escreva para dizer o motivo da desistência. Isso é muito importante para <br/>
				que melhoremos cada vez mais nosso serviço.
				
				<br/><br/>
				
				Para renovar o seu plano, acesse a sua <a href="'.base_url().'cadastro/pacotes">página de pagamento</a>
				
				<br/>
				<br/>
				
				Um grande abraço,<br/>
				Conrado Adolpho<br/>
				', $headers);

			if($envio){

			//echo "enviado";

		}else{

			//echo "erro";



		}
}


	function envia_email_lembrete_pagamento_npago($id_usuario){
	
				
			// pega email do usuario
			$qUser = $this->db->query("SELECT * FROM usuarios WHERE id='".$id_usuario."'");
			$rUser= $qUser->row();
			
			
			
			
			
			/* padrão locaweb */
			// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
			// O return-path deve ser ser o mesmo e-mail do remetente.
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "From: contato@ninjappc.com.br\r\n"; // remetente
			$headers .= "Return-Path: contato@ninjappc.com.br\r\n"; // return-path
			$headers .= "Cc: rodrigodevel@gmail.com\n";
			$envio = mail($rUser->email, "Lembrete de Pagamento Ninja PPC", '
		
			

				Olá, '.$rUser->nome.',<br/><br/>

				Tudo bem?
				
				Percebi que você fez uma intenção de pagamento de virar assinante premium, <br/>
				mas ainda não efetuou o pagamento. Qualquer problema que tenha tido, <br/>
				sinta-se à vontade para perguntar-nos.<br/><br/>
				
				Para fazer o pagamento, faça o login e clique <a href="'.base_url().'cadastro/pacotes">aqui</a> para você fazer o pagamento.
				
				Um grande abraço,<br/>
				Conrado Adolpho
				', $headers);

			if($envio){
			
		
			//echo "enviado";

		}else{

			//echo "erro";



		}
		
		
}

	function lembra_usuario_premium(){
		
		$datestring = "%Y-%m-%d  %h:%i";
		$agora = now();
		$data =  mdate($datestring, $agora);
		
		$qUsuario = $this->db->query("SELECT *, usuarios.id as id_usuario, DATEDIFF('".$data."',pagamentos_usuarios.data) as tempo_data FROM pagamentos_usuarios JOIN usuarios ON pagamentos_usuarios.id_usuario=usuarios.id WHERE pagamentos_usuarios.status ='aguardando_pagamento'");
		
		foreach($qUsuario->result_array() as $usuario){
			
			//apenas uma certificação de que não entrou pagamento posteriormente
			$qVerificaUsuarioPago = $this->db->query("SELECT * FROM pagamentos_usuarios WHERE id_usuario='".$usuario['id_usuario']."' AND status='pago'");
		
			if($qVerificaUsuarioPago->num_rows() == 0){
				
				if($usuario['tempo_data'] == 10){
					
					$this->envia_email_lembrete_pagamento_npago($usuario['id_usuario']);
				
				}
			}
		
		
		
		}
		
	
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */