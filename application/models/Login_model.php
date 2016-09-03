<?php

class Login_model extends CI_Model {

	public function cek_login($username,$password){

		$this->db->where('username',$username);
		$this->db->where('password',md5($password));

		$result = $this->db->get('users');

		if($result->num_rows() == 1){

			return $result->row(0)->id;

		}else{

			return false;

		}
	}

}

?>