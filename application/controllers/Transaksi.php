<?php	

Class Transaksi extends CI_Controller{


	private $data;

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->show_list();
	}

	public function add(){
		/*Tanggal Transaksi*/

		$f = new Formatter_model();
		$tgl_pemesanan = $f->tanggal_sekarang();

		/*Id Penjualan*/
		$idPenjualan = $this->transaksi_model->get_id_penjualan();
		
		foreach ($idPenjualan as $ip) {
	    	$id_penjualan  = $ip->id_penjualan;
	  	}

	    /*Kirim Nilai Dalam Array*/
		$data['transaksi'][] = (object) array('tgl_pemesanan' => $tgl_pemesanan, 
											  'id_penjualan'  => $id_penjualan);

		$data['pelanggan'] = $this->pelanggan_model->list_pelanggan();

		$data['produk'] = $this->produk_model->list_produk();

		$this->template->display('transaksi/add',$data);
	}

	public function show_list(){
		$data['results'] = $this->transaksi_model->list_penjualan();
		$this->template->display('transaksi/list',$data);
	}

	public function product_change($id_produk){

		$list = $this->produk_model->read_produk($id_produk);

		//echo json_encode($list);
		echo '{"produk":'.json_encode($list).'}';

	}

	public function transaksi_tmp(){
		$this->load->view('transaksi/list_belanja');		
	}

	public function tambah(){
		$prodIndex = isset($_GET['id_produk']) ? $_GET['id_produk'] : 0;

		//$model = new ModelProduct();
		//$dataProduct = $model->getByIndex($prodIndex);
		$dataProduct = $this->produk_model->read_produk($prodIndex);

		foreach ($dataProduct as $object) {
			$idProduk = $object->id_produk;
		}

		//jika data yang di kirim dari view sama dengan yang di database/model
		if ($idProduk = $_GET['id_produk']) {
			$newOrder = new Transaksi_model();
			//masukin nilai ke variable-varible yang ada di Transaksi_model
			$newOrder->id_produk = $idProduk;
			$newOrder->nama_produk = $_GET['nama_produk'];
			$newOrder->harga_jual = $_GET['harga_jual'];
			$newOrder->jumlah = $_GET['jumlah'];
			//Panggil Method addOrder begitu nilai varibale2 telah di set di Transaksi_model
			$newOrder->addOrder();
		}
	}

	/*Simpan Data ke Database*/
	public function insert(){

		$nota = $this->input->get('nota');
		//$tgl_pemesanan = $this->input->get('tgl_pemesanan');
		$id_pelanggan = $this->input->get('id_pelanggan');
		$id_karyawan = $this->input->get('id_karyawan');
		$minggu = "11";
		$total = $this->input->get('total');
		$status = "N";

		$this->transaksi_model->create_transaksi(array(
		'id_penjualan'  => $nota,
		//'tgl_pemesanan' => $tgl_pemesanan,
		'id_pelanggan' 	=> $id_pelanggan,
		'id_karyawan' 	=> $id_karyawan,
		'minggu'        => $minggu,
		'status'		=> $status,
		'total' 	    => $total
		));

        $modOrder = new Transaksi_model();
        $listOrder = $modOrder->getListOrder(); 
        foreach ($listOrder as $key => $value) {

        	$this->transaksi_model->create_detail_transaksi(array(
				'id_penjualan'  => $nota,
				'id_produk' 	=> $value->id_produk,
				'harga_jual' 	=> $value->harga_jual,
				'jumlah' 		=> $value->jumlah,
				'subtotal'      => $value->sub_total
			));

			/*Update stok produk*/
			$this->transaksi_model->update_stok_produk($value->jumlah,$value->id_produk);

            //Delete isi session satu persatu
            unset($listOrder[$key]);
            $modOrder->updateSession($listOrder);
        }

	}

	public function update(){

		$id_produk = $this->input->get('id_produk');
		$jumlah = $this->input->get('jumlah');

	    $modOrder = new Transaksi_model();
	    $listOrder = $modOrder->getListOrder();

		foreach ($listOrder as $key => $value) {
		    if(($value->id_produk)==$id_produk){
		    $newQty = $jumlah;
		    $value->jumlah = $newQty;
		    $value->setSubTotal();}
		}

		$modOrder->updateSession($listOrder);
	}

	public function delete($id){

		$ordIndex = $id;
	    $modOrder = new Transaksi_model();
	    $modOrder->deleteOrder($ordIndex);

	}

	public function print_data($id_penjualan){

		$data['invoice'] = $this->transaksi_model->invoice();
		$data['jatuh_tempo'] = $this->transaksi_model->jatuh_tempo($id_penjualan);
		$data['grand_total'] = $this->transaksi_model->grand_total($id_penjualan);
		$data['penjualan'] = $this->transaksi_model->print_data($id_penjualan);

		$this->template->display('transaksi/print_data',$data);

	}

	public function transaksi_baru(){

		$data['results'] = $this->transaksi_model->transaksi_baru();
		$this->template->display('transaksi/list',$data);

	}

}

?>