<?php

class Positions extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('position_model');
		$this->load->library('form_validation');
		$this->load->helper(array('url_helper', 'html_helper'));
	}

	public function index() {
		$data['positions'] = $this->position_model->get_positions();
		$this->load->view('positions/index', $data);
	}

	public function add() {
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('positions/create');
		} else {
			$position_data = array(
				'name' => $this->input->post('name'),
			);

			$this->position_model->add_position($position_data);

			$this->session->set_flashdata('success', 'Position added successfully.');

			redirect('positions', 'refresh');
		}
	}

	public function edit($id) {
		$data['position'] = $this->position_model->get_position($id);

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('positions/edit', $data);
		} else {
			$position_data = array(
				'name' => $this->input->post('name'),
			);

			$this->position_model->update_position($id, $position_data);

			$this->session->set_flashdata('success', 'Position updated successfully.');

			redirect('positions', 'refresh');
		}
	}

	public function delete($id) {
		$position = $this->position_model->get_position($id);

		if (!$position) {
			redirect('positions', 'refresh');
		}

		$this->position_model->delete_position($id);

		$this->session->set_flashdata('success', 'Position deleted successfully.');

		redirect('positions', 'refresh');
	}
}
