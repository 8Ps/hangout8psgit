<?php
class Auth_model extends CI_Model{

	function validate(){

			$this->load->library('encrypt');

			$qUsuario = $this->db->query("SELECT username ,password FROM usuarios WHERE username ='".$this->input->post('username')."'");
			
			

			if($qUsuario->num_rows() == 0) return false;
			$rUsuario = $qUsuario->row();

			$key = 'ngl2012';
			$password = $rUsuario->password;
			$fPassword = $this->encrypt->decode($password,$key);
			
			
			// quando for pro ar mudar pra false
			if($fPassword !== $this->input->post('password')) return false;
			
			
			
			$this->db->where('username', $this->input->post('username'));
			$query = $this->db->get('usuarios');
			
			if($query->num_rows <> 0) return true;


	}
	// validação pra usuarios públicos
	function validate_public(){

			$this->load->library('encrypt');

			$qUsuario = $this->db->query("SELECT username ,password FROM usuarios WHERE username ='".$this->input->post('username')."'");


			if($qUsuario->num_rows() == 0) return false;
			$rUsuario = $qUsuario->row();

			
			$password = $rUsuario->password;
			$fPassword = $this->encrypt->decode($password);
			
			

			// quando for pro ar mudar pra false
			if($fPassword !== $this->input->post('password')) return false;
			
			

			$this->db->where('username', $this->input->post('username'));
			$query = $this->db->get('usuarios');
			
			

			if($query->num_rows <> 0) return true;


		}


}

?>