<?php

class Produk_model extends CI_Model {

	public function create_produk($data){

		$this->db->insert('produk', $data);

	}

	public function read_produk($id){

		$this->db->where('id_produk',$id);

		$query = $this->db->get('produk');

		return $query->result();
	}

	public function update_produk($data,$id){

		$this->db->where('id_produk',$id);
		$this->db->update('produk', $data);

	}

	public function delete_produk($id){

		$this->db->where(array('id_produk'=>$id));
		$this->db->delete('produk');

	}

	public function list_produk(){

		//$query = $this->db->query("SELECT * FROM produk");
		$query = $this->db->get('produk');

		return $query->result();
	}

}

?>