<?php	

Class Kategori extends CI_Controller{

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

		$data['results'] = $this->kategori_model->list_kategori();

		$this->template->display('kategori/list',$data);
	}



	public function add(){

		$this->template->display('kategori/add',false);

	}



	public function insert(){

		$nama_kategori = $this->input->post('nama_kategori');

		$this->kategori_model->create_kategori(array(

			'nama_kategori' => $nama_kategori

		));

		redirect('kategori');

	}



	public function show($id){

		$data['results'] = $this->kategori_model->read_kategori($id);

		$this->template->display('kategori/update',$data);
	}



	public function update($id_kategori){

		$nama_kategori = $this->input->post('nama_kategori');

		$this->kategori_model->update_kategori(array(

			'nama_kategori' => $nama_kategori

		),$id_kategori);

		redirect('kategori');
	}
	


	public function delete($id){

		$this->kategori_model->delete_kategori($id);

		redirect('kategori');

	}
}

?>