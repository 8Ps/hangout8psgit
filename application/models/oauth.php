<?php
class Oauth extends CI_Model {

    public function is_logged_in(){
    	
    	
    	
    
    	
    	$is_logged_in = $this->session->userdata('is_logged_in');

			if(!isset($is_logged_in) ||  $is_logged_in == FALSE) {

				redirect(base_url().'index.php/login');
			
		}
    }
    
	public function is_logged_in_public(){
    	
    	$is_logged_in = $this->session->userdata('is_logged_in');
    	
    ;

			if(!isset($is_logged_in) ||  $is_logged_in == FALSE) {

				redirect(base_url().'login_public');
			
		}
    }
}

/* End of file Someclass.php */