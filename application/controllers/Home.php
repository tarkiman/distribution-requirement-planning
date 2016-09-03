<?php
	

Class Home extends CI_Controller{

	private $data;

	public function index(){

		//$this->template->display('home_view',$this->data);

		$this->dashboard();

		//$this->load->view("pages/format-currency/index");

	}

	public function dashboard(){


		/*Pemesanan Baru*/
		$pemesanan_baru = $this->dashboard_model->pemesanan_baru();		
		foreach ($pemesanan_baru as $r) { $pemesanan_baru  = $r->pemesanan_baru; }

		/*jumlah pengiriman bulan ini*/
		$jumlah_pengiriman = $this->dashboard_model->jumlah_pengiriman();		
		foreach ($jumlah_pengiriman as $r) { $jumlah_pengiriman  = $r->jumlah_pengiriman; }

		/*omset bulan ini*/
		$omset = $this->dashboard_model->omset();		
		foreach ($omset as $r) { $omset  = $r->omset; }

		/*keuntungan bulan ini*/
		$keuntungan = $this->dashboard_model->keuntungan();		
		foreach ($keuntungan as $r) { $keuntungan  = $r->keuntungan; }

	    /*Kirim Nilai Dalam Array*/
		$data['dashboard'][] = (object) array('pemesanan_baru'    => $pemesanan_baru, 
											  'jumlah_pengiriman' => $jumlah_pengiriman,
											  'omset'  			  => $omset,
											  'keuntungan'        => $keuntungan);

		//$data['results'] = $this->dashboard_model->dashboard();
		$this->template->display('dashboard/view',$data);
	}

	public function stok_barang(){

		$list = $this->dashboard_model->stok_barang();

		//echo json_encode($list);
		echo json_encode($list);

	}

	public function data_transaksi(){

		$list = $this->dashboard_model->data_transaksi();

		//echo json_encode($list);
		echo json_encode($list);

	}






}


?>