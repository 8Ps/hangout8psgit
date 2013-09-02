<?php

	class Minha_conta extends CI_Controller{


		function index(){

			$usuario = $this->db->query("SELECT * FROM usuarios WHERE id='".$this->session->userdata('id_user')."'");
			
			$dados = array(
				
				"pagina" => "add_squeeze",
				"main_content" => "usuarios/minha_conta",
				"usuario" => $usuario->result_array(),
			
			);
			
			
				

		//$this->load->view('adm/includes/template_login', $data);
		$this->parser->parse("includes/templates/admin_template",$dados);

		}
		
		function edita_minha_conta_bd(){
			
			
			
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
	
			
			$content_post = array(
			
			
				"nome" => $this->input->post("nome"),
				"email" => $this->input->post("email"),
				"id" => $id,
				
			
			);
			
			
			
			if($this->input->post("password")){

				// criptografar senha //
				
				$this->load->library('encrypt');
			
				$senha_cript = $this->encrypt->encode($this->input->post("password"));

			}
		
			if($this->input->post("password")) $content_post['password'] = $senha_cript;
			//if($this->input->post("password")) $content_post['username'] = $this->input->post("username");
			
			
			$this->load->model("Edita_model_public");
			$this->Edita_model_public->edita_modulo($content_post,"usuarios","usuarios/minha_conta");
		
		}
		
		
	

		
	}

?>