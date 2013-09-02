<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teste extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->load->helper("date");
		
		// lembra o usuario que virou premium para fazer o pagamento //
	
		
	}

	function index(){
		
		mail('rodrigodevel@gmail.com', 'teste', "teste");
			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */