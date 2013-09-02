<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base64 extends CI_Controller {

	function index(){

		$texto = "euabro1000";
		//$code = base64_encode($texto);
		
		

		
		$this->load->library('encrypt');
		$senha_cript = $this->encrypt->decode('UkqyPI9m+MeYpvnsOwd2U5M9yinbdWAYtemr3M8IfXMeNNqslonlcHSqskqJNq+BliPuCFWiW9Cuj0Ja2jd23A==');
		
		
		echo $senha_cript;

		
		
			//var_dump($senha_cript);
			
			//echo "<br/>";
			
		//	var_dump($this->encrypt->decode('Y4OMTRnMd3P48w4L2N54H5sG7Kk9P7qBzAVSQX4qA08i45J1+j4twyZmqtHVORr69pDTIwGCERxi/qXiwYkJGg=='));
			
		die();
		//var_dump($senha_cript);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */