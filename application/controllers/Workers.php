<?php

class Workers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('workers_model', 'position_model'));
		$this->load->helper(array('url_helper', 'html_helper'));
	}

	public function index()
	{
		$data['workers'] = $this->workers_model->get_workers();
		$this->load->view('templates/header');
		$this->load->view('workers/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id): void
	{
		$data['worker'] = $this->workers_model->get_worker($id);

		if (!$data['worker']) {
			$this->session->set_flashdata('error', 'Worker not found.');
			redirect('workers', 'refresh');
		}

		$this->load->view('templates/header');
		$this->load->view('workers/view', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->load->library('form_validation');

		$worker_data['positions'] = $this->position_model->get_positions();
		$worker_data['managers'] = $this->workers_model->get_workers();

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');
		$this->form_validation->set_rules('mail', 'Mail', 'required|callback_validate_email');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('manager_id', 'manager', 'callback_validate_manager');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('workers/create', $worker_data);
			$this->load->view('templates/footer');

		} else {
			$worker_data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'salary' => $this->input->post('salary'),
				'mail' => $this->input->post('mail'),
				'position_id' => $this->input->post('position'),
				'manager_id' => $this->input->post('manager_id'),
			);

			$this->workers_model->add_worker($worker_data);

			$this->session->set_flashdata('success', 'Worker added successfully.');

			redirect('workers', 'refresh');
		}
	}

	public function edit($id)
	{
		$this->load->library('form_validation');

		$data['positions'] = $this->position_model->get_positions();
		$data['worker'] = $this->workers_model->get_worker($id);
		$data['managers'] = $this->workers_model->get_workers();

		if (!$data['worker']) {
			$this->session->set_flashdata('error', 'Worker not found.');
			redirect('workers', 'refresh');
		}

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');
		$this->form_validation->set_rules('mail', 'Mail', 'required|callback_validate_email');
		$this->form_validation->set_rules('position', 'Position', 'required');
		$this->form_validation->set_rules('manager_id', 'manager', 'callback_validate_manager');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('workers/edit', $data);
		} else {
			$update_data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'salary' => $this->input->post('salary'),
				'mail' => $this->input->post('mail'),
				'position_id' => $this->input->post('position'),
				'manager_id' => $this->input->post('manager_id'),
			);

			$this->workers_model->update_worker($id, $update_data);

			$this->session->set_flashdata('success', 'Worker updated successfully.');

			redirect('workers', 'refresh');
		}
	}

	public function delete($id)
	{
		$worker = $this->workers_model->get_worker($id);

		if (!$worker) {
			redirect('workers', 'refresh');
		}

		$this->workers_model->delete_worker($id);

		$this->session->set_flashdata('success', 'Worker deleted successfully.');

		redirect('workers', 'refresh');
	}

	public function validate_manager($manager_id) {
		$worker_id = $this->input->post('id');
		if ($manager_id == $worker_id) {
			$this->form_validation->set_message('validate_manager', 'Employee cannot be their own manager.');
			return false;
		}
		return true;
	}

	public function validate_email($email)
	{
		$allowed_domains = array('o2.pl', 'gmail.com');

		$email_parts = explode('@', $email);
		$domain = end($email_parts);

		if (!in_array($domain, $allowed_domains)) {
			$this->form_validation->set_message('validate_email', 'Invalid email domain. Please use a suggested email address.');
			return FALSE;
		}

		return TRUE;
	}

	public function hierarchy() {
		$data['hierarchy'] = $this->workers_model->get_workers_hierarchy();
		$this->load->view('workers/hierarchy', $data);
	}
}
