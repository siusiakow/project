<?php

class Workers_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_workers()
	{
		$query = $this->db->get('workers');
		return $query->result_array();
	}

	public function get_worker($id)
	{
		$query = $this->db->get_where('workers', array('id' => $id));
		return $query->row_array();
	}

	public function add_worker($data)
	{
		$data['position_id'] = $this->input->post('position');

		return $this->db->insert('workers', $data);
	}

	public function update_worker($id, $data)
	{
		$data['position_id'] = $this->input->post('position');

		$this->db->where('id', $id);
		return $this->db->update('workers', $data);
	}

	public function delete_worker($id)
	{
		return $this->db->delete('workers', array('id' => $id));
	}

	public function update_worker_manager($worker_id, $manager_id)
	{
		$data = array('manager_id' => $manager_id);
		$this->db->where('id', $worker_id);
		$this->db->update('workers', $data);
	}

	public function get_workers_hierarchy($managerId = NULL)
	{
		$this->db->select('*');
		$this->db->from('workers');
		if ($managerId !== null) {
			$this->db->where('manager_id', $managerId);
		} else {
			$this->db->or_where('manager_id', 0);
		}
		$query = $this->db->get();

		$result = $query->result_array();

		foreach ($result as &$row) {
			$row['subordinates'] = $this->get_workers_hierarchy($row['id']);
		}

		return $result;
	}
}
