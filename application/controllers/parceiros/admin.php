<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
function __construct(){
		
		parent::__construct();
		$this->oauth->is_logged_in();
		
		$this->load->helper("date");
		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	public function adiciona()
	{
		$content['main_content'] = 'parceiros/adiciona';
		
		$this->parser->parse('includes/templates/template',$content);
	}
	
	
	function add_bd(){
	
		if(isset($_FILES['userfile']) AND $_FILES['userfile']['error'] !== 4) {
				
				$this->load->model("Upload_model");
				$this->Upload_model->simple_upload("imagens","userfile");
				$arquivo = $this->upload->data();
				

				$file_name1 = $arquivo['file_name'];
		}
		
		$content_post['titulo'] = $this->input->post("titulo");
		$content_post['nome'] = $this->input->post("nome");
		$content_post['link'] = $this->input->post("link");
		$content_post['descricao'] = $this->input->post("descricao");
		
		
		if(isset($arquivo)){ $content_post["img"] = $file_name1; }
		
		$this->load->model("Inserir_model");
		$this->Inserir_model->inseri_modulo($content_post,"parceiros",false);
		
		
		/* adiciona 1 click */
		$content_post2['id_parceiro'] = $this->db->insert_id();
			
			
		$this->load->model("Inserir_model_public");
		$this->Inserir_model_public->inseri_modulo($content_post2,"clicks",false);
		
		
			
		
		redirect(base_url().'parceiros/admin/adiciona/1');
		
			
		
	
	}
	function editar(){
	
		
		$qParceiro = $this->db->query("SELECT * FROM parceiros WHERE id='".$this->uri->segment(4)."'");
		$content['parceiro'] = $qParceiro->result_array();
		$content['main_content'] = "parceiros/editar";
		
		$this->parser->parse('includes/templates/template',$content);
	
	}
	
	function editar_bd(){
	
		
		
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			
			if(isset($_FILES['userfile']) AND $_FILES['userfile']['error'] !== 4) {
				
				$this->load->model("Upload_model");
				$this->Upload_model->simple_upload("imagens","userfile");
				$arquivo = $this->upload->data();
				

				$file_name1 = $arquivo['file_name'];
		}
			
		
			$content_post['id'] = $id;
			$content_post['titulo'] = $this->input->post("titulo");
			$content_post['nome'] = $this->input->post("nome");
			$content_post['link'] = $this->input->post("link");
			$content_post['descricao'] = $this->input->post("descricao");
			if(isset($arquivo)){ $content_post["img"] = $file_name1; }
			
		
	
			$this->load->model("Edita_model");
			$this->Edita_model->edita_modulo($content_post,"parceiros","parceiros/admin/editar/".$id."/1");
	
	}
	
	function listar(){
	
		
		$qParceiros = $this->db->query("SELECT * FROM parceiros");
		
		$content['parceiros'] = $qParceiros->result_array();
		$content['main_content'] = 'parceiros/lista';
		
		$this->parser->parse('includes/templates/template',$content);
	
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */