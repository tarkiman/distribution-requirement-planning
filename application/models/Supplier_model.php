<?php

class Supplier_model extends CI_Model {

	public function create_supplier($data){

		$this->db->insert('supplier', $data);

	}

	public function read_supplier($id){

		$this->db->where('id_supplier',$id);

		$query = $this->db->get('supplier');

		return $query->result();
	}

	public function update_supplier($data,$id){

		$this->db->where('id_supplier',$id);
		$this->db->update('supplier', $data);

	}

	public function delete_supplier($id){

		$this->db->where(array('id_supplier'=>$id));
		$this->db->delete('supplier');

	}

	public function list_supplier(){

		//$query = $this->db->query("SELECT * FROM supplier");
		$query = $this->db->get('supplier');

		return $query->result();
	}

	/*Get Current Id Supplier*/
	public function get_id_supplier(){

		$query = $this->db->query( "SELECT CONCAT('S',LPAD(COUNT(id_supplier)+1,4,'0')) AS 'id_supplier' FROM supplier");

		return $query->result();

	}

}

?>