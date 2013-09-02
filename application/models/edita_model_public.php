<?php
class Edita_model_public extends CI_Model{
	

	function __construct(){
		parent::__construct();
		
	}
	

	
	function edita_modulo($content_post,$modulo,$redirect){
		
			
				
		
			$this->db->where('id', $content_post['id']);
			$ok = $this->db->update($modulo,$content_post);
		
			if(isset($ok)) {
				
				
			
				
				// se vier false, não redirecionar
				
				if($redirect !== FALSE) {
					
					
					
					redirect(base_url().$redirect, "refresh");	
					
				}else{
					
					return true;
					
					
				}
				
				
			}
			else {
				
				$dados['message'] = "Erro ao editar ".$modulo."";
				$dados['main_content'] = "admin/error";

				$this->parser->parse("admin/includes/template",$dados);
				
				
			}
		
	}
	
	
	
	function edita_email_desconto($content_post,$modulo,$redirect){
		
			
				
		
			$this->db->where('email', $content_post['email']);
			$ok = $this->db->update($modulo,$content_post);
		
			if(isset($ok)) {
				
				
			
				
				// se vier false, não redirecionar
				
				if($redirect !== FALSE) {
					
					
					
					redirect(base_url().$redirect, "refresh");	
					
				}else{
					
					return true;
					
					
				}
				
				
			}
			else {
				
				$dados['message'] = "Erro ao editar ".$modulo."";
				$dados['main_content'] = "admin/error";

				$this->parser->parse("admin/includes/template",$dados);
				
				
			}
		
	}
	

	

	

}
	


?>