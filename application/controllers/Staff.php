<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Staff extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->model('Subject_model');
		$this->load->model('Semester_model');
		$this->load->model('Staff_model');
		$this->load->model('Result_model');
		$this->load->model('Branch_model');
		$this->load->model('News_model');
		$this->load->model('Event_model');
	}

	public function index()
	{
		$this->load->view('layout/head', ['title' => 'Dashboard - Staff']);
		$this->load->view('layout/navbar');
		$this->load->view('staff/index');
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
		$this->load->view('staff/profile', $data);
		$this->load->view('layout/footer');
	}

	public function edit_profile()
	{
		if ($this->form_validation->run('edit_faculty_profile') == FALSE) {
			$id = $this->input->get('id', true);
			$data['staff'] = $this->Staff_model->read([
				'id' => $this->session->user['id']
			]);
			$data['branch'] = $this->Branch_model->read();
			$data['title'] = 'Change Profile';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/edit_profile', $data);
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
			redirect('/staff/profile');
		}
	}

	public function register()
	{
		if ($this->form_validation->run('register') == FALSE) {
			$data['title'] = "Sign Up";
			$this->load->view('layout/head', $data);
			$this->load->view('registration');
			// $this->load->view('layout/footer');
		} else {
			$data["id"] = $this->input->post('id', true);
			$data["name"] = $this->input->post('name', true);
			$data["email"] = $this->input->post('email', true);
			// $data["password"] = $this->input->post('password', true);
			$data["password"] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
			$this->Staff_model->create($data);
			$this->session->set_flashdata('message', 'Registration Successfully');
			redirect('/staff/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->set_flashdata('message', 'Logout Successfully');
		redirect('/staff/login');
	}

	public function show_student($student = false)
	{
		/* Get data from database to showed within table*/
		$data['level'] = 'admin';

		if ($student == false) {
			$data['student'] = $this->Student_model->read();
			$data['title'] = 'Student Data';
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/student/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data['title'] = 'Student Data';
			$data['student'] = $this->Student_model->read([
				'student_id' => $student
			]);
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/student/details', $data);
			$this->load->view('layout/footer');
		}
	}

	public function add_student()
	{
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run('student') == FALSE) {
			$data['branch'] = $this->Branch_model->read();
			$data['title'] = 'Add Student';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/student/addform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			$data['student_id'] = $this->input->post('student_id', true);
			$data['first_name'] = $this->input->post('first_name', true);
			$data['last_name'] = $this->input->post('last_name', true);
			$data['email'] = $this->input->post('email', true);
			$data['password'] = $this->input->post('password', true);
			$data['gender'] = $this->input->post('gender', true);
			$data['contact_no'] = $this->input->post('contact_no', true);
			$data['address'] = $this->input->post('address', true);
			$data['branch'] = $this->input->post('branch', true);
			$data['enroll_no'] = $this->input->post('enroll_no', true);

			/* Add data to database */
			$this->Student_model->create($data);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Added');
			/* redirect */
			redirect('/staff/student');
		}
	}

	public function update_student()
	{
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run('student') == FALSE) {
			$id = $this->input->get('id', true);
			$data['student'] = $this->Student_model->read([
				'student_id' => $id
			]);
			$data['branch'] = $this->Branch_model->read();
			$data['title'] = 'Add Student';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/student/editform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			$data['student_id'] = $this->input->post('student_id', true);
			$data['first_name'] = $this->input->post('first_name', true);
			$data['last_name'] = $this->input->post('last_name', true);
			$data['email'] = $this->input->post('email', true);
			$data['password'] = $this->input->post('password', true);
			$data['gender'] = $this->input->post('gender', true);
			$data['contact_no'] = $this->input->post('contact_no', true);
			$data['address'] = $this->input->post('address', true);
			$data['branch'] = $this->input->post('branch', true);
			$data['enroll_no'] = $this->input->post('enroll_no', true);

			/* Change data in database */
			$this->Student_model->update($data, [
				'student_id' => $this->input->post('key', true)
			]);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Changed');
			/* redirect */
			redirect('/staff/student');
		}
	}

	public function delete_student()
	{
		/* Delete data from database */
		$this->Student_model->delete(array(
			'student_id' => $this->input->get('id', true),
		));
		/* Give feedback to user */
		$this->session->set_flashdata('message', 'Data Successfully Deleted');
		/* redirect */
		redirect('/staff/student');
	}

	public function show_subject()
	{
		/* Get data from database to showed within table*/
		$data['subject'] = $this->Subject_model->read();
		$data['level'] = 'admin';
		$data['title'] = 'Subject Data';

		$this->load->view('layout/head', $data);
		$this->load->view('layout/navbar');
		$this->load->view('staff/subject/index', $data);
		$this->load->view('layout/footer');
	}

	public function add_subject()
	{
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run('subject') == FALSE) {
			$data['subject'] = $this->Subject_model->read();
			$data['title'] = 'Add Subject';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/subject/addform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			$data['subject_id'] = $this->input->post('subject_id', true);
			$data['subject'] = $this->input->post('subject', true);

			/* Add data to database */
			$this->Subject_model->create($data);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Added');
			/* redirect */
			redirect('/staff/subject');
		}
	}

	public function update_subject()
	{
		/* Use sets of validation rules and show the form page*/
		$this->form_validation->set_rules('subject_id', 'Subject ID', 'numeric');
		$this->form_validation->set_rules('subject', 'Subject', 'required|alpha_numeric_spaces');
		if ($this->form_validation->run() == FALSE) {
			$id = $this->input->get('id', true);
			$data['subject'] = $this->Subject_model->read([
				'subject_id' => $id
			]);
			$data['title'] = 'Update Subject';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/subject/editform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			// $data['subject_id'] = $this->input->post('subject_id', true);
			$data['subject'] = trim($this->input->post('subject', true));

			/* Change data in database */
			$this->Subject_model->update($data, [
				'subject_id' => $this->input->post('key', true)
			]);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Changed');
			/* redirect */
			redirect('/staff/subject');
		}
	}

	public function delete_subject()
	{
		/* Delete data from database */
		$this->Subject_model->delete(array(
			'subject_id' => $this->input->get('id', true),
		));
		/* Give feedback to user */
		$this->session->set_flashdata('message', 'Data Successfully Deleted');
		/* redirect */
		redirect('/staff/subject');
	}

	/* Manage Semester */
	public function show_semester()
	{
		/* Get data from database to showed within table*/
		$data['semester'] = $this->Semester_model->read();
		$data['level'] = 'admin';
		$data['title'] = 'Semester Data';

		$this->load->view('layout/head', $data);
		$this->load->view('layout/navbar');
		$this->load->view('staff/semester/index', $data);
		$this->load->view('layout/footer');
	}

	public function add_semester()
	{
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run('semester') == FALSE) {
			$data['semester'] = $this->Semester_model->read();
			$data['title'] = 'Add Semester';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/semester/addform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			$data['semester_id'] = $this->input->post('semester_id', true);
			$data['semester'] = $this->input->post('semester', true);

			/* Add data to database */
			$this->Semester_model->create($data);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Added');
			/* redirect */
			redirect('/staff/semester');
		}
	}

	public function update_semester()
	{
		/* Use sets of validation rules and show the form page*/
		$this->form_validation->set_rules('semester_id', 'Semester ID', 'numeric');
		$this->form_validation->set_rules('semester', 'Semester', 'required|alpha');
		if ($this->form_validation->run() == FALSE) {
			$id = $this->input->get('id', true);
			$data['semester'] = $this->Semester_model->read([
				'semester_id' => $id
			]);
			$data['title'] = 'Update Subject';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/semester/editform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			// $data['semester_id'] = $this->input->post('semester_id', true);
			$data['semester'] = trim($this->input->post('semester', true));

			/* Change data in database */
			$this->Semester_model->update($data, [
				'semester_id' => $this->input->post('key', true)
			]);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Changed');
			/* redirect */
			redirect('/staff/semester');
		}
	}

	public function delete_semester()
	{
		/* Delete data from database */
		$this->Semester_model->delete(array(
			'semester_id' => $this->input->get('id', true),
		));
		/* Give feedback to user */
		$this->session->set_flashdata('message', 'Data Successfully Deleted');
		/* redirect */
		redirect('/staff/semester');
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
		$this->load->view('staff/result/index', $data);
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
			$this->load->view('staff/result/addform', $data);
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
			redirect('/staff/result');
		}
	}

	public function update_result()
	{
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run('result') == FALSE) {
			$id = $this->input->get('id', true);
			$data['semester'] = $this->Semester_model->read();
			$data['branch'] = $this->Branch_model->read();
			$data['subject'] = $this->Subject_model->read();
			$data['student'] = $this->Student_model->read();
			$data['result'] = $this->Result_model->read([
				'result_id' => $id
			]);
			$data['title'] = 'Update Result';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/result/editform', $data);
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

			/* Change data in database */
			$this->Result_model->update($data, [
				'result_id' => $this->input->post('key', true)
			]);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Changed');
			/* redirect */
			redirect('/staff/result');
		}
	}

	public function delete_result()
	{
		/* Delete data from database */
		$this->Result_model->delete(array(
			'result_id' => $this->input->get('id', true),
		));
		/* Give feedback to user */
		$this->session->set_flashdata('message', 'Data Successfully Deleted');
		/* redirect */
		redirect('/staff/result');
	}

	public function send_result()
	{
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
			$results = $this->Result_model->advance_read(array_filter($filter, function ($arr) {
				$cond = [];
				if ($arr['value'] != '') {
					array_push($cond, [$arr['field'] => $arr['value']]);
				}
				return $cond;
			}));
			$data['result'] = $results;
		} else {
			$data['result'] = $this->Result_model->advance_read();
		}
		$data['title'] = 'Result Data';

		$this->load->view('layout/head', $data);
		$this->load->view('layout/navbar');
		$this->load->view('staff/result/send', $data);
		$this->load->view('layout/footer');
	}

	public function show_event($event = false)
	{
		/* Get data from database to showed within table*/
		if ($event == false) {
			$data['event'] = $this->News_model->read();
			$data['title'] = 'Event List';
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/event/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data['event'] = $this->News_model->read([
				'slug' => rawurldecode($event)
			])[0];
			// var_dump($data);
			$data['title'] = $data['event']['title'];
			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view("staff/event/event_item", $data);
			$this->load->view('layout/footer');
		}
	}

	public function add_event()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('first_date', 'First Date', 'required');
		/* Use sets of validation rules and show the form page*/
		if ($this->form_validation->run() == FALSE) {
			// $data['event'] = $this->Event_model->read();
			$data['title'] = 'Add Event';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('staff/event/addform', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			print_r($this->input->post());
			$data['event_id'] = '';
			$data['name'] = $this->input->post('name', true);
			$data['description'] = $this->input->post('desc', true);
			$data['first_date'] = $this->input->post('first_date', true);
			$data['last_date'] = ($this->input->post('last_date', true)) ? $this->input->post('last_date', true) : $this->input->post('first_date', true);

			/* Add data to database */
			var_dump($data);
			$this->Event_model->create($data);
			/* Give feedback to user */
			// $this->session->set_flashdata('message', 'Data Successfully Added');
			/* redirect */
			// redirect('/staff/event');
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
			$this->load->view('staff/news/index', $data);
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
			$this->load->view("staff/news/news_item", $data);
			$this->load->view('layout/footer');
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
