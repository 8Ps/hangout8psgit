<?php
class Edita_model extends CI_Model{
	

	function __construct(){
		parent::__construct();
		$this->oauth->is_logged_in();
	}
	

	
	function edita_modulo($content_post,$modulo,$redirect){
		
				
			###### edita no banco historico ######
				$this->load->helper("date");
				$datestring = "%Y-%m-%d  %HH:%MM";
				$agora = now();
			
				$data =  mdate($datestring, $agora);
				
				$dados = array(
					"modulo" => $modulo,
				    "id_usuario" => $this->session->userdata('id_user'),
				    "data" => $data,
					"acao" => "Editou",
				);
				
			
				
				
				
				#######################################
				
		
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

		


		function inseri_historico_usuario($dados){
			
			if($dados['modulo'] == "online_users") return false;
			
			$this->db->insert("historico_usuario",$dados);
			
			
			
		}

}
	


?>