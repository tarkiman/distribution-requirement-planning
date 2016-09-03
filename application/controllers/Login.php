<?php	

Class Login extends CI_Controller{

	public function index(){

		$status = $this->session->userdata('logged_in');

		if($status != true){
		
			$this->load->view('login_view');
		
		}
		else{
		
			redirect('home');
		
		}		

	}

	public function cek_login(){

		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
		//$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]');

		if($this->form_validation->run() == FALSE){
			
			$data = array(

				'errors' => validation_errors() 

				);

			$this->session->set_flashdata($data);

			//redirect('login');
			redirect('login/lockscreen');


		}else{


			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$user_id = $this->login_model->cek_login($username,$password);


			if($user_id){
				$user_data = array(

					'user_id' => $user_id,
					'username'=> $username,
					'logged_in'=> true 

					);

				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('login_success','You are now logged in');

				//$data['main_view'] = "admin_view";

				//$this->load->view('layouts/main',$data);

				
				redirect('home');

			}else{

				$this->session->set_flashdata('login_failed','Your username or password is wrong');

				redirect('login');

			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('login');
	}

	public function lockscreen(){

		$this->load->view('lockscreen_view');

	}

}


?>