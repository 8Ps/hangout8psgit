<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		$this->oauth->is_logged_in();
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->helper("date");
		//$this->output->enable_profiler(TRUE);
		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		// grava o id da squeeze no banco
	
		
		
		// contabiliza o rank em tempo real
			$qPosicao = $this->db->query("SELECT *,count(id_parceiro) as total FROM clicks GROUP By id_parceiro ORDER BY total DESC");
			
			$array_numeros = 0;// usado pra sbaer qual index atual está o array
			$rank = 1;
			$pontos = array();
			
			// limpa a tabela/
			$this->db->empty_table('rank');
			
			
			foreach($qPosicao->result_array() as $posicao){
				
				if(isset($posicao['id_parceiro'])) { 
				//$pontos[] = array('posicao' => $rank,'dados' => $posicao);
					
				 	$content_post ="";
					$content_post['id_parceiro'] = $posicao['id_parceiro'] ;
					$content_post['rank'] = $rank;
					$content_post['total_leads'] = $posicao['total'];
					
					
				 	$this->load->model("Inserir_model");
					$this->Inserir_model->inseri_modulo($content_post,"rank",false);
				
					
					
					
					$rank++;
					$array_numeros++;
					
				}
			}
			
			
			#### rank visitas ########
			// primeiro vamos inserir as taxas de conversão e depois vamos lsitar por taxa para então rankear
			/*
		$this->db->empty_table('rank_visitas');
		
		### CONTABILIZA TAXA ###
		$qUsuariosSqueeze = $this->db->query("SELECT *,landing_pages.id as id_landing_page, usuarios.id as id_usuario, usuarios.id_afiliado as id_hotmart FROM landing_pages JOIN usuarios ON landing_pages.id_afiliado=usuarios.id WHERE landing_pages.status='Y'  GROUP by landing_pages.id_afiliado ");
		
		
			$array_numeros = 0;// usado pra sbaer qual index atual está o array
			
			$pontos_visitas = array();
			
			
		foreach($qUsuariosSqueeze->result_array() as $usuario_squeeze){
			
			$array_users_squeeze = "";
			
			// pega o total de leds da squeeze
			$qLeadsSqueeze = $this->db->query("SELECT * FROM clicks WHERE id_landing_page ='".$usuario_squeeze['id_landing_page']."'");
			
			
			// visitas da Squeeze
			$qVisitasSqueeze = $this->db->query("SELECT * FROM web_stats WHERE id_landing_page ='".$usuario_squeeze['id_landing_page']."' GROUP by ip");
			
			
			
			
			
			// calcula a porecentam
			// se não tiver nenhum lead a divisão não pode ser zero então a taxa é 0
			
			if($qLeadsSqueeze->num_rows() > 0 AND $qVisitasSqueeze->num_rows() > 0){
				
				$TaxaUser = ( $qLeadsSqueeze->num_rows() / $qVisitasSqueeze->num_rows()  * 100);
				
				
			}else{
						
					$TaxaUser = 0;
				
			}
			
			
			$content_post ="";
			$content_post['id_parceiro'] = $usuario_squeeze['id_usuario'] ;
			
			$content_post['total_visitas'] = $qVisitasSqueeze->num_rows();
			$content_post['total_leads'] = $qLeadsSqueeze->num_rows();
			$content_post['taxa'] = round($TaxaUser,2);
			
			
			
				
			$this->load->model("Inserir_model");
			$this->Inserir_model->inseri_modulo($content_post,"rank_visitas",false);
				
				
			
			
			$array_numeros++;
			
			
			
		}
			 * */
		
		/*
		######### roda a lista por taxa e gera o rank ######
		
		$qListaRank = $this->db->query("SELECT * FROM `rank_visitas` ORDER By (total_leads/total_visitas*100) DESC");
		
		$rank = 1;
		
		foreach($qListaRank->result_array() as $lista_rank){
						
			$array_numeros = 0;// usado pra sbaer qual index atual está o array
			
			$pontos = array();
				
			$content_post = "";
			$content_post['rank'] = $rank;
			$content_post['id'] = $lista_rank['id'];
			
			$this->load->model("Edita_model");
			$this->Edita_model->edita_modulo($content_post,"rank_visitas",FALSE);	
			
			$rank++;
			$array_numeros++;
				
			
		}
			

  ######## end rank ##########

		 * */
		//se não for admin conta quantas landing pages tem se tiver uma não deixa criar outra
		if($this->session->userdata('papel') != 1){
			
			
			
		
			$TotalLandingPages = $this->db->query("SELECT * FROM  landing_pages WHERE id_afiliado='".$this->session->userdata('id_user')."'");
			$RTotalLandingPages = $TotalLandingPages->row();
			
			
			
			$qUsuarios = $this->db->query("SELECT * FROM  usuarios WHERE id='".$this->session->userdata('id_user')."'");
			$rUsuario = $qUsuarios->row();
			
			// verifica posicao atual
			$qPosicaoAtual = $this->db->query("SELECT * FROM rank WHERE id_parceiro='".$this->session->userdata('id_user')."'");
			$rPosicaoAtual = $qPosicaoAtual->row();
			
			
			// verifica se tem dados de rank se não está zerado
			
			if($qPosicaoAtual->num_rows() > 0){
			
				// se estiver em primeiro
				if(isset($rPosicaoAtual->rank) AND $rPosicaoAtual->rank == 1){
					
					$dados['minha_posicao'] = $rPosicaoAtual->rank;
					
					// posicao acima
					$qPosicaoAbaixo= $this->db->query("SELECT * FROM rank WHERE rank > '".$rPosicaoAtual->rank."'");
					$rPosicaoAbaixo = $qPosicaoAbaixo->row();
					
					
				} else {
				
					// posicao do cara abaixo
					
				
					$qPosicaoAcima = $this->db->query("SELECT * FROM rank WHERE rank < '".$rPosicaoAtual->rank."'");
					$rPosicaoAcima = $qPosicaoAcima->row();
					
					
					// posicao acima
					$qPosicaoAbaixo= $this->db->query("SELECT * FROM rank WHERE rank > '".$rPosicaoAtual->rank."'");
					$rPosicaoAbaixo = $qPosicaoAbaixo->row();
					
				
					
				
				
				}
				
				$dados['minha_posicao'] = $rPosicaoAtual->rank;
				
				if(isset($rPosicaoAcima->rank)) {
					
					
					 $dados['rank_posicao_acima'] = $rPosicaoAcima->total_leads; 
					 $dados['posicao_acima'] = $rPosicaoAcima->rank;
					 
				} else {
					
					 $dados['rank_posicao_acima'] = 0;
					 $dados['posicao_acima'] = 0;			
				}
				
				
				
				if(isset($rPosicaoAbaixo->rank)) {
					
				
					
					 $dados['posicao_abaixo'] = $rPosicaoAbaixo->rank;
					 $dados['rank_posicao_abaixo'] = $rPosicaoAtual->total_leads - $rPosicaoAbaixo->total_leads ; 
					 } else {
					 	
						 $dados['rank_posicao_abaixo'] = 0;
						 $dados['posicao_abaixo'] = 0;
					 
					 }
				
				
				$dados['id_afiliado'] = $rUsuario->id_afiliado;
				
			
			}else{
				
				// zera todos os dados
				
				$dados['clicks'] = 0;
				$dados['minha_posicao'] = 0;
				$dados['rank_posicao_abaixo'] = 0;
				$dados['rank_posicao_acima'] = 0;
				$dados['posicao_acima'] = 0;
				$dados['posicao_abaixo'] = 0; 
				
				
				
			}
			
			
		}

//id afiliado usuario = id_hotmart
		
		// Top Afiliados por Leads
		$qClicks = $this->db->query("SELECT * FROM rank JOIN usuarios ON rank.id_parceiro=usuarios.id ORDER by rank ASC");
		
		// top batalha de squeeze
		$qBSqueeze = $this->db->query("SELECT * FROM rank_visitas JOIN usuarios ON rank_visitas.id_parceiro=usuarios.id order BY RANK ASC");
		
		// squeeze não aprovadas
		$qSqueezesAprovar = $this->db->query("SELECT *,landing_pages.id as id_l, usuarios.status as user_status, usuarios.nome as nome_usuario FROM landing_pages JOIN usuarios ON landing_pages.id_afiliado=usuarios.id WHERE landing_pages.status ='N'");
		
		if($this->session->userdata('papel') != 1){
			
		
			if($TotalLandingPages->num_rows() >= 1){
				
					// se for afiliado mostra o total de visitas da equeeze
				$StatsSqueeze = $this->db->query("SELECT * FROM web_stats WHERE id_landing_page ='".$RTotalLandingPages->id."' GROUP by ip");	
				$dados['visitas_squeeze'] = $StatsSqueeze->num_rows();	
				}else{
							
						$dados['visitas_squeeze'] = 0;
					
			}
			
			if($qPosicaoAtual->num_rows() > 0) $dados['clicks'] = $rPosicaoAtual->total_leads;
		}
		
		$qUsuario = $this->db->query("SELECT * FROM clicks WHERE id_hotmart='".$this->session->userdata('id_user')."'");
		
		
		$dados['top_parceiros_leads'] = $qClicks->result_array();
		$dados['top_batalha_squeeze'] = $qBSqueeze->result_array();
		$dados['aprova_squeeze'] = $qSqueezesAprovar->result_array();
		$dados['pagina'] = 'ranking_leads';
		$dados['main_content'] = 'membros/home';
		if(isset($TotalLandingPages)) {
			
			$rTotalLandingPages = $TotalLandingPages->row();
			
			 $dados['total_landing_pages'] = $TotalLandingPages->num_rows();
			 
			 if($TotalLandingPages->num_rows() > 0) $dados['id_landing_page'] = $rTotalLandingPages->id;
			 
		};
		
		
		
		
		
		$this->parser->parse('includes/templates/admin_template',$dados);
		
	}

	function batalha_leads(){
		
		
		
		// contabiliza o rank em tempo real
		
		// primeiro vamos inserir as taxas de conversão e depois vamos lsitar por taxa para então rankear
		//$this->db->empty_table('rank_visitas');
		
		
		### CONTABILIZA TAXA ###
		$qUsuariosSqueeze = $this->db->query("SELECT *,landing_pages.id as id_landing_page, usuarios.id as id_usuario, usuarios.id_afiliado as id_hotmart FROM landing_pages JOIN usuarios ON landing_pages.id_afiliado=usuarios.id WHERE landing_pages.status='Y' GROUP by landing_pages.id_afiliado");
		
		
			$array_numeros = 0;// usado pra sbaer qual index atual está o array
			
			$pontos_visitas = array();
			
			
		foreach($qUsuariosSqueeze->result_array() as $usuario_squeeze){
			
			$array_users_squeeze = "";
			
			// pega o total de leds da squeeze
			$qLeadsSqueeze = $this->db->query("SELECT * FROM clicks WHERE id_landing_page ='".$usuario_squeeze['id_landing_page']."'");
			
			
			// visitas da Squeeze
			$qVisitasSqueeze = $this->db->query("SELECT * FROM web_stats WHERE id_landing_page ='".$usuario_squeeze['id_landing_page']."' GROUP by ip");
			
			// calcula a porecentam
			// se não tiver nenhum lead a divisão não pode ser zero então a taxa é 0
			
			if($qLeadsSqueeze->num_rows() > 0){
				
				$TaxaUser = ($qLeadsSqueeze->num_rows() / $qVisitasSqueeze->num_rows() * 100);
				
			}else{
						
					$TaxaUser = 0;
				
			}
			
			
			$content_post ="";
			$content_post['id_parceiro'] = $usuario_squeeze['id_usuario'] ;
			
			$content_post['total_visitas'] = $qVisitasSqueeze->num_rows();
			$content_post['total_leads'] = $qLeadsSqueeze->num_rows();
			$content_post['taxa'] = round($TaxaUser,2);
			
			
			
				
			$this->load->model("Inserir_model");
			//$this->Inserir_model->inseri_modulo($content_post,"rank_visitas",false);
				
				
			
			
			$array_numeros++;
			
			
			
		}
		
		
		### END CONTABILIZA TAXA ###
		
		######### roda a lista por taxa e gera o rank ######
		
		
		$qListaRank = $this->db->query("SELECT * FROM rank_visitas ORDER By (total_leads/total_visitas*100) DESC");
		
		$rank = 1;
		
		foreach($qListaRank->result_array() as $lista_rank){
						
			$array_numeros = 0;// usado pra sbaer qual index atual está o array
			
			$pontos = array();
				
			$content_post = "";
			$content_post['rank'] = $rank;
			$content_post['id'] = $lista_rank['id'];
			
			$this->load->model("Edita_model");
			//$this->Edita_model->edita_modulo($content_post,"rank_visitas",FALSE);	
			
			$rank++;
			$array_numeros++;
				
			
		}
		 
		
		######### fim de contabilizar rank de visitas
		
		//id da minha squeeze
		$qMinhaLanding = $this->db->query("SELECT * FROM landing_pages WHERE id_afiliado='".$this->session->userdata('id_user')."' LIMIT 1");
		$rMinhaLanding =  $qMinhaLanding->row();
		
		// leads da squeeze
		$qMLeadsSqueeze = $this->db->query("SELECT * FROM clicks WHERE id_landing_page ='".$rMinhaLanding->id."'");
		$rMLeadsSqueeze = $qLeadsSqueeze->row();
		
		// visitas da Squeeze
		$qMVisitasSqueeze = $this->db->query("SELECT * FROM web_stats WHERE id_landing_page ='".$rMinhaLanding->id."' GROUP by ip");
		$rMVisitasSqueeze = $qVisitasSqueeze->row();
		
		// conta a porcentagem 
	
		// minha conversao
		// se leads for zero a taxa será zero
		
		if($qMLeadsSqueeze->num_rows() > 0){
			
			$MinhaTaxa = ($qMLeadsSqueeze->num_rows() / $qMVisitasSqueeze->num_rows() * 100);
				
		}else{
			
			$MinhaTaxa = 0;
		}
		
		
		$dados['minha_conversao'] = round($MinhaTaxa);
		
			$qPosicaoVisita = $this->db->query("SELECT *,count(id_parceiro) as total FROM clicks GROUP By id_parceiro ORDER BY total DESC");
			
			
			
			
		
		


			$TotalLandingPages = $this->db->query("SELECT * FROM  landing_pages WHERE id_afiliado='".$this->session->userdata('id_user')."'");
			$RTotalLandingPages = $TotalLandingPages->row();
			
			if($TotalLandingPages->num_rows()  == 0){
				
				redirect(base_url()."membros/home/error_semlanding");
				
			}
			
			$qUsuarios = $this->db->query("SELECT * FROM  usuarios WHERE id='".$this->session->userdata('id_user')."'");
			$rUsuario = $qUsuarios->row();
			
			
			
			// verifica posicao atual
			$qPosicaoAtual = $this->db->query("SELECT * FROM rank_visitas WHERE id_parceiro='".$this->session->userdata('id_user')."'");
			$rPosicaoAtual = $qPosicaoAtual->row();
			
			if($qPosicaoAtual->num_rows() > 0){
				
				// se estiver em primeiro
				if(isset($rPosicaoAtual->rank) AND $rPosicaoAtual->rank == 1){
					
					$dados['minha_posicao'] = $rPosicaoAtual->rank;
					
					// posicao acima
					$qPosicaoAbaixo= $this->db->query("SELECT * FROM rank_visitas WHERE rank > '".$rPosicaoAtual->rank."'");
					$rPosicaoAbaixo = $qPosicaoAbaixo->row();
					
					
				} else {
				
					// posicao do cara abaixo
					
				
					$qPosicaoAcima = $this->db->query("SELECT * FROM rank_visitas WHERE rank < '".$rPosicaoAtual->rank."'");
					$rPosicaoAcima = $qPosicaoAcima->row();
					
					
					// posicao acima
					$qPosicaoAbaixo= $this->db->query("SELECT * FROM rank_visitas WHERE rank > '".$rPosicaoAtual->rank."'");
					$rPosicaoAbaixo = $qPosicaoAbaixo->row();
					
				
					
				
				
				}
				
				$dados['minha_posicao'] = $rPosicaoAtual->rank;
			
			}else{
				
				$dados['minha_posicao'] = 0;
				
			}
			
			if(isset($rPosicaoAcima->rank)) {
				
				
				 $dados['rank_posicao_acima'] = abs($rPosicaoAcima->total_leads - $rPosicaoAcima->total_visitas); 
				 $dados['posicao_acima'] = $rPosicaoAcima->rank;
				 
			} else {
				
				 $dados['rank_posicao_acima'] = 0;
				 $dados['posicao_acima'] = 0;			
			}
			
			
			
			if(isset($rPosicaoAbaixo->rank)) {
				
			
				
				 $dados['posicao_abaixo'] = $rPosicaoAbaixo->rank;
				 $dados['rank_posicao_abaixo'] = abs($rPosicaoAbaixo->total_leads - $rPosicaoAbaixo->total_visitas); 
				 } else {
				 	
					 $dados['rank_posicao_abaixo'] = 0;
					 $dados['posicao_abaixo'] = 0;
				 
				 }
			
			
			$dados['id_afiliado'] = $rUsuario->id_afiliado;
			
			
			// visitas squeeze
			if($TotalLandingPages->num_rows() >= 1){
			// se for afiliado mostra o total de visitas da equeeze
				$StatsSqueeze = $this->db->query("SELECT * FROM web_stats WHERE id_landing_page ='".$RTotalLandingPages->id."' GROUP by ip");	
				$dados['visitas_squeeze'] = $StatsSqueeze->num_rows();	
				}else{
							
						$dados['visitas_squeeze'] = 0;
					
			}
				
				// leads da squeeze
				$qLeadsSqueeze = $this->db->query("SELECT * FROM clicks WHERE id_parceiro='".$this->session->userdata('id_user')."'");
				

			$dados['leads'] = $qMLeadsSqueeze->num_rows();
			$dados['visitas'] = $qMVisitasSqueeze->num_rows();
			
			$dados['pagina'] = 'ranking_batalha';
			$dados['main_content'] = 'membros/batalha_squeeze';
			
			if(isset($TotalLandingPages)) {
			
			$rTotalLandingPages = $TotalLandingPages->row();
			
			 $dados['total_landing_pages'] = $TotalLandingPages->num_rows();
			 $dados['id_landing_page'] = $rTotalLandingPages->id;
			 
		};
		
		
		
		
		
		
		$this->parser->parse('includes/templates/admin_template',$dados);
			
			
			
		
		
	}

	function error_semlanding(){
		
		$dados['main_content'] = 'membros/erro_landing';
		$this->parser->parse('includes/templates/admin_template',$dados);
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */