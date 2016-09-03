<?php	

Class Users extends CI_Controller{

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		// $this->load->library('template');
		// $this->load->helper('url');
	}

	function index(){
		$this->show_list();
	}

	/*LEBIH DARI SATU KONDISI*/
	public function show_list(){

		$data['results'] = $this->user_model->get_users_list();
		$this->template->display('users/list',$data);
	}


	/*LEBIH DARI SATU KONDISI*/
	public function show($user_id){
		//$data['error'] = array('error' => ' ' );
		$data['results'] = $this->user_model->get_user($user_id);
		$this->template->display('users/update',$data);
	}

	public function add(){
		$this->template->display('users/add',false);
	}

	/*LEBIH DARI SATU KONDISI*/
	public function search($user_id,$username){

		$data['results'] = $this->user_model->get_users($user_id,$username);
		//$this->load->view('users/list',$data);
		$this->template->display('users/list',$data);
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

		$nama_lengkap = $this->input->post('nama_lengkap');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		/*Apabila Upload File Terisi*/
		if($nama_file != ""){

			$this->user_model->create_users(array(
			'nama_lengkap' => $nama_lengkap,
			'email' 	   => $email,
			'username' 	   => $username,
			'password'     => md5($password),
			'foto'         => $nama_file
			), $id);

		}
		/*Apabila Upload File Kosong*/
		else{

			$this->user_model->create_users(array(
			'nama_lengkap' => $nama_lengkap,
			'email' 	   => $email,
			'username' 	   => $username,
			'password'     => md5($password)
			), $id);
		}

		redirect('users');
	}

	public function update($id){

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

		

		$nama_lengkap = $this->input->post('nama_lengkap');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		/*Apabila Password Terisi*/
		if($password != ""){

			/*Apabila Upload File Terisi*/
			if($nama_file != ""){

				$this->user_model->update_users(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'username' 	   => $username,
				'password'     => md5($password),
				'foto'         => $nama_file
				), $id);

			}
			/*Apabila Upload File Kosong*/
			else{

				$this->user_model->update_users(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'username' 	   => $username,
				'password'     => md5($password)
				), $id);
			}

		}
		/*Apabila Password Kosong*/
		else{
			
			/*Apabila Upload File Terisi*/
			if($nama_file != ""){

				$this->user_model->update_users(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'username' 	   => $username,
				'foto'         => $nama_file
				), $id);

			}
			/*Apabila Upload File Kosong*/
			else{

				$this->user_model->update_users(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'username' 	   => $username
				), $id);
			}

		}

		redirect('users');
	}


	public function delete($id){

		$this->user_model->delete_users($id);
		redirect('users');

	}

	public function login(){

		$this->input->post('username');

	}

}

?>