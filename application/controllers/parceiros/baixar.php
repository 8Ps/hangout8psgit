<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class baixar extends CI_Controller {
	


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
			
		$id = $this->uri->segment(4);
		
		$content_post['id_parceiro'] = $id;
		if(isset($_COOKIE['id_parceiro'])) $content_post['id_referencia'] = $_COOKIE['id_parceiro'];
			
		$this->load->model("Inserir_model_public");
		$this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
		
		$qParceiro = $this->db->query("SELECT * FROM parceiros WHERE id='".$id."'");
		$qParceiroRow = $qParceiro->row();
		
		redirect($qParceiroRow->link);
	}

}
	
	
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */