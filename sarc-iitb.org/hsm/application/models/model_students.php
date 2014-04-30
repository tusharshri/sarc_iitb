<?php
class Model_students extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function add_this_data($rollno){
		$data_to_add = array(
			'event_id'	=> $this->input->post('event_id'),
			'admin_id'	=> $this->userid,
			'rollno'	=> $rollno,
			'position'	=> $this->input->post('position'),
			'remarks'	=> $this->input->post('remarks'),
		);
		$sql = $this->db->insert_string('students', $data_to_add);
		$query = $this->db->query($sql);
		if($query === TRUE):
			return TRUE;
		else: 
			return FALSE;
		endif;
	}
	public function load_all_data($username){
		$this->db->where('students.rollno', $username);
		$this->db->join('events', 'events.id = students.event_id');
		$query = $this->db->get('students');
		return $query->result();
	}
	public function getinfo($event_no){
		$this->db->where('event_id', $event_no);
		$query = $this->db->get('students');
		return $query->result();
	}
}

?>