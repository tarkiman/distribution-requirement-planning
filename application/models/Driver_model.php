<?php

class Driver_model extends CI_Model {

	public function create_driver($data){

		$this->db->insert('driver', $data);

	}

	public function read_driver($id){

		$this->db->where('id_driver',$id);

		$query = $this->db->get('driver');

		return $query->result();
	}

	public function update_driver($data,$id){

		$this->db->where('id_driver',$id);
		$this->db->update('driver', $data);

	}

	public function delete_driver($id){

		$this->db->where(array('id_driver'=>$id));
		$this->db->delete('driver');

	}

	public function list_driver(){

		//$query = $this->db->query("SELECT * FROM driver");
		$query = $this->db->get('driver');

		return $query->result();
	}

	/*Get Current Id driver*/
	public function get_id_driver(){

		$query = $this->db->query( "SELECT CONCAT('S',LPAD(COUNT(id_driver)+1,4,'0')) AS 'id_driver' FROM driver");

		return $query->result();

	}

}

?>