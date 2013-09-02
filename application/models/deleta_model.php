<?php

class Deleta_model extends CI_Model{
	

	function __construct(){
		parent::__construct();
		$this->oauth->is_logged_in();
	}
	

	function deleta_modulo($modulo,$redirect,$id){
			
			######modulo historico usuarios #######	
			$this->load->helper("date");
			$datestring = "%Y-%m-%d  %HH:%MM";
			$agora = now();
			
			$data =  mdate($datestring, $agora);
				
			$dados = array(
				"modulo" => $modulo,
			    "id_usuario" => $this->session->userdata('id_user'),
			    "data" => $data,
				"acao" => "Excluiu",
			);
				
			
				
		 ######################################
			
		 $this->db->where('id',$id);
		 $ok = $this->db->delete($modulo);
	
		 if($ok) {
		 	
		 
				
			// se vier false, não redirecionar
				
			if($redirect !== FALSE) {
					
				redirect(base_url().$redirect, "refresh");	
					
			}else{
					
					return true;
					
			}
				
		 }
		 else {
				
				$dados['message'] = "Erro ao Deletar ".$modulo."";
				$dados['main_content'] = "admin/error";

				$this->parser->parse("admin/includes/template",$dados);
				
				
			}
			
		 		
		 }
		 
function deleta_papeis($modulo,$id){
			
		
			
		 $this->db->where('id_papel',$id);
		 $ok = $this->db->delete($modulo);
	
		 if($ok) {
		 	
		 
				
			// se vier false, não redirecionar
				
			return true;	
					
					
			
				
		 }
		 else {
				
				$dados['message'] = "Erro ao Deletar ".$modulo."";
				$dados['main_content'] = "admin/error";

				$this->parser->parse("admin/includes/template",$dados);
				
				
			}
			
		 		
		 }
		 
	 function deleta_tags($modulo,$id){
			
		
			
		 $this->db->where('id_aula',$id);
		 $ok = $this->db->delete($modulo);
	
		 if($ok) {
		 	
		 
				
			// se vier false, não redirecionar
				
			return true;	
					
					
			
				
		 }
		 else {
				
				$dados['message'] = "Erro ao Deletar ".$modulo."";
				$dados['main_content'] = "admin/error";

				$this->parser->parse("admin/includes/template",$dados);
				
				
			}
			
		 		
		 }
		 


		function inseri_historico_usuario($dados){
			
			
			$this->db->insert("historico_usuario",$dados);
			
			
		}

	 
}
?>