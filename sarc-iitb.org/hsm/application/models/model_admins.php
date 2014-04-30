<?php
	/**
	* 
	*/
class Model_admins extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_userid($user)
	{		
			$this->db->where('username', $user);
			$query = $this->db->get('admins');
			$id = $query->row()->id;
			return $id;
	}
	public function authenticate($username, $password)
	{
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->count_all_results('admins');
			if($query == 1):
				return TRUE;
			else:
				return FALSE;
			endif;
	}
	public function get_role_by_id($userid){
		$this->db->where('id',$userid);
		$querymax = $this->db->get('admins');
		$role = $querymax->row()->role;
		return $role;
	}
	public function load_data_by_user($userid){
		$this->db->where('students.admin_id', $userid);
		$this->db->join('events', 'events.id = students.event_id');
		$query = $this->db->get('students');
		return $query->result();
	}
	public function get_all_genres(){
		$all_genres = array();
		$query = $this->db->get('admins');
		foreach ($query->result() as $genres) {
			$all_genres[$genres->id] = $genres->genre;
		}
		return $all_genres;
		//foreach ($query->result() as $genres) {
		//	$all_genres[""] = 
		//}$query->result();
	}
}
?>