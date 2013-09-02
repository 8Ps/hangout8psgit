<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busca extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->helper("date");

		// lembra o usuario que virou premium para fazer o pagamento //


	}

	function index(){


		if(isset($_POST['action'])){

			$email = $this->input->post('email');

			 $qUsuarios = $this->db->query("SELECT * FROM usuarios WHERE email LIKE '%".$email."%'");
			 //$rUsuario = $qUsuario->row();

			 $dados = array(

				"usuarios" => $qUsuarios->result_array(),
				"main_content" => "usuarios/admin/busca_usuario_resultado",

			);



			$this->parser->parse("admin/includes/template",$dados);


		}else{

				 $dados = array(


				"main_content" => "usuarios/admin/busca_usuario",

			);



			$this->parser->parse("admin/includes/template",$dados);

		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */