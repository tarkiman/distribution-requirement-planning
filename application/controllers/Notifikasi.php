<?php
	

Class Notifikasi extends CI_Controller{

	private $data;

	public function index(){

		//$this->template->display('home_view',$this->data);

		$this->dashboard();

	}

	public function dashboard(){


		/*Pemesanan Baru*/
		$pemesanan_baru = $this->notifikasi_model->pemesanan_baru();		
		foreach ($pemesanan_baru as $r) { $pemesanan_baru  = $r->pemesanan_baru; }

		/*jumlah pengiriman bulan ini*/
		$jumlah_pengiriman = $this->notifikasi_model->jumlah_pengiriman();		
		foreach ($jumlah_pengiriman as $r) { $jumlah_pengiriman  = $r->jumlah_pengiriman; }

		/*omset bulan ini*/
		$omset = $this->notifikasi_model->omset();		
		foreach ($omset as $r) { $omset  = $r->omset; }

		/*keuntungan bulan ini*/
		$keuntungan = $this->notifikasi_model->keuntungan();		
		foreach ($keuntungan as $r) { $keuntungan  = $r->keuntungan; }

	    /*Kirim Nilai Dalam Array*/
		$data['dashboard'][] = (object) array('pemesanan_baru'    => $pemesanan_baru, 
											  'jumlah_pengiriman' => $jumlah_pengiriman,
											  'omset'  			  => $omset,
											  'keuntungan'        => $keuntungan);

		//$data['results'] = $this->dashboard_model->dashboard();
		$this->template->display('dashboard/view',$data);
	}

	public function pemesanan_baru(){

		$list = $this->notifikasi_model->pemesanan_baru();

		echo json_encode($list);

	}

	public function request_pembelian(){

		$list = $this->notifikasi_model->request_pembelian();

		//echo json_encode($list);
		echo json_encode($list);

	}

	public function status_pembelian(){

		$list = $this->notifikasi_model->status_pembelian();

		//echo json_encode($list);
		echo json_encode($list);

	}






}


?>