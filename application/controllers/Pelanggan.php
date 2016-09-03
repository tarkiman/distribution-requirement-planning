<?php	

Class Pelanggan extends CI_Controller{

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index(){
		$this->show_list();
	}

	public function show_list(){

		$data['results'] = $this->pelanggan_model->list_pelanggan();
		$this->template->display('pelanggan/list',$data);
	}

	public function add(){

		/*Generate Id pelanggan*/
		$id_pelanggan = $this->pelanggan_model->get_id_pelanggan();
		foreach ($id_pelanggan as $is) {
	        $id_pelanggan  = $is->id_pelanggan;
	    }

	    /*Kirim Id pelanggan*/
		$data['pelanggan'][] = (object) array('id_pelanggan' => $id_pelanggan);

		$this->template->display('pelanggan/add',$data);
	}

	public function insert(){

		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');


		$this->pelanggan_model->create_pelanggan(array(
		'id_pelanggan' => $id_pelanggan,
		'nama_pelanggan' => $nama_pelanggan,
		'alamat' 	   => $alamat,
		'telepon' 	   => $telepon
		));

		redirect('pelanggan');
	}

	public function show($id){
		$data['results'] = $this->pelanggan_model->read_pelanggan($id);
		$this->template->display('pelanggan/update',$data);
	}
	
	public function update($id_pelanggan){

		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$this->pelanggan_model->update_pelanggan(array(
		'id_pelanggan' => $id_pelanggan,
		'nama_pelanggan' => $nama_pelanggan,
		'alamat' 	   => $alamat,
		'telepon' 	   => $telepon
		),$id_pelanggan);

		redirect('pelanggan');
	}


	public function delete($id){

		$this->pelanggan_model->delete_pelanggan($id);
		redirect('pelanggan');

	}

}

?>