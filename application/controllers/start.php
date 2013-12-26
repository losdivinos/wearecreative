<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {


	public function index()
	{
		$this->login();
	}
	
	public function signup()
	{
		$this->load->view('signup');
	}
	
	public function signup_validation()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[players.email]');
		$this->form_validation->set_rules('username','Username','required|trim||is_unique[players.username]');
		$this->form_validation->set_rules('password','Password','required|trim|matches[password2]');
		$this->form_validation->set_rules('password2','Confirm password','required|trim');
		
		if($this->form_validation->run()){
			echo "pass";
		} else {
			$this->load->view('signup');
		}
		
	}
	
	public function login()
	{
		$this->load->view('login');
	}
	
	public function members(){
		if($this->session->userdata('is_logged_in', 'true'))
		{
			$this->load->view('members');
		} else {
			redirect('start/restricted');
		}
	}
	
	public function login_validation(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|trim');
		
		if($this->form_validation->run()){
			
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 'true'
			);
			
			$this->session->set_userdata($data);
			
			redirect('start/members');
			
		} else {
			
			$this->load->view('login');
			
		}
	}
	
	public function validate_credentials(){
		$this->load->model('model_users');
		
		if($this->model_users->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect login information');
			return false;
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('start/login');
	}
	
}
