<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verificacao extends CI_Controller {

	function index(){

		require_once('aweber/aweber_api/aweber_api.php');
		require_once('aweber/tests/mock_adapter.php');
		
		$consumerKey    = 'AkztRj9ZRBnsb8uEEP4gUuVX'; # put your credentials here
		$consumerSecret = 'DdeEoVDDaZb3vJPPxsKBPkWCS5AcZDiW8E0aaikC'; # put your credentials here
		$accessKey      = 'AgTZeieNSVmd1qwoZX440wEb'; # put your credentials here
		$accessSecret   = 'VicZyCkozTcGsUhIAfwdCSjmcgGUUUynbsDjrrCU'; # put your credentials here
		$account_id     = '672552'; # put the Account ID here
		$list_id        = '3022525'; # put the List ID here
		
		
	
	
		$aweber = new AWeberAPI($consumerKey, $consumerSecret);
		
		try {
		    $account = $aweber->getAccount($accessKey, $accessSecret);
			$listURL = "/accounts/{$account_id}/lists/{$list_id}";
    		$list = $account->loadFromUrl($listURL);
		
		    $subscribers = $list->subscribers;
			
			$params = array('email' => 'rodrigodevel@gmail.com');
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
		   redirect(base_url().'error_geral');
		}
	

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */