<?php

class Karyawan_model extends CI_Model {

	public function create_karyawan($data){

		$this->db->insert('karyawan', $data);

	}

	public function read_karyawan($id){

		$this->db->where('id_karyawan',$id);

		$query = $this->db->get('karyawan');

		return $query->result();
	}

	public function update_karyawan($data,$id){

		$this->db->where('id',$id);
		$this->db->update('karyawan', $data);

	}

	public function delete_karyawan($id){

		$this->db->where(array('id_karyawan'=>$id));
		$this->db->delete('karyawan');

	}

	public function list_karyawan(){

		//$query = $this->db->get('karyawan');
		$query = $this->db->query("SELECT `id_karyawan`,
										  `id_jabatan`,
										  j.`nama_jabatan`,
										  `nama_karyawan`,
										  `jenis_kelamin`,
										  `tempat_lahir`,
										  `tanggal_lahir`,
										  `mulai_kerja`,
										  `alamat`,
										  `telepon`,
										  `email`,
										  `foto`
									FROM `karyawan` k JOIN jabatan j USING(id_jabatan)");
		return $query->result();
	}

}

?>