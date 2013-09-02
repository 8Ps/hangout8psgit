<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
		
	function __construct(){
		
		parent::__construct();
		$this->oauth->is_logged_in();
		
		$this->load->helper("date");
		date_default_timezone_set('America/Sao_Paulo');
		
	}
	
	######### lista de funcões ###########
	
	
	
	
	
	############# listar #############
	
	function lista_usuario(){
		
		//$this->output->enable_profiler(TRUE);
			
			
			$qUsuarios = $this->db->query("SELECT * FROM usuarios");
			$rUsuario = $qUsuarios->row();
			
			$array_usuarios = "";
			foreach($qUsuarios->result_array() as $usuario){
					
				if($usuario['id_afiliado'] == "") {
					
					$id_hotmart = 0;
					
				} else {
					
					$id_hotmart = $usuario['id_afiliado'];
					
				}	
				
				$qClicks = $this->db->query("SELECT * FROM clicks WHERE id_hotmart='".$id_hotmart."'");
				
				
				$array_usuarios[] = array('nome' => $usuario['nome'],'id' => $usuario['id'], 'email' => $usuario['email'],'cliques' => $qClicks->num_rows());
				
			}
			
			$dados = array(
				
				"usuarios" => $array_usuarios,
				"main_content" => "usuarios/admin/lista_usuarios_form",
			
			);
			
			if($this->uri->segment("4")) {
						
				$dados['div_message'] = "display:block";
				$dados['message_content'] = " Usuário ".$this->uri->segment("4"). " com sucesso!";
					
			}else{
			
				$dados['div_message'] = "display:none";
				$dados['message_content'] = " ";
			
			}
			
			$this->parser->parse("includes/templates/template",$dados);
			
			
			
		
		}
		
		
	function listar_papeis(){
		
			
			$qPapeis = $this->db->get("papeis");
			
			$dados = array(
				
				"papeis" => $qPapeis->result_array(),
				"main_content" => "usuarios/admin/lista_papeis_form",
			
			);
			
			$this->parser->parse("admin/includes/template",$dados);
		
		}
		############# end listar #################
		
		################# adiciona ###############
		// carrega o formulario add usuario
	function add_usuario(){
			
			
			
			$qPapeis = $this->db->get("papeis");
			
			
			$dados = array(
				
				"papeis" => $qPapeis->result_array(),
				"main_content" => "usuarios/admin/add_usuario_form",
				
			);
			
			$this->parser->parse("includes/templates/template",$dados);
			
			
		
		}
		
		
	function add_usuario_bd(){
		
		$datestring = "%Y-%m-%d  %h:%i";
		$agora = now();
			
		$data =  mdate($datestring, $agora);
			
			
			// criptografar senha //
			
		
			$this->load->library('encrypt');
			
			
			$senha_cript = $this->encrypt->encode($this->input->post("password"));
			
			
			$content_post = array(
			
			
				"nome" => $this->input->post("nome"),
				"email" => $this->input->post("email"),
				
				"endereco" => $this->input->post("endereco"),
				"username" => $this->input->post("username"),
				"id_afiliado" => $this->input->post("id_afiliado"),
				"id_papel" => $this->input->post("papel"),
				"status" => 1,
				"password" => $senha_cript,
			
			);
			
			
			$this->load->model("Inserir_model");
			$this->Inserir_model->inseri_modulo($content_post,"usuarios",false);
			
			
			
			
		
			// se for parceiro
			
			
			redirect(base_url().'usuarios/admin/lista_usuario/criado');
			
			
		
		}
		
	
		function add_papel_bd(){
		
			$content_post = array(
				
				"nome" => $_REQUEST['nome'],
			
			);
			
			
			
			$this->load->model("Inserir_model");
			$this->Inserir_model->inseri_modulo($content_post,"papeis",FALSE);
			
			$idInsert =  $this->db->insert_id();
			
			
			$dados_array = $_REQUEST['modulos'];
		
			
			foreach($dados_array as $dadoR){
			
				$content_post2['id_papel'] = $idInsert;
				$content_post2['id_modulo'] = $dadoR;
				
				$this->load->model("Inserir_model");
				$this->Inserir_model->inseri_modulo($content_post2,"papeis_usuarios",FALSE);
			
			
			}
			
			
				
			
			redirect(base_url()."usuarios/admin/listar_papeis");
		
		}
		
		
		function add_papel(){
		
			$qModulos = $this->db->get("modulos");
			
			$dados = array(
				
				"modulos" => $qModulos->result_array(),
				"main_content" => "usuarios/admin/add_papel_form",
				
			);
			
			$this->parser->parse("admin/includes/template",$dados);
				
		
		}
		
		############ end adiciona #############
		
		
		
		################ edita #################
		function editar_usuario(){
		
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			
			
			$qusuarios = $this->db->query("SELECT * FROM usuarios WHERE id='".$id."'");
			$rUsuarios = $qusuarios->row();
			
			
			
			
			$qPapeis = $this->db->query("SELECT papeis.nome as nome_papel, papeis.id as id_papel_t FROM papeis WHERE id <> '".$rUsuarios->id_papel."'");
			
			##### papel selecionado ####
			$qPapeisS = $this->db->query("SELECT usuarios.id, usuarios.id_papel as id_papel_s, papeis.id,papeis.nome as nome_papel_s FROM usuarios JOIN papeis ON usuarios.id_papel=papeis.id WHERE usuarios.id='".$id."'");
			$rPapeisS = $qPapeisS->row();
			
		
			
			$datestring = "%Y-%m-%d  %h:%i";
			$agora = now();
			$data =  mdate($datestring, $agora);
			
			
			
			
			$id_usuario = $this->uri->segment(4);
			
			$this->db->where("id",$id_usuario);
			$qusuarios = $this->db->get("usuarios");
		
			
			
			$dados = array(
			
				"main_content" => "usuarios/admin/editar_usuario_form",
				"usuario" => $qusuarios->result_array(),
				"papeis" => $qPapeis->result_array(),
				"papel_selecionado" => $qPapeisS->result_array(),
				"id_papel_sec" => $rPapeisS->id_papel_s,
				
				
			
			);
			
			
			
			$this->parser->parse("includes/templates/admin_template",$dados);
			
		
		}
		
		
		function edita_usuario_bd(){
			
			
			
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			
			if($this->input->post("password")){

				
				// criptografar senha //
				
				$this->load->library('encrypt');
			
				$senha_cript = $this->encrypt->encode($this->input->post("password"));

			}
			
			$content_post = array(
			
			
				"nome" => $this->input->post("nome"),
				"email" => $this->input->post("email"),
				"endereco" => $this->input->post("endereco"),
				"telefone" => $this->input->post("telefone"),
				
				
				"username" => $this->input->post("username"),
				"id_afiliado" => $this->input->post("id_afiliado"),
				"id_papel" => $this->input->post("papel"),
				"status" => 1,
				
				"id" => $id,
				
			
			);
			
		
			
			
			if($this->input->post("papel")) $content_post['id_papel'] = $this->input->post("papel");
			if($this->input->post("password")) $content_post['password'] = $senha_cript;
			if($this->input->post("username")) $content_post['username'] = $this->input->post("username");
			
			
			$this->load->model("Edita_model");
			$this->Edita_model->edita_modulo($content_post,"usuarios","usuarios/admin/lista_usuario/editado");
		
		}
		
		
	 function edita_minha_conta_bd(){
			
			$key = "dohler_sa";
			
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			
			if($this->input->post("senha")){

				
				// criptografar senha //
				
				$this->load->library('encrypt');
			
				$senha_cript = $this->encrypt->encode($this->input->post("senha"), $key);

			}
			
			$content_post = array(
			
			
				"nome" => $this->input->post("nome"),
				"sobrenome" => $this->input->post("sobrenome"),
				"email" => $this->input->post("email"),
				"telefone" => $this->input->post("telefone"),
				"celular" => $this->input->post("celular"),
				
				"endereco" => $this->input->post("endereco"),
				"cidade" => $this->input->post("cidade"),
				"estado" => $this->input->post("estado"),
				"id" => $id,
				
			
			);
			
			
		
			if($this->input->post("password")) $content_post['senha'] = $senha_cript;
			if($this->input->post("senha")) $content_post['username'] = $this->input->post("username");
			
			
			$this->load->model("Edita_model");
			$this->Edita_model->edita_modulo($content_post,"usuarios","admin");
		
		}
		
		
		function editar_papel(){
			
			
			$this->load->helper('form');
		
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			$this->db->where("id",$id);
			$qPapel = $this->db->get("papeis");
			
			$rPapel = $qPapel->row();
			
			
			$qModulos = $this->db->get("modulos");
			
			foreach($qModulos->result_array() as $modulos){
			
				
				$qPapeisModulos = $this->db->query("SELECT * FROM papeis_usuarios WHERE id_papel='".$id."' AND id_modulo='".$modulos['id']."'");
				
				//$modulos['ativo'] = $qPapeisModulos->num_rows();
				//$arrModulos[] = $modulos;
				
				// verifica se está marcado no papeis, se sim atribui um checked
				if($qPapeisModulos->num_rows() > '0'){
				
					$dados_forms[] = array(   
				
						'nome'        => $modulos['nome'],
		    			'id_papel'          => $modulos['id'],
		    			'value'       => $modulos['id'],
		    			'checked'     => "checked='checked'",
		    			'style'       => 'margin:10px'
				
					);
				}
				else {
				
					$dados_forms[] = array(   
				
						'nome'        => $modulos['nome'],
		    			'id_papel'          => $modulos['id'],
		    			'value'       => $modulos['id'],
		    			'checked'     => '',
		    			'style'       => 'margin:10px'
				
					);
				
				}
				
				
			
			}
			
			
			
			$dados = array(
			
				"main_content" => "usuarios/admin/edita_papel_form",
				"modulos" => $dados_forms,
				"papel_nome" => $rPapel->nome,
				"papel_id" => $rPapel->id,
				
			);
			
			$this->parser->parse("admin/includes/template",$dados);
			
			
			
			
		
		}
		
		
		function edita_papel_bd(){
		
			$id = $this->uri->segment("4");
			$modulos = $_POST['modulos'];
			
			
			
			$this->load->model("deleta_model");
			$this->deleta_model->deleta_papeis('papeis_usuarios',$id);
			
			
			$dados_array = $modulos;
		
			
			foreach($dados_array as $dadoR){
				
				$content_post2['id_papel'] = $id;
				$content_post2['id_modulo'] = $dadoR;
				
				$this->load->model("Inserir_model");
				$this->Inserir_model->inseri_modulo($content_post2,"papeis_usuarios",FALSE);
			
			
			}
			
			redirect(base_url()."usuarios/admin/listar_papeis/atualizado");
		
		
		}
		
		############## end edita ################
		
	
		
		################ deleta #################
		
		function deletar_usuario(){
		
			
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			$this->load->model("Deleta_model");
			
			$this->Deleta_model->deleta_modulo("usuarios","usuarios/admin/lista_usuario/deletado",$id);
			
			
		
			
		
		}
		
		
		function deletar_papel(){
		
			
			if(is_numeric($this->uri->segment("4"))) $id = $this->uri->segment("4");
			
			$this->load->model("Deleta_model");
			
			$this->Deleta_model->deleta_modulo("papeis","usuarios/admin/listar_papeis/deletado",$id);
		
			
		
		}
		
		function minha_conta(){

			$usuario = $this->db->query("SELECT * FROM usuarios WHERE id='".$this->session->userdata('id_user')."'");
			
			$dados = array(

				"main_content" => "usuarios/admin/minha_conta",
				"usuario" => $usuario->result_array(),
			
			);
			
			$this->parser->parse("includes/templates/admin_template",$dados);
			
				
		}
		
		
		
		############### financeiro usuários #############
		
		function financeiro(){
		
			$datestring = "%Y-%m-%d  %h:%i";
			$agora = now();
			$data =  mdate($datestring, $agora);
		
			$id_usuario = $this->uri->segment('4');
			
			$qUsuario = $this->db->query("SELECT * FROM usuarios WHERE id='".$id_usuario."'");
			$qPagamentos = $this->db->query("SELECT *, pagamentos_usuarios.id as pag_id, pacotes.nome as nome_pacote, date_format(data_pagamento,'%d/%m/%Y') as data_pagamento,DATEDIFF('".$data."',data_pagamento) as tempo_pagamento_dias FROM pagamentos_usuarios JOIN pacotes ON pagamentos_usuarios.id_pacote=pacotes.id WHERE id_usuario ='".$id_usuario."' ORDER by month(data),day(data) DESC");
			$rPagamentos = $qPagamentos->row();
			
			
			
			
			
			$dados['main_content'] = 'usuarios/admin/financeiro';
			$dados['pagamentos'] = $qPagamentos->result_array();
			$dados['usuario'] = $qUsuario->result_array();
			
			
			$this->parser->parse("admin/includes/template",$dados);
		
		}
		
	
		
		function stats(){
			
			
			$id_usuario = $this->uri->segment(4);
			$qUsuario = $this->db->query("SELECT * FROM usuarios WHERE id='".$id_usuario."'");
			$rUsuario = $qUsuario->row();
			
			$qLandingPages = $this->db->query("SELECT * FROM landing_pages WHERE id_afiliado ='".$id_usuario."'");
			/*
			
			foreach($qLandingPages->result_array() as $page){
						
					$qVisitas = $this->db->query("SELECT * FROM web_stats WHERE id_landing_page")	
					$array_landing_pages[] = array('nome' => $page['nome'],)
				
			}
			*/
			//visitas
			$qVisitas = $this->db->query("SELECT * FROM web_stats WHERE id_afiliado='".$id_usuario."'");
			$qLeads =  $this->db->query("SELECT * FROM clicks WHERE id_parceiro ='".$id_usuario."'");
			
			
			$dados['main_content'] = "usuarios/admin/stats";
			$dados['visitas'] = $qVisitas->num_rows();
			$dados['leads'] =  $qLeads->num_rows();
			$dados['porcentagem'] = ($qVisitas->num_rows / $qLeads->num_rows());
			
			$this->parser->parse("includes/templates/admin_template",$dados);
			
			
			
		}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */