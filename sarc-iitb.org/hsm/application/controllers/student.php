<?php
class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_students', 'students');
		$this->load->model('model_admins', 'admins');
		$this->genres_array = $this->admins->get_all_genres();
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username', 'required|trim');
		$this->form_validation->set_rules('password','Password', 'required|trim');
		if($this->form_validation->run()==FALSE && !$this->session->userdata('username')){
			$this->load->view('view_student_login');
		}
		else{

			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
			if($username=='') die("You have not entered any LDAP ID. Please go back and fill it up.");

			$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$username)") or die("ldap search error");
			$info = ldap_get_entries($ds, $sr) or die("First of all,get Entries in LDAP list");
			$ldap_uid = $info[0]['dn'];
			$roll = $info[0]['employeenumber'][0];
			$do_bind = @ldap_bind($ds,$ldap_uid,$password) or die("Wrong Username and/or Password. Please go back and try again.");
			if($do_bind==1){
				$this->session->set_userdata(array('username'=>$username));
				$data_array = $this->students->load_all_data($roll);
				$this->load->view('view_student_index', array('data_array' => $data_array, 'genres_array' => $this->genres_array));
			}else{
				$this->load->view('view_student_login');
			}
		}
		

	}
	public function test(){
		$this->genres_array = $this->admins->get_all_genres();
		var_dump($genres);
	}

}
?>