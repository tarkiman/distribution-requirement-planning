<?php

class Report_model extends CI_Model {

	/*Get Data Penjualan Dengan Rentan Waktu Tertentu*/
	public function get_transaksi_penjualan($startDate,$endDate){

		$query = $this->db->query("SELECT * FROM vpenjualan WHERE tgl_pemesanan BETWEEN '".$startDate."' AND '".$endDate."' ORDER BY tgl_pemesanan DESC");
		//$query = $this->db->query("SELECT * FROM vpenjualan");

		return $query->result();

	}

	/*Get Data Penjualan Dengan Rentan Waktu Tertentu*/
	public function get_grand_total($startDate,$endDate){

		$query = $this->db->query("SELECT SUM(total) AS 'grand_total' FROM vpenjualan WHERE tgl_pemesanan BETWEEN '".$startDate."' AND '".$endDate."' ORDER BY tgl_pemesanan DESC");

		return $query->result();

	}

}

?>