<?php

class Inserir_model_public extends CI_Model{
	

	function __construct(){
		parent::__construct();
		
	}

	function inseri_modulo($content_post,$modulo,$redirect){
		
			
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
			
				
				
				
				
			}
		
		}
		
		
	
}
?>