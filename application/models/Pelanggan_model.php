<?php

class Pelanggan_model extends CI_Model {

	public function create_pelanggan($data){

		$this->db->insert('pelanggan', $data);

	}

	public function read_pelanggan($id){

		$this->db->where('id_pelanggan',$id);

		$query = $this->db->get('pelanggan');

		return $query->result();
	}

	public function update_pelanggan($data,$id){

		$this->db->where('id_pelanggan',$id);
		$this->db->update('pelanggan', $data);

	}

	public function delete_pelanggan($id){

		$this->db->where(array('id_pelanggan'=>$id));
		$this->db->delete('pelanggan');

	}

	public function list_pelanggan(){

		//$query = $this->db->query("SELECT * FROM pelanggan");
		$query = $this->db->get('pelanggan');

		return $query->result();
	}

	/*Get Current Id pelanggan*/
	public function get_id_pelanggan(){

		$query = $this->db->query( "SELECT CONCAT('C',LPAD(COUNT(id_pelanggan)+1,4,'0')) AS 'id_pelanggan' FROM pelanggan");

		return $query->result();

	}

}

?>