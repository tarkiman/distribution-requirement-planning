<?php	

Class Kendaraan extends CI_Controller{

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

		$data['results'] = $this->kendaraan_model->list_kendaraan();
		$this->template->display('kendaraan/list',$data);
	}

	public function add(){

		/*Generate Id kendaraan*/
		$no_kendaraan = $this->kendaraan_model->get_no_kendaraan();
		foreach ($no_kendaraan as $is) {
	        $no_kendaraan  = $is->no_kendaraan;
	    }

	    /*Kirim Id kendaraan*/
		$data['kendaraan'][] = (object) array('no_kendaraan' => $no_kendaraan);

		$this->template->display('kendaraan/add',$data);
	}

	public function insert(){

		$no_kendaraan = $this->input->post('no_kendaraan');
		$merek = $this->input->post('merek');
		$tahun = $this->input->post('tahun');

		$this->kendaraan_model->create_kendaraan(array(
		'no_kendaraan' => $no_kendaraan,
		'merek' => $merek,
		'tahun' 	   => $tahun
		));

		redirect('kendaraan');
	}

	public function show($id){
		$data['results'] = $this->kendaraan_model->read_kendaraan($id);
		$this->template->display('kendaraan/update',$data);
	}
	
	public function update($no_kendaraan){

		$merek = $this->input->post('merek');
		$tahun = $this->input->post('tahun');

		$this->kendaraan_model->update_kendaraan(array(
		'no_kendaraan' => $no_kendaraan,
		'merek' => $merek,
		'tahun' 	   => $tahun
		),$no_kendaraan);

		redirect('kendaraan');
	}


	public function delete($id){

		$this->kendaraan_model->delete_kendaraan($id);
		redirect('kendaraan');

	}

}

?>