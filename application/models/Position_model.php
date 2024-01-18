<?php

class Position_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_positions() {
		$query = $this->db->get('positions');
		return $query->result_array();
	}

	public function get_position($id) {
		$query = $this->db->get_where('positions', array('id' => $id));
		return $query->row_array();
	}

	public function add_position($data) {
		return $this->db->insert('positions', $data);
	}

	public function update_position($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('positions', $data);
	}

	public function delete_position($id) {
		return $this->db->delete('positions', array('id' => $id));
	}
}
