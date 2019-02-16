<?php

class Lists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata(
				'noaccess',
				'Sorry, you are not logged in'
			);
			redirect('home/index');
		}
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['lists'] = $this->List_model->get_lists();
		//Load view
		$data['main_content'] = 'lists/index';
		$this->load->view('layouts/main', $data);
	}

	public function show($id)
	{
		//Get all lists from the model
		$data['list'] = $this->List_model->get_list($id);
		//Get all completed tasks for this list
		// $data['completed_tasks'] = $this->List_model->get_list_tasks($id, true);
		//Get all uncompleted tasks for this list
		// $data['completed_tasks'] = $this->List_model->get_list_tasks(
		// 	$id,
		// 	false
		// );

		//Load view and layout
		$data['main_content'] = 'lists/show';
		$this->load->view('layouts/main', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules(
			'list_name',
			'List Name',
			'trim|required|xss_clean'
		);
		$this->form_validation->set_rules(
			'list_body',
			'List Body',
			'trim|xss_clean'
		);

		if ($this->form_validation->run() == false) {
			// Load view and layout
			$data['main_content'] = 'lists/add_list';
			$this->load->view('layouts/main', $data);
		} else {
			//Validation has ran and passed
			//Post values to array
			$data = array(
				'list_name' => $this->input->post('list_name'),
				'list_body' => $this->input->post('list_body'),
				'list_user_id' => $this->session->userdata('user_id')
			);
			if ($this->List_model->create_list($data)) {
				$this->session->set_flashdata(
					'list_created',
					'Your task list has been created'
				);
				redirect('lists/index');
			}
		}
	}
}

?>
