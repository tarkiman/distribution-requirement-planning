<?php	

Class Report extends CI_Controller{

	private $data;

	function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form', 'url'));
		$this->load->library('fpdf/fpdf');
	}

	function index(){

		$this->template->display('report/view',null);
		//$this->print_pdf();
	
	}

	public function print_pdf($startDate,$endDate){
		//$startDate = $_GET['start'];
		//$endDate = $_GET['end'];


		$data['results'] = $this->report_model->get_transaksi_penjualan($startDate,$endDate);
		$data['grand_total'] = $this->report_model->get_grand_total($startDate,$endDate);
		//$this->template->display('report/transaksi_penjualan',$data);
		$this->load->view('report/transaksi_penjualan',$data);
	}

	// public function add(){

	// 	/*Generate Id driver*/
	// 	$id_driver = $this->driver_model->get_id_driver();
	// 	foreach ($id_driver as $is) {
	//         $id_driver  = $is->id_driver;
	//     }

	//     /*Kirim Id driver*/
	// 	$data['driver'][] = (object) array('id_driver' => $id_driver);

	// 	$this->template->display('driver/add',$data);
	// }

	// public function insert(){

	// 	$id_driver = $this->input->post('id_driver');
	// 	$nama_driver = $this->input->post('nama_driver');
	// 	$alamat = $this->input->post('alamat');
	// 	$telepon = $this->input->post('telepon');


	// 	$this->driver_model->create_driver(array(
	// 	'id_driver' => $id_driver,
	// 	'nama_driver' => $nama_driver,
	// 	'alamat' 	   => $alamat,
	// 	'telepon' 	   => $telepon
	// 	));

	// 	redirect('driver');
	// }

	// public function show($id){
	// 	$data['results'] = $this->driver_model->read_driver($id);
	// 	$this->template->display('driver/update',$data);
	// }
	
	// public function update($id_driver){

	// 	$nama_driver = $this->input->post('nama_driver');
	// 	$alamat = $this->input->post('alamat');
	// 	$telepon = $this->input->post('telepon');

	// 	$this->driver_model->update_driver(array(
	// 	'id_driver' => $id_driver,
	// 	'nama_driver' => $nama_driver,
	// 	'alamat' 	   => $alamat,
	// 	'telepon' 	   => $telepon
	// 	),$id_driver);

	// 	redirect('driver');
	// }


	// public function delete($id){

	// 	$this->driver_model->delete_driver($id);
	// 	redirect('driver');

	// }

}

?>