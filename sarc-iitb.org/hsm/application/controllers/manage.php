<?php
class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username')){
			redirect('portal');
		}
		
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if($this->form_validation->run()==FALSE){
			$this->load->view('view_admin_login');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('model_admins');
			$auth = $this->model_admins->authenticate($username, $password);
			if($auth==FALSE){
				$data['message'] = 'Invalid Credentials';
				$this->load->view('view_admin_login',$data);
			}
			else{
				$userid = $this->model_admins->get_userid($username);
				$newdata = array(
	                   'username'  	=> $username,
	                   'userid'		=> $userid
	                );
					$this->session->set_userdata($newdata);
					redirect('portal');
			}
		}
		

	}

}
?>