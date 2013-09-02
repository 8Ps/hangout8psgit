<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class id extends CI_Controller {

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
		$id = $this->uri->segment(3);
		//carrega landing page aleatoria
		$qLandingPage = $this->db->query("SELECT * FROM landing_pages WHERE id='".$id."'");
		$rLandingPage = $qLandingPage->row();
		
		$content['page'] = $qLandingPage->result_array();

		
		if($rLandingPage->modelo == 'video') {
			 $content['main_content'] = 'home_video';
			
		}else{
			
			$content['main_content'] = 'home';
			
		}
		$this->parser->parse('includes/templates/template_none',$content);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */