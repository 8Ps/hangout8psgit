<?php

	class Login_public extends CI_Controller{




		function index(){

		
			$data = array(
				'main_content' => 'login_public',
				'page' => 'page-product',
				'page_title' => 'Logar',
				'message' => 'Por favor, insira seu login e senha para continuar',
			);


		
		$this->parser->parse('includes/templates/admin_template', $data);

		}



		function validate_credentials(){

			$this->load->model('auth_model');
			$query = $this->auth_model->validate_public();
			$nome = $this->db->query("SELECT id_papel, nome, id ,username from usuarios where username='".$this->input->post('username')."'");
			$row = $nome->row();
			
			
			
		
			
			
			if(!isset($_REQUEST['username']) OR !isset($_REQUEST['password']) OR  $_REQUEST['password'] == "" OR $_REQUEST['username'] == ""){
			
			
				
				$data = array(

					'main_content' => 'login',
					'message' => 'Você precisa preencher os dados para poder acessar sua conta.',


				);
				$this->parser->parse('includes/templates/admin_template', $data);
				return false;
				
				
				
			}
			
		
			if($query){
				
			
				
				// validação de usuario
				$data = array(

					'name' => $row->nome,
					'id_user' => $row->id,
					'is_logged_in' => true,
					'papel' => $row->id_papel,
				);
				
			
				
				
				$this->session->set_userdata($data);


				redirect(base_url().'membros/');
			}

			// senha ou usuario incorreto
			else{

				$data = array(

					'main_content' => 'login',
					'message' => 'Usuário ou senha inválido',


				);
				$this->parser->parse('includes/templates/admin_template', $data);
			}
		}

		
		function recuperar_senha(){
			
			
			$content_post['main_content'] = "recuperar_senha";
			$content_post['mensagem'] = "Insira seu e-mail";
			
			$this->parser->parse('includes/templates/admin_template',$content_post);
			
			
		}
		
		function recupera_acao(){
			
			
	
		
		$this->load->library('encrypt');
		
		$email = $this->input->post('email');
		
		$qEmail = $this->db->query("SELECT * FROM usuarios WHERE email='".$email."'");
		$rEmail = $qEmail->row();
		
		
		
		if($qEmail->num_rows() > 0){
			
				
			
			//senha
			
			
			$password = $rEmail->password;
			$fPassword = $this->encrypt->decode($password);
			
			
		
	
			// get admin mail //
	
			

	
	
				/* padrão locaweb */
				// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
				// O return-path deve ser ser o mesmo e-mail do remetente.
				$headers = "MIME-Version: 1.1\r\n";
				$headers .= "Content-type: text/html; charset=utf-8\r\n";
				$headers .= "From: noreply@8ps.com\r\n"; // remetente
				$headers .= "Return-Path: noreply@8ps.com\r\n"; // return-path
				$envio = mail($rEmail->email, "Recuperação de Senha Curso 8Ps Express", '
	
			Prezado '.$rEmail->nome.',
			<br/><br/>
			
			Este e-mail foi enviado com sua senha:
			<br/>
			
	
				Sua senha é: '.$fPassword .'<br/>
				
				Se você não solicitou este e-mail, alguém pode estar tentando acessar sua conta.
	
			', $headers);
				
				
				
				if($envio){
					
					
	
	
				$dados['mensagem'] = 'Senha enviada com sucesso';
				$dados['main_content'] = "recuperar_senha";
				$dados['page_title'] = "Recuperar Senha";
				$this->parser->parse("includes/templates/admin_template",$dados);
	
			}else{
	
				
	
				$dados['mensagem'] = "Desculpe, este e-mail não está cadastrado no nosso sistema.";
				$dados['main_content'] = "recuperar_senha";
				$dados['page_title'] = "Recuperar Senha";
				$this->parser->parse("includes/templates/admin_template",$dados);
	
	
	
			}


	
		
	
	
	}else{
		
		$dados['mensagem'] = "Desculpe, este e-mail não está cadastrado no nosso sistema.";
				$dados['main_content'] = "includes/templates/admin_template";
				$dados['page_title'] = "Recuperar Senha";
				$this->parser->parse("templates/template",$dados);
	
		
		
	}
	
		}
	}

?>