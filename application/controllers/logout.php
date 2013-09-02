<?php

class Logout extends CI_Controller {



	function index(){


		 if(!$this->session->userdata('is_logged_in')) redirect(base_url());
		 $deslogar = $this->session->sess_destroy();

		if($deslogar) redirect(base_url());
		else {

			//var_dump($deslogar);
			//echo "error";

			redirect(base_url());

		}

	}
	function is_logged_in(){

		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) ||  $is_logged_in == FALSE) redirect('login');

	}


}

