<?php

class Notifikasi_model extends CI_Model {

	public function pemesanan_baru(){

		$query = $this->db->query("SELECT COUNT(*) AS 'pemesanan_baru' FROM penjualan WHERE `tgl_pengiriman` IS NULL");

		return $query->result();
	}

	public function request_pembelian(){

		$query = $this->db->query("SELECT COUNT(*) AS 'request_pembelian' FROM purchasing WHERE `tgl_pemesanan` IS NULL");

		return $query->result();
	}

	public function status_pembelian(){

		$query = $this->db->query("SELECT COUNT(*) AS 'status_pembelian' FROM purchasing WHERE `status` = 'N'");

		return $query->result();
	}

	// public function stok_barang(){

	// 	$query = $this->db->query("SELECT `nama_produk`,`stok` FROM `produk` ORDER BY `stok` ASC LIMIT 3");

	// 	return $query->result();
	// }

	// public function data_transaksi(){

	// 	$query = $this->db->query("SELECT j.`minggu`,SUM(j.`total`) AS 'total_penjualan',SUM(p.`total`) AS 'total_pembelian'
	// 		                       FROM `penjualan` j LEFT OUTER JOIN `purchasing` p ON j.`minggu` = p.`minggu`
	// 		                       GROUP BY j.minggu LIMIT 12");

	// 	return $query->result();
	// }

	// public function presentase_penjualan(){

	// 	$query = $this->db->query("SELECT SUM(dp.`harga_jual`- b.`harga_beli`) AS 'keuntungan' 
	// 							   FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
 //                                 					  JOIN `produk` b USING(`id_produk`)
 //                        		   WHERE MONTH(p.`tgl_pemesanan`) = '05'");

	// 	return $query->result();

	// }

}

?>