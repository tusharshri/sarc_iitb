<?php
class Model_events extends CI_Model{
	public function __construct(){
		$this->load->database();
		parent::__construct();
	}
	public function get_events_by_user($userid){
		$this->db->where('admin_id', $userid);
		$query = $this->db->get('events');
		return $query->result();
	}
	public function add_this_event(){
		$data_to_add = array(
			'name' => $this->input->post('name'),
			'subgenre_id'=> $this->input->post('subgenre'),
			'admin_id' => $this->userid,
		);
		$sql = $this->db->insert_string('events', $data_to_add);
		$query = $this->db->query($sql);
		if($query === TRUE):
			return TRUE;
		else: 
			return FALSE;
		endif;
	}
	public function get_all_subgenres_for($userid){
		$this->db->where('genre_id', $userid);
		$query = $this->db->get('subgenres');
		return $query->result();
	}
	public function get_all_events(){
		$all_events = array();
		$query = $this->db->get('events');
		foreach ($query->result() as $events) {
			$all_events[$events->id] = $events->name;
		}
		return $all_events;
		//foreach ($query->result() as $genres) {
		//	$all_genres[""] = 
		//}$query->result();
	}
	
}

?>