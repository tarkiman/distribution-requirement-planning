<?php	

Class Jabatan extends CI_Controller{

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

		$data['results'] = $this->jabatan_model->list_jabatan();

		$this->template->display('jabatan/list',$data);
	}



	public function add(){

		$this->template->display('jabatan/add',false);

	}



	public function insert(){

		$nama_jabatan = $this->input->post('nama_jabatan');

		$this->jabatan_model->create_jabatan(array(

			'nama_jabatan' => $nama_jabatan

		));

		redirect('jabatan');

	}



	public function show($id){

		$data['results'] = $this->jabatan_model->read_jabatan($id);

		$this->template->display('jabatan/update',$data);
	}



	public function update($id_jabatan){

		$nama_jabatan = $this->input->post('nama_jabatan');

		$this->jabatan_model->update_jabatan(array(

			'nama_jabatan' => $nama_jabatan

		),$id_jabatan);

		redirect('jabatan');
	}
	


	public function delete($id){

		$this->jabatan_model->delete_jabatan($id);

		redirect('jabatan');

	}
}

?>