<?php

	class Importacao extends CI_Controller{


		function index(){
			$this->load->model("Inserir_model_public");


			$emails = 'testandorodrigo@gmail.com,teste@teste.com';

			$emails_array = explode(',',$emails);

			$id_desconto = 111;

			foreach($emails_array as $email_desconto){

				$dados = array('email' => str_replace(" ","",$email_desconto),'id_grupo_desconto' => $id_desconto);


				$this->Inserir_model_public->inseri_modulo($dados,"emails_descontos",false);
			}


		}







	}

?>