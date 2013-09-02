<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class confirmacao extends CI_Controller {

	
	public function index()
	{
		//$this->output->cache(5000*10);
		
		$content['main_content'] = 'confirmacao';
		
		
		
		//if(!$_COOKIE['id_parceiro']) redirect(base_url());
		
		$this->parser->parse('includes/templates/template',$content);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */