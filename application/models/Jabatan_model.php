<?php

class Jabatan_model extends CI_Model {

	public function create_jabatan($data){

		$this->db->insert('jabatan', $data);

	}

	public function read_jabatan($id){

		$this->db->where('id_jabatan',$id);

		$query = $this->db->get('jabatan');

		return $query->result();
	}

	public function update_jabatan($data,$id){

		$this->db->where('id_jabatan',$id);
		$this->db->update('jabatan', $data);

	}

	public function delete_jabatan($id){

		$this->db->where(array('id_jabatan'=>$id));
		$this->db->delete('jabatan');

	}

	public function list_jabatan(){

		//$query = $this->db->query("SELECT * FROM jabatans");
		$query = $this->db->get('jabatan');

		return $query->result();
	}

}

?>