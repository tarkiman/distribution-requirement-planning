<?php	

Class Supplier extends CI_Controller{

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

		$data['results'] = $this->supplier_model->list_supplier();
		$this->template->display('supplier/list',$data);
	}

	public function add(){

		/*Generate Id Supplier*/
		$id_supplier = $this->supplier_model->get_id_supplier();
		foreach ($id_supplier as $is) {
	        $id_supplier  = $is->id_supplier;
	    }

	    /*Kirim Id Supplier*/
		$data['supplier'][] = (object) array('id_supplier' => $id_supplier);

		$this->template->display('supplier/add',$data);
	}

	public function insert(){

		$id_supplier = $this->input->post('id_supplier');
		$nama_supplier = $this->input->post('nama_supplier');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');


		$this->supplier_model->create_supplier(array(
		'id_supplier' => $id_supplier,
		'nama_supplier' => $nama_supplier,
		'alamat' 	   => $alamat,
		'telepon' 	   => $telepon
		));

		redirect('supplier');
	}

	public function show($id){
		$data['results'] = $this->supplier_model->read_supplier($id);
		$this->template->display('supplier/update',$data);
	}
	
	public function update($id_supplier){

		$nama_supplier = $this->input->post('nama_supplier');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$this->supplier_model->update_supplier(array(
		'id_supplier' => $id_supplier,
		'nama_supplier' => $nama_supplier,
		'alamat' 	   => $alamat,
		'telepon' 	   => $telepon
		),$id_supplier);

		redirect('supplier');
	}


	public function delete($id){

		$this->supplier_model->delete_supplier($id);
		redirect('supplier');

	}

}

?>