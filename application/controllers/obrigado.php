<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class obrigado extends CI_Controller {

	
	public function index()
	{
		//$this->output->cache(5000*10);
		
		$content['main_content'] = 'obrigado';
		
		if(!isset($_COOKIE['obrigado-page'])){
			
			
			setcookie('obrigado-page',1,time() + (586400 * 15));
		}
		
		//if(!$_COOKIE['id_parceiro']) redirect(base_url());
		
		$this->parser->parse('includes/templates/template',$content);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */