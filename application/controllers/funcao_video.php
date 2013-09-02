<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcao_video extends CI_Controller {

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
	public function index()
	{
		
		
		// se ja tem o cookie manda pro video
			
								
			
				
			// verifica se veio do e-mail
			if(isset($_GET['email'])){
				
				$this->verifica_email($_GET['email']);
				
			}else{
				
				
				
				$email = $this->input->post('email');
				$this->verifica_lead($email);
				
			}
			
			
		
		}
	
	
	function verifica_email($email){
		
			
			
			// pega as referencias do lead
			$qReferenciaLead = $this->db->query("SELECT * FROM emails WHERE id_hotmart <> '' AND email LIKE '%".$email."%' ORDER by id DESC LIMIT 1");
			$rReferenciaLead = $qReferenciaLead->row();
			
			
			// verifica se é lead
			$qVerificaLead = $this->db->query("SELECT * FROM clicks WHERE email='".$email."'");
			
			
			// tem referencia nos e-mails?
			// verifica se já não é lead, se já for lead pula fora dessa etapa
			if($qReferenciaLead->num_rows() > 0 AND $qVerificaLead->num_rows() < 0 ){
				
				
				
						
					//pega id parceiro
					$qidParceiro = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado LIKE  '%".$rReferenciaLead->id_hotmart."%'");
						
					
					if($qidParceiro->num_rows() > 0){
						
					
						
						
						$ridParceiro = $qidParceiro->row();
						
						$content_post['id_parceiro'] = $ridParceiro->id;
						
						
						if(isset($rReferenciaLead->id_squeeze)) $content_post['id_landing_page'] = $rReferenciaLead->id_squeeze;
						if(isset($rReferenciaLead->email)){ $content_post['email'] = $rReferenciaLead->email; } 
						else $content_post['email']  = $email;
						if(isset($rReferenciaLead->id_hotmart)){ $content_post['id_hotmart'] = $rReferenciaLead->id_hotmart; }
						
							
							if(!isset($_COOKIE['confirmado'])){
								
								
							
								
								setcookie('confirmado',1,time() + (586400 * 15),'/');
								setcookie('email_lead',$email,time() + (586400 * 15),'/');
								
								
								
								$this->load->model("Inserir_model_public");
								$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
								
								if(isset($_COOKIE['ref_page'])) $ref_page = $_COOKIE['ref_page'];
									else{
										
										$ref_page = 'video1';
									}
									redirect(base_url().'obrigado?page='.$ref_page);
						
						
							}
					
					
						
						
					}else{
						
						/*
						if(isset($rReferenciaLead->id_parceiro) AND !isset($_COOKIE['id_parceiro'])){ $content_post['id_parceiro'] = '3783'; }	
						else if(isset($_COOKIE['id_parceiro'])) { $content_post['id_parceiro'] = $_COOKIE['id_parceiro']; }
						else{
							
							$content_post['id_parceiro'] = '3783';
						}
						 * */ 
						 redirect(base_url().$_COOKIE['ref_page'].'?semid=1');	
						
					}
					
				
				
			// se não tem a referencia gera o lead com id do Conrado
			 }else{
			 	
				
				
				
				if($qVerificaLead->num_rows() > 0){
					
				
					
					// se tiver o id de admin verifica qual o id_parceiro do cookie e coloca como parceiro //
					$rVerificaLead = $qVerificaLead->row();
					
					if(isset($rVerificaLead->id_parceiro) AND $rVerificaLead->id_parceiro == '3783' AND isset($_COOKIE['id_parceiro'])){
						
						
						$content_post['id_parceiro'] = $_COOKIE['id_parceiro'];
						
						
						########## acao gera o lead ###########
						
						if(isset($_COOKIE['id_squeeze'])) $content_post['id_squeeze'] = $_COOKIE['id_squeeze'];
						if(isset($rReferenciaLead->email)){ $content_post['email'] = $email; } 
						 $content_post['id_hotmart'] = $_COOKIE['id_parceiro'];
						
							
							if(!isset($_COOKIE['confirmado'])){
								
								
								
								setcookie('confirmado',1,time() + (586400 * 15),'/');
								setcookie('email_lead',$email,time() + (586400 * 15),'/');
								
								
								
								$this->load->model("Inserir_model_public");
								$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
								
								if(isset($_COOKIE['ref_page'])) $ref_page = $_COOKIE['ref_page'];
								else{
									
									$ref_page = 'video1';
								}
								
								redirect(base_url().$ref_page);	
						
						
							}
				
						
						
					
						
					}else{
						
						
								if(isset($_COOKIE['ref_page'])) $ref_page = $_COOKIE['ref_page'];
								else{
									
									$ref_page = 'video1';
								}
								
								setcookie('check_video',1,time() + (586400 * 15),'/');
								setcookie('confirmado',1,time() + (586400 * 15),'/');
								
								sleep(1);
										
								
								redirect(base_url().$ref_page);	
						
						
				
				
				
						
					}
					
				}else{
					
						// se não é lead envia pra squeeze
						redirect(base_url());
						
						if(isset($rReferenciaLead->id_squeeze)) $content_post['id_landing_page'] = $rReferenciaLead->id_squeeze;
						if(isset($rReferenciaLead->email))  $content_post['email']  = $email; 
						if(isset($_COOKIE['id_parceiro'])){
							
							$IdAfiliado = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado='".$_COOKIE['id_parceiro']."'");
							$rIdAfiliado = $IdAfiliado->row();
						    $content_post['id_parceiro'] = $rIdAfiliado->id;

						}else{
							
							$content_post['id_parceiro'] = '3783';
							
						}
			
				
						if(!isset($_COOKIE['confirmado'])){
							
							
						
							
							setcookie('confirmado',1,time() + (586400 * 15),'/');
							setcookie('email_lead',$email,time() + (586400 * 15),'/');
							
							
							
							$this->load->model("Inserir_model_public");
							$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
							
							if(isset($_COOKIE['ref_page'])) $ref_page = $_COOKIE['ref_page'];
								else{
									
									$ref_page = 'video1';
								}
								redirect(base_url().'obrigado?page='.$ref_page);
					
					
						}
								
					}
			 	
			 	
				
				
			 }

			/*
			if(isset($rReferenciaLead->id_squeeze)) $content_post['id_landing_page'] = $rReferenciaLead->id_squeeze;
			if(isset($rReferenciaLead->email))  $content_post['email']  = $email; 
			if(isset($_COOKIE['id_parceiro'])){ $content_post['id_parceiro'] = $_COOKIE['id_parceiro'];}
			
				
				if(!isset($_COOKIE['confirmado'])){
					
					
				
					
					setcookie('confirmado',1,time() + (586400 * 15),'/');
					setcookie('email_lead',$email,time() + (586400 * 15),'/');
					
					
					
					$this->load->model("Inserir_model_public");
					$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
					
					redirect(base_url().$this->uri->segment(1));	
			
			
				}
			  */
	
		
	}
	
	function inserir_aweber($email){
			
			//seleciona o app com menos de 50 requets
			$qApps = $this->db->query("SELECT * FROM apps_aweber WHERE total_quers < 55 ORDER by id DESC LIMIT 1");
			
			 
		
			
		if($qApps->num_rows() > 0){
			
				require_once('aweber/aweber_api/aweber_api.php');
				require_once('aweber/tests/mock_adapter.php');
				
				
				$rApps = $qApps->row();
				
				$consumerKey = $rApps->consumerkey;
				$consumerSecret = $rApps->consumerkeysecret;
				$accessKey = $rApps->token;
				$accessSecret = $rApps->token_secret;
				$account_id = $rApps->account_id;
				$list_id = $rApps->list_id;
				
				$aweber = new AWeberAPI($consumerKey, $consumerSecret);
		
			
			
			// pega o número atual de requisições e coloca mais 1;
			$nrequisicoes_atual = $rApps->total_quers+1;
			
			$content_post_app['id'] = $rApps->id;
			$content_post_app['total_quers'] = $nrequisicoes_atual;
			
			// coloca o número de requisições
			$this->load->model("Edita_model_public");
			$editar = $this->Edita_model_public->edita_modulo($content_post_app,"apps_aweber",false);
			
		
			try {
				
				
					
					$account = $aweber->getAccount($accessKey, $accessSecret);
				    $listURL = "/accounts/{$account_id}/lists/{$list_id}";
				    $list = $account->loadFromUrl($listURL);
				
				    # create a subscriber
				    $params = array(
				        'email' => $email,
				        
				    );
				    $subscribers = $list->subscribers;
				    $new_subscriber = $subscribers->create($params);
					
					//gera o lead
					
					//verifica se tem id de afiliado nos emails
					$qCheckAfiliado = $this->db->query("SELECT * FROM emails WHERE email LIKE '%".$email."%'");
					if($qCheckAfiliado->num_rows() > 0){
						
						$rCheckAfiliado = $qCheckAfiliado->row();
						if($rCheckAfiliado->id_parceiro > 0) $content_post['id_parceiro'] = $rCheckAfiliado->id_parceiro;
						else{
							
							if(isset($_COOKIE['id_parceiro'])) {
								
								
								$qIdParceiro = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado='".$_COOKIE['id_parceiro']."'");
									
								$rIdParceiro = $qIdParceiro->row();
								$content_post['id_parceiro'] = $rIdParceiro->id;
								
								
							}
							else{
								
								$content_post['id_parceiro'] = '3783';
							}
						}	
						
					}elseif(isset($_COOKIE['id_parceiro'])){
						
						//log_message('2', 'ok');
						
						
						//pega o id do parceiro
						$qIdParceiro = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado='".$_COOKIE['id_parceiro']."'");
						if($qIdParceiro->num_rows() > 0){
							
							$rIdParceiro = $qIdParceiro->row();
							$content_post['id_parceiro'] = $rIdParceiro->id;
								
						}else{
							
							
							$content_post['id_parceiro'] = 3783;	
						}
						
						
					}
					else{
						
						
						
						$content_post['id_parceiro'] = 3783;	
						
					}
					$content_post['email'] = $email;
					if(isset($_COOKIE['id_squeeze'])) $content_post['id_landing_page'] = $_COOKIE['id_squeeze'];
					
												
					$this->load->model("Inserir_model_public");
					$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
					
					sleep(2);
					// caso contrário ele já é lead então só direciona pro vídeo
					setcookie('checked',1,time() + (586400 * 15),'/');
											
					sleep(2);
					if(isset($_COOKIE['ref_page'])) { $ref_page = $_COOKIE['ref_page'];}
					else{
									
								$ref_page = 'video1';
							
						
					}
					redirect(base_url().'obrigado/?page='.$ref_page);
										
												
					return true;
				
					
			}catch(AWeberAPIException $exc) {
				
					
				$qCheckAfiliado = $this->db->query("SELECT * FROM emails WHERE email LIKE '%".$email."%'");
				if($qCheckAfiliado->num_rows() > 0){
					
						$rCheckAfiliado = $qCheckAfiliado->row();
						if($rCheckAfiliado->id_parceiro > 0) $content_post['id_parceiro'] = $rCheckAfiliado->id_parceiro;
						else{
							
							if(isset($_COOKIE['id_parceiro'])) {
								
								
								$qIdParceiro = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado='".$_COOKIE['id_parceiro']."'");
									
								$rIdParceiro = $qIdParceiro->row();
								$content_post['id_parceiro'] = $rIdParceiro->id;
								
							}
							else{
								
								$content_post['id_parceiro'] = '3783';
							}
						}	
						
					
					
				}elseif(isset($_COOKIE['id_parceiro'])){
					
				
					
					
					//pega o id do parceiro
					$qIdParceiro = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado='".$_COOKIE['id_parceiro']."'");
					if($qIdParceiro->num_rows() > 0){
						
						$rIdParceiro = $qIdParceiro->row();
						$content_post['id_parceiro'] = $rIdParceiro->id;
							
					}else{
							
						$content_post['id_parceiro'] = 3783;	
					}
					
					
				}
				else{
					
					
					
					$content_post['id_parceiro'] = 3783;	
					
				}
				$content_post['email'] = $email;
				
				if(isset($_COOKIE['id_squeeze'])) $content_post['id_landing_page'] = $_COOKIE['id_squeeze'];
											
				$this->load->model("Inserir_model_public");
				$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
				
				sleep(2);
				// caso contrário ele já é lead então só direciona pro vídeo
				setcookie('checked',1,time() + (586400 * 15),'/');
										
				sleep(2);
				
				if(isset($_COOKIE['ref_page'])){
							
						$ref_page = $_COOKIE['ref_page'];
					
				}else{
					
					$ref_page = 'video1';
				}
				redirect(base_url().'obrigado/?page='.$ref_page);
				
				
				
			}

	}else{
				
				// se todos estiverem com mais de 55 limpa todas as tabelas
				$qApps = $this->db->query("SELECT * FROM apps_aweber WHERE total_quers");
				foreach($qApps->result_array() as $apps){
					
					
					$content_post_app['id'] = $apps['id'];
					$content_post_app['total_quers'] = 0;
					
					// coloca o número de requisições
					$this->load->model("Edita_model_public");
					$editar = $this->Edita_model_public->edita_modulo($content_post_app,"apps_aweber",false);
					
				}
				
			}
			
			
		}
	
	function objectToArray($object){
					
				$arr = array();	
				for ($i = 0; $i < count($object); $i++) {
					$arr[] = get_object_vars($object[$i]);
				}			
				return $arr;
	
			}
			
	function inserir_lista_temp($email){
				
				// verifica se já tem o email
				$qEmail = $this->db->query("SELECT * FROM emails_temp WHERE email LIKE '%".$email."%'");
				$rEmail = $qEmail->row();
				
					
					$content_post['email'] = $email;
					$this->load->model("Inserir_model_public");
					$this->Inserir_model_public->inseri_modulo($content_post,"emails_temp",false);
					
					//inseri na lista de emails
					$content_post ="";
					$content_post['email'] = $email;
					if(isset($content_post['id_hotmart'])) $content_post['id_hotmart'] = $_COOKIE['id_parceiro'];
					$this->load->model("Inserir_model_public");
					$this->Inserir_model_public->inseri_modulo($content_post,"emails",false);
					
					
					sleep(2);
					// envia pro aweber
					$this->inserir_aweber($email);
					setcookie('email_lead',$this->uri->segment(3),time() + (586400 * 15));
	
					
					redirect(base_url()."obrigado2");
	
	
				
								
			}
			
	function verifica_lead($email){
				
						$content_post ="";
						
						
				
					// verifica se tem o lead 
							$qVerificaLead = $this->db->query("SELECT * FROM clicks WHERE email='".$email."' ORDER BY ID DESC LIMIT 1");
							
							if($qVerificaLead->num_rows() > 0){							
								
								
								// verifica se  o id do afiliado é o admin para resgatar possíveis leads perdidos
								$rVerficaLead = $qVerificaLead->row();
								if($rVerficaLead->id_parceiro == '3783'){
									
									
									
									// se tem o id então esse cara veio de uma afiliado	
									if(isset($_COOKIE['id_parceiro'])){
										
								
										// checa o id relacionado ao usuário
										$qCheckUserId = $this->db->query("SELECT * FROM usuarios WHERE id_afiliado ='".$_COOKIE['id_parceiro']."'");
										
										if($qCheckUserId->num_rows() > 0){
											
											
											
											$rCheckUserId = $qCheckUserId->row();
											
											
											$content_post['id_parceiro'] = $rCheckUserId->id;
													
										}else{
											
											$content_post['id_parceiro'] = 3783;
											
										}
										
										$content_post['email'] = $email;
										$content_post['id'] = $rVerficaLead->id;
										
										// atualiza o lead
										$this->load->model("Edita_model_public");
										$ok = $editar = $this->Edita_model_public->edita_modulo($content_post,"clicks",false);
										
										
										
									}else{
										
										$content_post['id_parceiro'] = 3783;
										
									}
									
									
									/*
									$content_post['email'] = $email;
									
									
									$this->load->model("Inserir_model_public");
									$inserir = $this->Inserir_model_public->inseri_modulo($content_post,"clicks",false);
									 * */
									
									
									// caso contrário ele já é lead então só direciona pro vídeo
									setcookie('checked',1,time() + (586400 * 15),'/');
									
									sleep(2);
									if(isset($_COOKIE['ref_page'])){
										$ref_page = $_COOKIE['ref_page'];
										
									}else{
										
										$ref_page = 'video1';
										
									}
									redirect(base_url().$ref_page);
									
									
									
								}else{
									
									// caso contrário ele já é lead então só direciona pro vídeo
									setcookie('checked',1,time() + (586400 * 15),'/');
									
									sleep(2);
									if(isset($_COOKIE['ref_page'])){
										$ref_page = $_COOKIE['ref_page'];
										
									}else{
										
										$ref_page = 'video1';
										
									}
									redirect(base_url().$ref_page);
									
									
								}
								
							}else{
								
								
								
								$this->inserir_aweber($email);
								sleep(3);
								if(isset($_COOKIE['ref_page'])) $ref_page = $_COOKIE['ref_page'];
								else{
									
									$ref_page = 'video1';
								}
								redirect(base_url().'obrigado?page='.$ref_page);
								
							}
				
				
			}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */