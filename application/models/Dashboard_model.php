<?php

class Dashboard_model extends CI_Model {

	public function pemesanan_baru(){

		$query = $this->db->query("SELECT COUNT(*) AS 'pemesanan_baru' 
			                       FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
			                                          JOIN `produk` b USING(`id_produk`)
			                       WHERE p.`tgl_pengiriman` IS NULL");

		return $query->result();
	}

	public function jumlah_pengiriman(){

		$query = $this->db->query("SELECT COUNT(p.`tgl_pengiriman`) AS 'jumlah_pengiriman' 
								   FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
			                                          JOIN `produk` b USING(`id_produk`)
			                       WHERE MONTH(p.`tgl_pemesanan`) = '05'");

		return $query->result();
	}

	public function omset(){

		$query = $this->db->query("SELECT SUM(p.`total`) AS 'omset' 
								   FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
                                                      JOIN `produk` b USING(`id_produk`)
                                   WHERE MONTH(p.`tgl_pemesanan`) = '05'");

		return $query->result();
	}

	public function keuntungan(){

		$query = $this->db->query("SELECT SUM(dp.`harga_jual`- b.`harga_beli`) AS 'keuntungan' 
								   FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
                                 					  JOIN `produk` b USING(`id_produk`)
                        		   WHERE MONTH(p.`tgl_pemesanan`) = '05'");

		return $query->result();
	}

	// public function jatuh_tempo($id_penjualan){

	// 	$query = $this->db->query("SELECT DATE_FORMAT(DATE_ADD(NOW(),INTERVAL 7 DAY),'%d %M %Y') AS jatuh_tempo FROM penjualan WHERE id_penjualan ='".$id_penjualan."'");

	// 	return $query->result();
	// }

	public function stok_barang(){

		$query = $this->db->query("SELECT `nama_produk`,`stok` FROM `produk` ORDER BY `stok` ASC LIMIT 10");

		return $query->result();
	}

	public function data_transaksi(){

		$query = $this->db->query("SELECT j.`minggu`,SUM(j.`total`) AS 'total_penjualan',SUM(p.`total`) AS 'total_pembelian'
			                       FROM `penjualan` j LEFT OUTER JOIN `purchasing` p ON j.`minggu` = p.`minggu`
			                       GROUP BY j.minggu LIMIT 12");

		return $query->result();
	}

	public function presentase_penjualan(){

		$query = $this->db->query("SELECT SUM(dp.`harga_jual`- b.`harga_beli`) AS 'keuntungan' 
								   FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
                                 					  JOIN `produk` b USING(`id_produk`)
                        		   WHERE MONTH(p.`tgl_pemesanan`) = '05'");

		return $query->result();

		// $query = mysql_query("SELECT SUM(dp.`jumlah`) AS 'total' 
		// 				      FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`) 
		// 				  					 JOIN `produk` b USING(`id_produk`) 
		// 				      WHERE YEAR(p.`tgl_pemesanan`) = '2013'");
		// $data = mysql_fetch_array($query);
		// $total = $data['total'];
		// $sth = mysql_query("SELECT ROUND(((SUM(dp.`jumlah`)/297657)*100),2) AS 'value',b.`nama_produk` AS 'label'
		// 					FROM `penjualan` p JOIN `detail_penjualan` dp USING(`id_penjualan`)
		// 	 				                   JOIN `produk` b USING(`id_produk`)
		// 					WHERE YEAR(p.`tgl_pemesanan`) = '2013'
		// 	 				GROUP BY dp.`id_produk`");
		// $rows = array();
		// while($r = mysql_fetch_assoc($sth)) {
		//      $rows[] = $r;
		//  }
		// echo json_encode($rows);


	}

}

?>