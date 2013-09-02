<?php

class Inserir_model extends CI_Model{
	

	function __construct(){
		parent::__construct();
		$this->oauth->is_logged_in();
	}

	function inseri_modulo($content_post,$modulo,$redirect){
		
		###### inseri no banco historico ######
		$this->load->helper("date");
		$datestring = "%Y-%m-%d  %HH:%MM";
		$agora = now();
	
		$data =  mdate($datestring, $agora);
			
		
		
				
	
		
		#######################################
				
		$ok = $this->db->insert($modulo,$content_post);
		 
		
		
			if(isset($ok)) {
				
				
				
				// se vier false, não redirecionar
				
				if($redirect !== FALSE) {
					
					redirect(base_url().$redirect, "refresh");	
					
				}else{
					
					return true;
					
					
				}
				
			}
			
			else {
			
				
				$dados['message'] = "Erro ao incluir ".$modulo."";
				$dados['main_content'] = "admin/error";

				$this->parser->parse("admin/includes/template",$dados);
				
				
			}
		
		}
		
		
}
?>