<?php

class Minha_lista extends CI_Controller{

		function __construct(){
			
			parent::__construct();
			$this->oauth->is_logged_in_public();
			
		}
		
		function index(){

			$ProdutosLista = $this->db->query("SELECT * FROM lista_desejos JOIN produtos ON lista_desejos.id_produto=produtos.id WHERE id_usuario='".$this->session->userdata('id_user')."'");
			
			$dados = array(

				"main_content" => "usuarios/minha_lista",
				"produtos" => $ProdutosLista->result_array(),
				"page" => "page-product",
				"page_title" => "Minha Lista de Desejos"
			
			);
			
			if($ProdutosLista->num_rows() == 0) $dados['sem_produtos'] = "display:block";

			//$this->load->view('adm/includes/template_login', $data);
			$this->parser->parse('templates/template_users', $dados);

		}
		
		function deleta_produto_lista(){
			
			$id = $this->uri->segment("4");
			
			$this->load->model("Deleta_model_public");
			
			$this->Deleta_model_public->deleta_produto_lista($id);	
			
		}
		
		function add_produto_lista(){
			
			$id = $this->uri->segment("4");
		
			$content_post['id_produto'] = $id;
			$content_post['id_usuario'] = $this->session->userdata('id_user');
			$this->load->model("Inserir_model_public");
			$this->Inserir_model_public->inseri_modulo($content_post,"lista_desejos","usuarios/minha_lista");
			
			
		}
		
	
		
		
	

		
	}

?>