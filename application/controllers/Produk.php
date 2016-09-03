<?php	

Class Produk extends CI_Controller{

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index(){
		$this->show_list();
	}

	/*LEBIH DARI SATU KONDISI*/
	public function show_list(){

		$data['results'] = $this->produk_model->list_produk();
		$this->template->display('produk/list',$data);
	}

	public function add(){
		$this->template->display('produk/add',false);
	}

	public function insert(){

		/*Fungsi Upload*/
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
			echo"Error";
		}
		else
		{
			$data = $this->upload->data();
			$nama_file = $data['file_name'];
		}

		$nama_produk = $this->input->post('nama_produk');
		$stok = $this->input->post('stok');
		$satuan = $this->input->post('satuan');
		$harga_jual = $this->input->post('harga_jual');

		/*Apabila Upload File Terisi*/
		if($nama_file != ""){

			$this->produk_model->create_produk(array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk,
			'stok' 	   => $stok,
			'satuan' 	   => $satuan,
			'harga_jual'     => $harga_jual,
			'foto'         => $nama_file
			));

		}
		/*Apabila Upload File Kosong*/
		else{

			$this->produk_model->create_produk(array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk,
			'stok' 	   => $stok,
			'satuan' 	   => $satuan,
			'harga_jual'     => $harga_jual
			));
		}

		redirect('produk');
	}



	/*LEBIH DARI SATU KONDISI*/
	public function show($id){
		//$data['error'] = array('error' => ' ' );
		$data['results'] = $this->produk_model->read_produk($id);
		$this->template->display('produk/update',$data);
	}

	

	// /*LEBIH DARI SATU KONDISI*/
	// public function search($user_id,$username){

	// 	$data['results'] = $this->user_model->get_poducts($user_id,$username);
	// 	//$this->load->view('poducts/poducts_view',$data);
	// 	$this->template->display('poducts/poducts_view',$data);
	// }

	
	public function update($id_produk){

		/*Fungsi Upload*/

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
			echo"Error";
		}
		else
		{
			$data = $this->upload->data();

			//$this->load->view('upload_success', $data);
			$nama_file = $data['file_name'];
			//echo "Nama File : ".$nama_file;
		}

		/*Fungsi Upload*/

		

		$nama_produk = $this->input->post('nama_produk');
		$stok = $this->input->post('stok');
		$satuan = $this->input->post('satuan');
		$harga_jual = $this->input->post('harga_jual');
		/*Apabila Upload File Terisi*/
		if($nama_file != ""){

			$this->produk_model->update_produk(array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk,
			'stok' 	   => $stok,
			'satuan' 	   => $satuan,
			'harga_jual'     => $harga_jual,
			'foto'         => $nama_file
			),$id_produk);

		}
		/*Apabila Upload File Kosong*/
		else{

			$this->produk_model->update_produk(array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk,
			'stok' 	   => $stok,
			'satuan' 	   => $satuan,
			'harga_jual'     => $harga_jual
			),$id_produk);
		}

		redirect('produk');
	}


	public function delete($id){

		$this->produk_model->delete_produk($id);
		redirect('produk');

	}

	// public function login(){

	// 	$this->input->post('username');

	// }

}

?>