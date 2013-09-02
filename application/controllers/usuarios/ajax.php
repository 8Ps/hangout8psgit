<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
		
	function __construct(){
		
		parent::__construct();
		//$this->oauth->is_logged_in();
		$this->load->helper("date");
		
	}
	

	
	function verificar_nome_usuario(){
	
		$nome_usuario = $this->uri->segment("4");
		
		$this->db->where("username",$nome_usuario);
		$qUsuarios = $this->db->get("usuarios");
		
		$dados["main_content"] = "usuarios/admin/ajax/verifica_nome_usuario";
		
		if($qUsuarios->num_rows() == 0) {
			
			
			$dados['msg_modulo'] = "<span style='color:green'>Nome de usuário válido</span>";
			$dados['botao_cadastro'] = 1;
			
			
		}
		else {
			
			$dados['botao_cadastro'] = 0;
			$dados['msg_modulo'] = "<span style='color:red'>Este nome de usuário já está cadastrado no sistema</span>";
			
			
		
		}
		
		
	
		$this->parser->parse("admin/includes/template_ajax",$dados);
	}
	
	function verificar_email(){
	
		$nome_usuario = $this->input->post('email');
		
		
		
		$this->db->where("email",$nome_usuario);
		$qUsuarios = $this->db->get("usuarios");
		
		$dados["main_content"] = "usuarios/admin/ajax/verifica_email";
		
		
		if($qUsuarios->num_rows() == 0) {
			
			
			$dados['msg_modulo'] = "";
			
			
			
		}
		else {
			
			
			$dados['msg_modulo'] = "Parece que este e-mail já está em nosso sistema, você pode tentar recuperar sua senha <a href='".base_url()."login_public/recuperar_senha'>aqui</a>";
			
			
		
		}
		
		
	
		$this->parser->parse("admin/includes/template_ajax",$dados);
	}
	
	function verifica_desconto(){
	
		
		$email = $this->uri->segment('4');
		$codigo_desconto = $this->uri->segment(5);
		
		
		
		$qEmail = $this->db->query("SELECT * FROM emails_descontos WHERE email = '".$email."' AND is_used='n'");
		$qDesconto = $this->db->query("SELECT * FROM descontos WHERE codigo ='".$codigo_desconto."'");
		
		if($qEmail->num_rows() > 0 AND $qDesconto->num_rows() > 0){
		
			
			// pega o grupo de desconto do código
			$rDesconto = $qDesconto->row();
			$qGruposDesconto = $this->db->query("SELECT * FROM grupos_desconto WHERE id='".$rDesconto->id_grupo_descontos."'");
		
			
		
			$qPacotes = $this->db->query("SELECT * FROM pacotes WHERE id_grupo_desconto = '".$rDesconto->id_grupo_descontos."'");
			
			$dados['main_content']  = "usuarios/admin/ajax/pacotes";
			$dados['pacotes'] = $qPacotes->result_array();
			
			$this->parser->parse("admin/includes/template_ajax",$dados);
			
		
		
		}else {
		
			echo "Código inválido";
		
		}
		
		
	
	}
	

	 
}