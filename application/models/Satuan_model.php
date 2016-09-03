<?php

class Satuan_model extends CI_Model {

	public function create_satuan($data){

		$this->db->insert('satuan', $data);

	}

	public function read_satuan($id){

		$this->db->where('id_satuan',$id);

		$query = $this->db->get('satuan');

		return $query->result();
	}

	public function update_satuan($data,$id){

		$this->db->where('id_satuan',$id);
		$this->db->update('satuan', $data);

	}

	public function delete_satuan($id){

		$this->db->where(array('id_satuan'=>$id));
		$this->db->delete('satuan');

	}

	public function list_satuan(){

		//$query = $this->db->query("SELECT * FROM satuans");
		$query = $this->db->get('satuan');

		return $query->result();
	}

}

?>