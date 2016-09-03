<?php	

Class Driver extends CI_Controller{

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

		$data['results'] = $this->driver_model->list_driver();
		$this->template->display('driver/list',$data);
	}

	public function add(){

		/*Generate Id driver*/
		$id_driver = $this->driver_model->get_id_driver();
		foreach ($id_driver as $is) {
	        $id_driver  = $is->id_driver;
	    }

	    /*Kirim Id driver*/
		$data['driver'][] = (object) array('id_driver' => $id_driver);

		$this->template->display('driver/add',$data);
	}

	public function insert(){

		$id_driver = $this->input->post('id_driver');
		$nama_driver = $this->input->post('nama_driver');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');


		$this->driver_model->create_driver(array(
		'id_driver' => $id_driver,
		'nama_driver' => $nama_driver,
		'alamat' 	   => $alamat,
		'telepon' 	   => $telepon
		));

		redirect('driver');
	}

	public function show($id){
		$data['results'] = $this->driver_model->read_driver($id);
		$this->template->display('driver/update',$data);
	}
	
	public function update($id_driver){

		$nama_driver = $this->input->post('nama_driver');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$this->driver_model->update_driver(array(
		'id_driver' => $id_driver,
		'nama_driver' => $nama_driver,
		'alamat' 	   => $alamat,
		'telepon' 	   => $telepon
		),$id_driver);

		redirect('driver');
	}


	public function delete($id){

		$this->driver_model->delete_driver($id);
		redirect('driver');

	}

}

?>