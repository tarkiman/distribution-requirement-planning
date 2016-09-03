<?php

class Kendaraan_model extends CI_Model {

	public function create_kendaraan($data){

		$this->db->insert('kendaraan', $data);

	}

	public function read_kendaraan($id){

		$this->db->where('no_kendaraan',$id);

		$query = $this->db->get('kendaraan');

		return $query->result();
	}

	public function update_kendaraan($data,$id){

		$this->db->where('no_kendaraan',$id);
		$this->db->update('kendaraan', $data);

	}

	public function delete_kendaraan($id){

		$this->db->where(array('no_kendaraan'=>$id));
		$this->db->delete('kendaraan');

	}

	public function list_kendaraan(){

		//$query = $this->db->query("SELECT * FROM kendaraan");
		$query = $this->db->get('kendaraan');

		return $query->result();
	}

	/*Get Current Id kendaraan*/
	public function get_no_kendaraan(){

		$query = $this->db->query( "SELECT CONCAT('S',LPAD(COUNT(no_kendaraan)+1,4,'0')) AS 'no_kendaraan' FROM kendaraan");

		return $query->result();

	}

}

?>