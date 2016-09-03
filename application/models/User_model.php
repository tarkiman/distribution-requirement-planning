<?php

class User_model extends CI_Model {

	/*QUERY SATU KONDISI*/
	public function get_users_list(){

		$query = $this->db->get('users');

		return $query->result();
	}



	/*LEBIH DARI SATU KONDISI*/
	public function search_users($user_id,$username){

		$this->db->where(array('id' => $user_id,'username' => $username));

		$query = $this->db->get('users');

		return $query->result();

	}


	/*MENGGUNAKAN QUERY BIASA*/
	public function get_user($user_id){

		$this->db->where('id',$user_id);

		//$query = $this->db->query("SELECT * FROM users");
		$query = $this->db->get('users');

		return $query->result();

	}


	public function create_users($data){

		$this->db->insert('users', $data);

	}

	public function update_users($data,$id){

		$this->db->where('id',$id);
		$this->db->update('users', $data);

	}

	public function delete_users($id){

		$this->db->where(array('id'=>$id));
		$this->db->delete('users');

	}

}

?>