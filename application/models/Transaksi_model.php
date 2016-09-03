<?php

class Transaksi_model extends CI_Model {

	public $id_produk;
	public $nama_produk;
	public $harga_jual ;
	public $jumlah;
	public $sub_total;

	public function setSubTotal() {

		$this->sub_total = $this->harga_jual * $this->jumlah;
	
	}

	public function getListOrder() {
	
		$listOrder = isset($_SESSION['dtOrder']) ? unserialize($_SESSION['dtOrder']) : array();
	
		return $listOrder;
	}

	public function getOrderByIndex($dataIndex) {
	
		$listOrder = $this->getListOrder();
	
		$dataOrder = $listOrder[$dataIndex];

		return $dataOrder;

	}

	public function updateSession($value) {
	
		$_SESSION['dtOrder'] = serialize($value);
	
	}

	public function addOrder() {
		
		$listOrder = $this->getListOrder();
	
		$existIndex = $this->searchOrder($this->id_produk);

		if ($existIndex < 0) {
	
			$this->setSubTotal();
	
			array_push($listOrder, $this);
	
		} else {
	
			$updateOrder = $this->getOrderByIndex($existIndex);
	
			$updateOrder->jumlah+= $this->jumlah;
	
			$updateOrder->setSubTotal();

			$listOrder[$existIndex] = $updateOrder;
	
		}

		$this->updateSession($listOrder);
	
	}

	public function deleteOrder($indexOrder) {
	
		$listOrder = $this->getListOrder();
	
		unset($listOrder[$indexOrder]);

		$this->updateSession($listOrder);
	
	}

	public function searchOrder($idProduct) {
	
		$indexFound = -1;
	
		$exist = False;
	
		$listOrder = $this->getListOrder();
	
		foreach ($listOrder as $key => $value) {
	
			if ($idProduct == $value->id_produk) {
	
				$exist = True;
				
				$indexFound = $key;
				
				break;
			}
		
		}

		return $indexFound;
	
	}












	/*My Custom*/

	/*Get Current Id Penjualan*/
	public function get_id_penjualan(){

		$query = $this->db->query( "SELECT CONCAT('FJ-',DATE_FORMAT(NOW(),'%y%m%d'),'-',LPAD(COUNT(id_penjualan)+1,4,'0')) AS 'id_penjualan' FROM penjualan");

		return $query->result();

	}

	/*Get Pelanggan*/
	public function get_pelanggan(){

		$query = $this->db->get('pelanggan');

		return $query->result();
	}

	public function list_penjualan(){

		$query = $this->db->query("SELECT `id_penjualan`,
										  `id_karyawan`,
										  `nama_karyawan`,
										  `id_pelanggan`,
										  `nama_pelanggan`,
										  pelanggan.`alamat`,
										  `minggu`,
										  `tgl_pemesanan`,
										  `tgl_pengiriman`,
										  `catatan`,
										  `status`,
										  `total`
                                   FROM `penjualan` JOIN `pelanggan` USING (`id_pelanggan`)
                                         JOIN `karyawan` USING (`id_karyawan`)
                                   ORDER BY id_penjualan DESC");
		return $query->result();
	}

	/*MODEL CRUD*/ 
	public function create_transaksi($data){

		$this->db->insert('penjualan', $data);

	}

	public function create_detail_transaksi($data){

		$this->db->insert('detail_penjualan', $data);

	}

	public function update_stok_produk($jumlah,$id_produk){

		$query = $this->db->query("UPDATE produk SET stok=stok-'".$jumlah."'
                        		   WHERE id_produk='".$id_produk."'");

	}

	public function print_data($id_penjualan){

		$query = $this->db->query("SELECT  `nama_produk`,
			                               `jumlah`,
			                               `satuan`,
			                               detail_penjualan.`harga_jual`,
			                               `id_penjualan`,
			                               `id_pengiriman`,
			                               `tgl_pemesanan`,
			                               `nama_pelanggan`,
			                               pelanggan.`telepon`,
			                               `alamat`
			                        FROM `penjualan` JOIN `detail_penjualan` USING (`id_penjualan`)
			                                         JOIN `produk` USING (`id_produk`)
			                                         JOIN `pelanggan` USING (`id_pelanggan`) 
			                        WHERE id_penjualan ='".$id_penjualan."'");

		return $query->result();
	}

	public function invoice(){

		$query = $this->db->query("SELECT COUNT(*) AS invoice FROM penjualan");

		return $query->result();
	}

	public function grand_total($id_penjualan){

		$query = $this->db->query("SELECT `total` FROM penjualan WHERE id_penjualan ='".$id_penjualan."'");

		return $query->result();
	}

	public function jatuh_tempo($id_penjualan){

		$query = $this->db->query("SELECT DATE_ADD(NOW(),INTERVAL 7 DAY) AS jatuh_tempo FROM penjualan WHERE id_penjualan ='".$id_penjualan."'");

		return $query->result();
	}


	public function transaksi_baru(){

		$query = $this->db->query("SELECT `id_penjualan`,
										  `id_karyawan`,
										  `nama_karyawan`,
										  `id_pelanggan`,
										  `nama_pelanggan`,
										  pelanggan.`alamat`,
										  `minggu`,
										  `tgl_pemesanan`,
										  `tgl_pengiriman`,
										  `catatan`,
										  `status`,
										  `total`
                                   FROM `penjualan` JOIN `pelanggan` USING (`id_pelanggan`)
                                         JOIN `karyawan` USING (`id_karyawan`)
                                   WHERE `tgl_pengiriman` IS NULL
                                   ORDER BY id_penjualan DESC");
		return $query->result();
	}



}

?>