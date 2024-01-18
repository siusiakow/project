<?php

class Workers_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_workers() {
		$query = $this->db->get('workers');
		return $query->result_array();
	}

	public function get_worker($id) {
		$query = $this->db->get_where('workers', array('id' => $id));
		return $query->row_array();
	}

	public function add_worker($data) {
		$data['position_id'] = $this->input->post('position');

		return $this->db->insert('workers', $data);
	}

	public function update_worker($id, $data) {
		$data['position_id'] = $this->input->post('position');

		$this->db->where('id', $id);
		return $this->db->update('workers', $data);
	}

	public function delete_worker($id) {
		return $this->db->delete('workers', array('id' => $id));
	}

	public function update_worker_manager($worker_id, $manager_id) {
		$data = array('manager_id' => $manager_id);
		$this->db->where('id', $worker_id);
		$this->db->update('workers', $data);
	}

	public function get_workers_hierarchy() {
		$query = $this->db->query("
            SELECT e.id, e.name, e.surname, e.position_id, e.manager_id,
                   m.name AS manager_name, m.surname AS manager_surname
            FROM workers e
            LEFT JOIN workers m ON e.manager_id = m.id
            ORDER BY e.manager_id ASC, e.id ASC
        ");

		return $query->result_array();
	}
}
