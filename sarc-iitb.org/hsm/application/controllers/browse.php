<?php
class Browse extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('student');
		}
		$this->load->model('model_students', 'students');
		$this->load->model('model_admins', 'admins');
		$this->load->model('model_events', 'events');
		$this->genres_array = $this->admins->get_all_genres();
		$this->events_array = $this->events->get_all_events();
	}

	public function index()
	{
		$data['genre'] = $this->genres_array;
		$data['events'] = $this->events_array;
		$this->load->view('browse_index', $data);
		

	}
	public function test(){
		var_dump($genres);
	}
	public function event($event_no, $event){
		$value = $this->students->getinfo($event_no);
		$data['info'] = $value;
		$data['event'] = $event;
		$data['genres'] = $this->genres_array;
		$this->load->view('browse_events', $data);
	}

}
?>