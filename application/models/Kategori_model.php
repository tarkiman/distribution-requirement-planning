<?php

class Kategori_model extends CI_Model {

	public function create_kategori($data){

		$this->db->insert('kategori', $data);

	}

	public function read_kategori($id){

		$this->db->where('id_kategori',$id);

		$query = $this->db->get('kategori');

		return $query->result();
	}

	public function update_kategori($data,$id){

		$this->db->where('id_kategori',$id);
		$this->db->update('kategori', $data);

	}

	public function delete_kategori($id){

		$this->db->where(array('id_kategori'=>$id));
		$this->db->delete('kategori');

	}

	public function list_kategori(){

		//$query = $this->db->query("SELECT * FROM kategoris");
		$query = $this->db->get('kategori');

		return $query->result();
	}

}

?>