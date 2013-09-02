<?php
class Visitantes extends CI_Model {
		
    
function insert_stats($modulo,$id_afiliado,$id_landing_page){
	
	
	date_default_timezone_set('America/Sao_Paulo');
		
	$this->load->library('user_agent');
	$navegador = $this->agent->browser();
	$br_version = $this->agent->version();
	
		
	$modulo = $modulo;
	$id_landing_page = $id_landing_page;
	$id_afiliado = $id_afiliado;
	
	$this->load->helper('date');

	$datestring = "%Y-%m-%d %h:%i";
	$time = time();

	$date = mdate($datestring, $time);
	
	

	  
	  $this->load->model("visitantes");
	  $content_post = array(
	  
	  	"id_landing_page" => "".$id_landing_page."",
	  	"id_afiliado" => "".$id_afiliado."",
	  	"date" => "".$date."",
	  	"brownser" => "".$navegador."",
	  	"ip" => "".$this->input->ip_address()."",
	  	"brownser_version" =>"". $br_version."",
	  
	  );
	  
	
	  
	  		//$this->visitantes->insert_stats($content_post);
	  
			$ok = $this->db->insert("web_stats",$content_post);
			
			if(! $ok) log_message('error', 'Erro inserir dado de visitante');
			
			
		
	  
	  
		}
		
	
}

/* End of file Someclass.php */