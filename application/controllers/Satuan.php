<?php	

Class Satuan extends CI_Controller{

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

		$data['results'] = $this->satuan_model->list_satuan();

		$this->template->display('satuan/list',$data);
	}



	public function add(){

		$this->template->display('satuan/add',false);

	}



	public function insert(){

		$nama_satuan = $this->input->post('nama_satuan');

		$this->satuan_model->create_satuan(array(

			'nama_satuan' => $nama_satuan

		));

		redirect('satuan');

	}



	public function show($id){

		$data['results'] = $this->satuan_model->read_satuan($id);

		$this->template->display('satuan/update',$data);
	}



	public function update($id_satuan){

		$nama_satuan = $this->input->post('nama_satuan');

		$this->satuan_model->update_satuan(array(

			'nama_satuan' => $nama_satuan

		),$id_satuan);

		redirect('satuan');
	}
	


	public function delete($id){

		$this->satuan_model->delete_satuan($id);

		redirect('satuan');

	}
}

?>