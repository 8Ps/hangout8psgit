<?php

	class Exportacao_emails extends CI_Controller{


		function index(){
			
			$qEmails = $this->db->query("SELECT email FROM usuarios JOIN pagamentos_usuarios ON usuarios.id=pagamentos_usuarios.id_usuario WHERE pagamentos_usuarios.status='pago' AND id_pacote <> 111 AND id_pacote <> 7 AND id_pacote <> 8 AND id_pacote <> 9 GROUP BY email");
			

			foreach($qEmails->result_array() as $email){
				
				echo $email['email'] .',';
				
			}
		
		}
		
		
	

		
	}

?>