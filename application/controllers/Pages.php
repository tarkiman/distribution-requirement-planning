<?php	

Class Pages extends CI_Controller{

	private $data;

	function __construct(){
		parent::__construct();
		// $this->load->library('template');
		// $this->load->helper('url');
	}

	function index(){
		//$this->show_list();
	}


	public function chartjs(){
		$this->template->display('pages/charts/chartjs',null);
	}

	public function flot(){
		$data['results'] = "";//$this->user_model->get_users_list();
		$this->template->display('pages/charts/flot',$data);
	}

}

?>