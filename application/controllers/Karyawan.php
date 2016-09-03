<?php	

Class Karyawan extends CI_Controller{

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

		$data['results'] = $this->karyawan_model->list_karyawan();
		$this->template->display('karyawan/list',$data);
	}


	/*LEBIH DARI SATU KONDISI*/
	public function show($id_karyawan){
		//$data['error'] = array('error' => ' ' );
		$data['jabatan'] = $this->jabatan_model->list_jabatan();
		$data['results'] = $this->karyawan_model->read_karyawan($id_karyawan);
		$this->template->display('karyawan/update',$data);
	}

	public function add(){
		$data['jabatan'] = $this->jabatan_model->list_jabatan();
		$this->template->display('karyawan/add',$data);
	}

	/*LEBIH DARI SATU KONDISI*/
	public function search($karyawan_id,$karyawanname){

		$data['results'] = $this->karyawan_model->get_karyawan($karyawan_id,$karyawanname);
		//$this->load->view('karyawan/karyawan_view',$data);
		$this->template->display('karyawan/list',$data);
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

		$nama_karyawan = $this->input->post('nama_karyawan');
		$id_jabatan = $this->input->post('id_jabatan');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');

		/*Apabila Upload File Terisi*/
		if($nama_file != ""){

			$this->karyawan_model->create_karyawan(array(
			'nama_karyawan' => $nama_karyawan,
			'id_jabatan' 	=> $id_jabatan,
			'email' 	   	=> $email,
			'telepon' 	   	=> $telepon,
			'alamat' 	   	=> $alamat,
			'tempat_lahir' 	=> $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'foto'         	=> $nama_file
			));

		}
		/*Apabila Upload File Kosong*/
		else{

			$this->karyawan_model->create_karyawan(array(
			'nama_karyawan' => $nama_karyawan,
			'id_jabatan' 	=> $id_jabatan,
			'email' 	   	=> $email,
			'telepon' 	   	=> $telepon,
			'alamat' 	   	=> $alamat,
			'tempat_lahir' 	=> $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir
			));
		}
		//echo"$nama_karyawan $id_jabatan $email $telepon $alamat $tempat_lahir $tanggal_lahir $nama_file";

		redirect('karyawan');
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
		$karyawanname = $this->input->post('karyawanname');
		$password = $this->input->post('password');

		/*Apabila Password Terisi*/
		if($password != ""){

			/*Apabila Upload File Terisi*/
			if($nama_file != ""){

				$this->karyawan_model->update_karyawan(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'karyawanname' 	   => $karyawanname,
				'password'     => md5($password),
				'foto'         => $nama_file
				), $id);

			}
			/*Apabila Upload File Kosong*/
			else{

				$this->karyawan_model->update_karyawan(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'karyawanname' 	   => $karyawanname,
				'password'     => md5($password)
				), $id);
			}

		}
		/*Apabila Password Kosong*/
		else{
			
			/*Apabila Upload File Terisi*/
			if($nama_file != ""){

				$this->karyawan_model->update_karyawan(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'karyawanname' 	   => $karyawanname,
				'foto'         => $nama_file
				), $id);

			}
			/*Apabila Upload File Kosong*/
			else{

				$this->karyawan_model->update_karyawan(array(
				'nama_lengkap' => $nama_lengkap,
				'email' 	   => $email,
				'karyawanname' 	   => $karyawanname
				), $id);
			}

		}

		redirect('karyawan');
	}


	public function delete($id){

		$this->karyawan_model->delete_karyawan($id);
		redirect('karyawan');

	}

	public function login(){

		$this->input->post('karyawanname');

	}

}

?>