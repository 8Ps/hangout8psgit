<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		
		
	}
	
	
	public function index(){
		
		if(isset($_COOKIE['checked'])){
			
			setcookie('ref_page','confirmacao',time() + (586400 * 15),'/');	
		}else{
			
			setcookie('ref_page','obrigado',time() + (586400 * 15),'/');
			
		}
		
		
		//$numers_rand = (explode(",", $numbers));
	
		
		
		//if(isset($_COOKIE['email_lead'])) redirect(base_url().'video1');
		
		/*
		//carrega landing page aleatoria
		$qLandingPage = $this->db->query("SELECT * FROM landing_pages WHERE status = 'Y' order by rand() LIMIT 1 ");
		$rLandingPage = $qLandingPage->row();
		
		
		if($this->session->userdata('papel') == 1){
		//pega o nome do cara pra mostrrar pro admin
			$qNomeAfiliado = $this->db->query("SELECT *, nome as nome_afiliado FROM usuarios WHERE id='".$rLandingPage->id_afiliado."'");
			$content['afiliado'] = $qNomeAfiliado->result_array();
			
		}
		
		// grava o id da squeeze no cookie
		if(!isset($_COOKIE['id_squeeze'])) setcookie('id_squeeze',$rLandingPage->id,time() + (586400 * 15));
		
		
		*/
		if(isset($_GET['ref'])){
			
			
		
			
			$id_parceiro = $_GET['ref'];
			
		
			$this->visitantes->insert_stats("NULL",$_GET['ref'],0);
			
			
			if(!isset($_COOKIE['id_parceiro'])) setcookie('id_parceiro',$id_parceiro,time() + (586400 * 15));
			
		
			/*
			
			$content_post['id_parceiro'] = $id_parceiro;
			
			
			$this->load->model("Inserir_model_public");
			$this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
			 */
			 
		
		}else{
			
			
			$this->visitantes->insert_stats("NULL",0,0);
			
		}
		
		
		$content['main_content'] = 'home';
		
		$this->parser->parse('includes/templates/template_none',$content);
		
		
	}

function array_multi_rand($Zoo){
    $Boo=array_rand($Zoo);
    if(is_array($Zoo[$Boo])){
        return array_multi_rand($Zoo[$Boo]);
    }else{
        return $Zoo[$Boo];
    }
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */