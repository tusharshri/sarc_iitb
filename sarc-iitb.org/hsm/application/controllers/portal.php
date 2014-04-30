<?php
class Portal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('manage');
		}
		$this->load->model('model_events', 'events');
		$this->userid = $this->session->userdata('userid');
		$this->load->model('model_admins');
		$this->data['role'] = $this->model_admins->get_role_by_id($this->userid);
		$this->data['events_by_user'] = $this->events->get_events_by_user($this->userid);
		$this->data['subgenre_list_for_admin'] = $this->events->get_all_subgenres_for($this->userid);
	}

	public function index()
	{	
		$this->data['data_by_user'] = $this->model_admins->load_data_by_user($this->userid);
		$this->load->view('view_portal_head', $this->data);
		$this->load->view('view_portal_index');
		$this->load->view('view_portal_foot');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('manage');
	}
	public function add_data(){
		$this->form_validation->set_rules('rollno', 'Roll Number', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('position', 'Position', 'required|max_length[100]');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('view_portal_head', $this->data);
			$this->load->view('view_portal_add');
			$this->load->view('view_portal_foot');
			
		}
		else
		{
			$this->load->model('model_students','students');
			$rollno_array = explode(',', $this->input->post('rollno'));
			foreach ($rollno_array as $rollno) {
				$this->students->add_this_data(trim($rollno));
			}
			redirect('portal');
			
		}
	}
	public function events(){
		
		
		$this->form_validation->set_rules('name', 'Name', 'required|xss_safe|max_length[30]|min_length[4]');
		$this->form_validation->set_rules('subgenre', 'Sub Genre', 'required|xss_safe|trim|max_length[20]');
		if($this->form_validation->run()==FALSE){
			$this->load->view('view_portal_head', $this->data);
			$this->load->view('view_portal_events');
			$this->load->view('view_portal_foot');
		}
		else{
			if($this->events->add_this_event()):
			redirect('portal/events');
			endif;
		}
	}
}
?>