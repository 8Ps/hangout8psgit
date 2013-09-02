<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video1 extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
		
		
	}
	
	
	public function index(){
		
		
		//$this->output->cache(5000*10);
		
		if(isset($_GET['ref']) AND !isset($_COOKIE['id_parceiro'])) setcookie('id_parceiro',$_GET['ref'],time() + (586400 * 15),'/');
		sleep(1);
		
		################## seta qual página ele veio pra direcionar depois de passar pela squeeze #########
		
		if(!isset($_COOKIE['ref_page'])) setcookie('ref_page',$this->uri->segment(1),time() + (586400 * 15),'/');
		
		sleep(1);
		
		
		if(isset($_GET['check_squeeze']) OR isset($_COOKIE['check_video']) OR isset($_COOKIE['confirmado'])){
		
			$content['main_content'] = 'videos/video1';
			$this->parser->parse('includes/templates/template_none',$content);
			
		}else{
			if(isset($_GET['email'])){
				redirect(base_url().'funcao_video?email='.$_GET['email']);	
			}else{
				redirect(base_url());
			}
			
		}
		
		return false;
		
		
		/*
		
		if(isset($_COOKIE['email_lead_ver'])){
			
			setcookie('email_lead',$_COOKIE['email_lead_ver'],time() + (586400 * 15),'/');
			sleep(2);
		
			
		}
		
		*/
		
		
		
		/*
		
		$content['main_content'] = 'videos/video1';
		$this->parser->parse('includes/templates/template_none',$content);
		 * /
		
		
	}

	
	
	
	function verifica_status_aweber($email,$acesso){
		
		
		require_once('aweber/aweber_api/aweber_api.php');
		require_once('aweber/tests/mock_adapter.php');
		
		/*
		$consumerKey    = 'AkztRj9ZRBnsb8uEEP4gUuVX'; # put your credentials here
		$consumerSecret = 'DdeEoVDDaZb3vJPPxsKBPkWCS5AcZDiW8E0aaikC'; # put your credentials here
		$accessKey      = 'AgTZeieNSVmd1qwoZX440wEb'; # put your credentials here
		$accessSecret   = 'VicZyCkozTcGsUhIAfwdCSjmcgGUUUynbsDjrrCU'; # put your credentials here
		$account_id     = '672552'; # put the Account ID here
		$list_id        = '3022525'; # put the List ID here
		
		*/
		
		$consumerKey = $acesso[0];
		$consumerSecret = $acesso[1];
		$accessKey = $acesso[2];
		$accessSecret = $acesso[3];
		$account_id = $acesso[4];
		$list_id = $acesso[5];
	
	
		$aweber = new AWeberAPI($consumerKey, $consumerSecret);
		
		try {
		    $account = $aweber->getAccount($accessKey, $accessSecret);
			$listURL = "/accounts/{$account_id}/lists/{$list_id}";
    		$list = $account->loadFromUrl($listURL);
		
		    $subscribers = $list->subscribers;
			
			$params = array('email' => $email);
		    $found_subscribers = $subscribers->find($params);
		
			
		    foreach($found_subscribers as $subscriber) {
		    	
				
			    if($subscriber->status == 'subscribed'){
		        	
					//inserir o coolie pra poder ver o video
					
						return 1;
						
					
					
		        }else{
		        	
					// insrir no banco de dados pra exportar pro mailchimp depois
					
						return 0;
					
					
		
		
					
		        }
				
				$tem_usuario = 1;
		    }
		    
			
		    if(isset($tem_usuario)){
		    	
				return 1;
				
		    }else{
		    	
				return 0;
				
		    }
			
		
		} catch(AWeberAPIException $exc) {
			
			return 0;
			
			log_message('error', $exc->message);
			if($exc->type == 'RateLimitError'){
				
				sleep(10);
				
				
			}
			setcookie('confirmado',1,time() + (586400 * 15));
		 	if(isset($email)) setcookie('email_lead',$email,time() + (586400 * 15),'/');
			else {
				setcookie('email_lead','aweberoff',time() + (586400 * 15),'/');
				
			}
			sleep(3);
		 	redirect(base_url().'/'.$_GET['page']);
			
			
		  // redirect(base_url().'error_geral');
		}
		
	}

	public function youtube(){
		
		
		if(isset($_GET['ref']) AND !isset($_COOKIE['id_parceiro'])) setcookie('id_parceiro',$_GET['ref'],time() + (586400 * 15),'/');
		sleep(1);
		
		################## seta qual página ele veio pra direcionar depois de passar pela squeeze #########
		
		if(!isset($_COOKIE['ref_page'])) setcookie('ref_page',$this->uri->segment(1),time() + (586400 * 15),'/');
		
		sleep(1);
		
		
		if(isset($_GET['check_squeeze']) OR isset($_COOKIE['check_video']) OR isset($_COOKIE['confirmado'])){
		
			$content['main_content'] = 'videos/video1_yt';
			$this->parser->parse('includes/templates/template_none',$content);
			
		}else{
			if(isset($_GET['email'])){
				redirect(base_url().'funcao_video?email='.$_GET['email']);	
			}else{
				redirect(base_url());
			}
			
		}
		
		return false;
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */