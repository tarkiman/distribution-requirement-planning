<?php


class ModelShopChart extends CI_Model {

	//session_start();

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

}

?>
