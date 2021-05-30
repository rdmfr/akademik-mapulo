<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faculty extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->model('Subject_model');
		$this->load->model('Semester_model');
		$this->load->model('Staff_model');
		$this->load->model('Result_model');
		$this->load->model('News_model');
		$this->load->model('Branch_model');
	}

	public function index()
	{
		$data['page'] = 1;
		$data['news'] = $this->News_model->read(false, 3);

		$this->load->view('layout/head', ['title' => 'Dashboard - Faculty']);
		$this->load->view('layout/navbar');
		$this->load->view('faculty/index', $data);
		$this->load->view('layout/footer');
	}

	public function profile()
	{
		$data['title'] = 'Profile';
		$data['myprofile'] = $this->Staff_model->read([
			'id' => $this->session->user['id']
		]);

		$this->load->view('layout/head', ['title' => 'My Profile']);
		$this->load->view('layout/navbar');
		$this->load->view('faculty/profile', $data);
		$this->load->view('layout/footer');
	}

	public function edit_profile()
	{
		if ($this->form_validation->run('edit_faculty_profile') == FALSE) {
			$id = $this->input->get('id', true);
			$data['faculty'] = $this->Staff_model->read([
				'id' => $this->session->user['id']
			]);
			$data['branch'] = $this->Branch_model->read();
			$data['title'] = 'Change Profile';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('faculty/edit_profile', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			$data['name'] = $this->input->post('name', true);
			$data['gender'] = $this->input->post('gender', true);
			$data['contact_no'] = $this->input->post('contact_no', true);
			$data['address'] = $this->input->post('address', true);

			/* Change data in database */
			$this->Staff_model->update($data, [
				'id' => $this->input->post('key', true)
			]);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Changed');
			/* redirect */
			redirect('/faculty/profile');
		}
	}

	public function show_news($news = false)
	{
		/* Get data from database to showed within table*/
		if ($news == false) {
			$data['news'] = $this->News_model->read();
			$data['title'] = 'News List';
			$this->load->view('layout/head', ['title' => 'News List']);
			$this->load->view('layout/navbar');
			$this->load->view('faculty/news/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data['news'] = $this->News_model->read([
				'slug' => rawurldecode($news)
			])[0];
			$data['other_news'] = $this->News_model->read([
				'slug !=' => rawurldecode($news)
			]);

			$data['title'] = $data['news']['title'];
			$this->load->view('layout/head', ['title' => $data['news']['title']]);
			$this->load->view('layout/navbar');
			$this->load->view("faculty/news/news_item", $data);
			$this->load->view('layout/footer');
		}
	}

	public function show_event($event = false)
	{
		/* Get data from database to showed within table*/
		if ($event == false) {
			$data['event'] = $this->News_model->read();
			$data['title'] = 'Event List';
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('faculty/event/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data['event'] = $this->News_model->read([
				'slug' => rawurldecode($event)
			])[0];
			// var_dump($data);
			$data['title'] = $data['event']['title'];
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view("faculty/event/event_item", $data);
			$this->load->view('layout/footer');
		}
	}

	public function show_result()
	{
		/* Get data from database to showed within table*/
		$data['result'] = $this->Result_model->advance_read();
		$data['branch'] = $this->Branch_model->read();
		$data['subject'] = $this->Subject_model->read();
		$data['semester'] = $this->Semester_model->read();

		$filter = [
			[
				'field' => 'res.branch',
				'value' => $this->input->get('branch', true)
			],
			[
				'field' => 'res.subject',
				'value' => $this->input->get('subject', true)
			],
			[
				'field' => 'res.semester',
				'value' => $this->input->get('semester', true)
			]
		];

		if ($this->input->get()) {
			$data['result'] = $this->Result_model->advance_read(array_filter($filter, function ($arr) {
				$cond = [];
				if ($arr['value'] != '') {
					array_push($cond, [$arr['field'] => $arr['value']]);
				}
				return $cond;
			}));
		} else {
			$data['result'] = $this->Result_model->advance_read();
		}
		$data['level'] = 'admin';
		$data['title'] = 'Result Data';

		$this->load->view('layout/head', $data);
		$this->load->view('layout/navbar');
		$this->load->view('faculty/result/index', $data);
		$this->load->view('layout/footer');
	}

	public function add_result()
	{
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run('result') == FALSE) {
			$data['semester'] = $this->Semester_model->read();
			$data['branch'] = $this->Branch_model->read();
			$data['subject'] = $this->Subject_model->read();
			$data['student'] = $this->Student_model->read();

			$data['title'] = 'Add Result';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('faculty/result/addform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			// $data['result_id'] = $this->input->post('result_id', true);
			$data['semester'] = $this->input->post('semester', true);
			$data['subject'] = $this->input->post('subject', true);
			$data['year'] = $this->input->post('year', true);
			$data['branch'] = $this->input->post('branch', true);
			$data['student_id'] = $this->input->post('student', true);
			$data['score'] = $this->input->post('score', true);

			/* Add data to database */
			$this->Result_model->create($data);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Added');
			/* redirect */
			redirect('/faculty/result');
		}
	}

	public function upload_material()
	{
		$data['title'] = 'Upload Material';
		$data['branch'] = $this->Branch_model->read();
		$data['subject'] = $this->Subject_model->read();

		$this->form_validation->set_rules('note', 'Note', 'alpha_numeric_spaces');
		$this->form_validation->set_rules('subject', 'Sranch', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('faculty/result/upload', $data);
			$this->load->view('layout/footer');
		} else {
			$subject = $this->input->post('subject', true);
			// $branch = $this->input->post('branch', true);
			$note = ($this->input->post('note', true)) ? $this->input->post('note', true) : "Material";
			$path = "./assets/uploads/study/";
			if (!is_dir($path . $subject)) {
				mkdir($path . $subject);
			}
			$config['upload_path'] = $path . $subject;
			$config['allowed_types'] = 'pdf|docx|doc|ppt|pptx';
			$config['max_size'] = 20000;
			$config['file_name'] = strtolower($note);
			$config['detect_mime'] = true;
			$config['mod_mime_fix'] = true;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('message', $this->upload->display_errors());
				redirect('/faculty/result/upload');
			} else {
				$this->upload->data();
				$this->session->set_flashdata('message', "Material Successfully Uploaded");
				redirect('/faculty/result/material');
			}
		}
	}

	public function list_material()
	{
		/* Get data from database to showed within table*/
		$data['branch'] = $this->Branch_model->read();
		$data['subject'] = $this->Subject_model->read();
		$data['news'] = $this->Result_model->read();
		$data['title'] = 'Study Material List';

		$this->load->view('layout/head', $data);
		$this->load->view('layout/navbar');
		$this->load->view('faculty/result/list_material', $data);
		$this->load->view('layout/footer');

		if ($this->input->get('delete', true)) {
			$file_dir = $this->input->get('delete', true);
			echo $file_dir;
			if (unlink('./assets/uploads/study/' . $file_dir)) {
				$this->session->set_flashdata('message', "Material Successfully Deleted");
				redirect('/faculty/result/material');
			} else {
				$this->session->set_flashdata('message', "Material Failed Uploaded");
				redirect('/faculty/result/material');
			}
		}
	}
}
